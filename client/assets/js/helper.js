import { entries } from "lodash";
import fields from "./fields";

class Records{
    static record = {};
    insertRecord(key,value){
        Records.record[key] = value;
    }
    getRecords(){
        return Records.record;
    }
}
class Labels{
    static label = {};
    insertLabel(key,value){
        Labels.label[key] = value;
    }
    getLabels(){
        return Labels.label;
    }
}
export default {
    dlabels(){
        return new Labels;
    },
    recording(){
        return new Records;
    },
    scheduleToObject(...data){
        let [label,from,to] = data;
        let obj = [];
        let [single,more] = label.split('|');
        for(let x=from;x<=to;x++){
            if(x==12) continue;
            if(x==1){
                obj.push({value:`${x}_${single}`,label:`${x} ${single}`});
            }else{
                obj.push({value:`${x}_${more}`,label:`${x} ${more}`});
            }
        }
        obj.unshift({value:`12_weeks`,label:`12 Weeks`});
        return obj;
    },
    async getFieldContent({content,partial,reference,keys}){
        
        let partialList = partial.map(async(each)=>{
          return await content(`partial/${each}`).fetch();
        });

       return Promise.all(partialList)
        .then(res=>{
            let lists = {};
            res.map((each)=>{
                lists[each.slug] = each.data;
            });
            keys.map((each)=>{
                let form = reference[each]['form'];
                if(!!form){
                    reference[each]['form'] = this.getFields(lists,form);
                }
            });
            return reference;
        });
    },
    /********* getfields params option
        field:'campus',
        add:[{
            selection:[{
                value:'test',
                label:'test'
            }]
        }],
        edit:[{
            label:'This is my email',name:'myEmail'
        }],
        partial:{name:'country',appendTo:'selection'}
        func:{name:'scheduleToObject',params:"Week|Weeks,1,48",appendTo:'selection'}
        
    ************/
    getFields(partials,forms){
        let combo = [];
        forms.map((each)=>{
            let {field,edit=null,add=null,partial=null,func=null} = each;
            let obj = {...fields[field]};
            if(!!edit){
                edit.map((each)=>{
                    let keys = Object.keys(each);
                        keys.map((key)=>{
                            obj[key] = each[key];
                        });
                });
            }
            if(!!add){
                add.map((each)=>{
                    let keys = Object.keys(each);
                        keys.map((key)=>{
                            obj[key] = [...obj[key],...each[key]];
                        });
                });
            }
            if(!!partial){
                let {name,appendTo} = partial;
                obj[appendTo] =  [...obj[appendTo],...partials[name]];
            }
            if(!!func){
                let {name,params,appendTo} = func;
                let segments = params.split(',');
                obj[appendTo] = [...obj[appendTo],... this[name](...segments)];
            }
            combo.push(obj);
        });
        return combo;
    }
}