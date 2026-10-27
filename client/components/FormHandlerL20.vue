<template>
    <div>
      <div v-for="(forminfo, f_index) in formInfos" :key="`form-${f_index}`">
  
        <div class="form-group mb-4" v-if="forminfo.type == 'text'">
          <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
  
          <template v-if="forminfo.name == 'tel'">
            <input :class="`form-control ${forminfo.highlight ? 'highlight' : ''}`" type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" v-model="formdata[forminfo.name]" :name="forminfo.name" :required="forminfo.isRequired" />
          </template>
          <template v-else>
            <input :class="`form-control ${forminfo.highlight ? 'highlight' : ''}`" type="text" v-model="formdata[forminfo.name]" :name="forminfo.name" :required="forminfo.isRequired" />
          </template>
        </div>
         <template v-if="forminfo.id == downloadable && showDowbloadable > 0">
          <div class="form-group mb-4 downloadable" v-if="forminfo.type == 'link'">
                  <a :href="forminfo.src" target="_blank">{{ forminfo.label }}</a>
          </div>
         </template>
        <div class="form-group mb-4" v-if="forminfo.type == 'email'">
          <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
          <input :class="`form-control ${forminfo.highlight ? 'highlight' : ''}`" type="email" v-model="formdata[forminfo.name]" :name="forminfo.name" :required="forminfo.isRequired" />
        </div>
  
        <div class="form-group mb-4" v-if="forminfo.type == 'textarea'">
          <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
          <textarea :class="`form-control ${forminfo.highlight ? 'highlight' : ''}`" rows="3" v-model="formdata[forminfo.name]" :name="forminfo.name" :required="forminfo.isRequired"></textarea>
        </div>
  
        <div class="form-check mb-4" v-if="forminfo.type == 'checkbox'">
          <input class="form-check-input" type="checkbox" :name="forminfo.name" v-model="formdata[forminfo.name]" :required="forminfo.isRequired" />
            <label class="form-check-label">{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
        </div>
  
        <div class="form-check" v-if="forminfo.type == 'checkboxes'">
          <input class="form-check-input" type="checkbox" :name="forminfo.name" v-model="formdata[forminfo.name]" />
          <label class="form-check-label">{{ forminfo.label }} </label>
        </div>
  
        <div class="form-check" v-if="forminfo.type == 'groupOfCheckboxes'">
          <input class="form-check-input" type="checkbox" :name="forminfo.name" v-model="formdata['groups'][forminfo.group][forminfo.name]"/>
          <label class="form-check-label">{{ forminfo.label }} </label>
        </div>
  
        <div class="form-group mb-4" v-if="forminfo.type == 'datepicker'">
          <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
          <template v-if="forminfo.note">
            <br />
            <span>{{ forminfo.note }}</span>
          </template>
          <div class="input-group mb-2" :class="forminfo.name+'_class'">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="bi bi-calendar"></i></div>
            </div>
            <input class="form-control date" :id="forminfo.name" type="text" data-provide="datepicker" readonly/>
          </div>
        </div>
  
        <div class="form-group mb-4" v-if="forminfo.type == 'radio'">
          <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
          <div class="col-lg-12">
            <div class="form-check form-check-inline" v-for="(selection, s_index) in forminfo.selection" :key="`form-radio-${f_index}-${s_index}`">
              <input class="form-check-input" type="radio" :name="forminfo.name" v-model="formdata[forminfo.name]" :value="selection.value" :id="forminfo.name+'_'+s_index" :checked="s_index == 0" v-on:change="checkboxChanges" @click="callAFunc(forminfo,selection.value)">
              <label class="form-check-label" v-if="forminfo.dLabel">{{ dLabel}}</label>
              <label class="form-check-label" v-else>{{ selection.label }}</label>
            </div>
          </div>
          <div v-if="forminfo.staticNote">
           <div v-html="forminfo.staticNote"></div>
          </div>
         
        </div>
         <div class="form-group" v-if="forminfo.type == 'manualInput'">
          <section class="ml-5">
            <header><span v-if="forminfo.isRequired" class="hutoaka">*</span>&nbsp;{{forminfo.title}} <input :type="forminfo.data[0]" :style="forminfo.data[1]" v-model="account_amount" :required="forminfo.isRequired"> </header>
          </section>       
        </div>
  
        <div class="form-group" v-if="forminfo.type == 'radioGroup'">
          <section class="ml-5">
            <header><span v-if="forminfo.isRequired" class="hutoaka">*</span>&nbsp;{{forminfo.title}}</header>
              <div v-for="(each,index) in forminfo.lists" :key="'rd_'+index" class="ml-4">
                  <input type="radio" :value="each[0]" :checked="(index == forminfo.checked) ? true:false" :name="forminfo.groupName" v-model="selectedAccount"> {{ each[1] }}
                  <span v-if="each[2]">
                    <input :type="each[2][0]" :style="each[2][1]" v-model="other_account" :required="other_account_required"> 
                  </span>
              </div>
          </section>       
        </div>
  
        <div :id="forminfo.name" class="form-group mb-4" v-if="forminfo.type == 'select' && (forminfo.isShow == undefined || forminfo.isShow == true)">
          <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
          <select class="form-control" :required="forminfo.isRequired" v-model="formdata[forminfo.name]" @change="callAFunc(forminfo,null,$event)">
            <template v-for="(selection, s_index) in forminfo.selection">
              <option :value="selection.value" :key="`form-select-${f_index}-${s_index}`">{{ selection.label }}</option>
            </template>
          </select>
        </div>
         <div :id="forminfo.name" class="form-group" v-if="forminfo.type == 'button' && (forminfo.isShow == undefined || forminfo.isShow == true)">
          <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
         
           <ul><li :class="{btnRequired:asRequired}"><input type="button" :value="forminfo.btn" class="btnClass" @click="callAFunc(forminfo)"></li></ul>
          
        </div>
          <div v-html="notes[forminfo.name]">
  
          </div>
          <div v-if="forminfo.component">
            <component :is="forminfo.component" :uploadAttemptCtr="uploadCtr" :selectionKey="selectionKey" @selectionClear="clearSelection" @uploadedDocs="$emit('uploadedDocs',$event,selectionKey)"/>
          </div>
  
          <div v-if="forminfo.upload">
              <document :details="forminfo.upload_details"  @uploadedDocs="$emit('uploadedDocs', $event, forminfo.upload_details.key)" class="upload"/>
          </div>
  
        <div class="form-group mb-4" v-if="forminfo.type == 'note'">
          <paragraph :desc="forminfo.description" />
        </div>
        <div class="form-group mb-n1" v-if="forminfo.type == 'note2'">
          <label>{{ forminfo.description }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
        </div>
      </div>
    </div>
  </template>
  
  <script>
    import Paragraph from './Paragraph.vue';
    import Document from './Upload/Document.vue'
    import Helper from '~/assets/js/helper.js';
  
    export default {
      components: {
        Paragraph,
        Document
      },
      props: {
        formInfos: Array,
        dLabel:{
          type:String,
          default:null,
        },
        asRequired:{
          type:Boolean,
          default:true,
        },
        downloadable:{
          type:String,
          default:null
        },
        showDowbloadable:{
          type:Number,
          default:0
        }
      },
      watch: {
        selectedAccount() {
          if (this.selectedAccount !== "other_account") {
            this.other_account = null;
            this.other_account_required = false;
          } else {
            this.other_account_required = true;
          }

          this.persistAccountSource();
          this.recallAccount();
        },
        other_account() {
          this.persistAccountSource();
          this.recallAccount();
        },
        account_amount() {
          this.persistAccountSource();
          this.recallAccount();
        }
      },
      data: function() { 
        let formdata = [];
        let groups = {}
        let recording = Helper.recording();
        this.formInfos.map(forminfo => {
          var data = '';
          switch (forminfo.type) {
            case "select":
            case "radio":
                data = (forminfo.selection[0] ?? null) ? forminfo.selection[0].value : null;
                if(!!data){ 
                   this.costRecording({data,forminfo,recording});
                }
              break;
          }
          if (forminfo.type == "groupOfCheckboxes") {
              if (!!groups[forminfo.group]) {
                  groups[forminfo.group][forminfo.name] = false
              } else {
                  groups[forminfo.group] = {[forminfo.name]:false}
              }
          } else {
              // formdata[forminfo.name] = data;
              if (forminfo.name) {
                formdata[forminfo.name] = data;
              }
          }
          this.dLabelUpdate("$365 ($350 + Credit Card Fee $15)",recording);
        });
        formdata['groups'] = groups
        return {
          other_account_required:false,
          selectedAccount:null,
          other_account:null,
          account_amount:null,
          accountSourceKey: `mli_accountSource:${this.$route?.name || 'default'}`,
          copy:null,
          bill:0,
          costing:recording,
          selectionKey:null,
          notes:{},
          uploadCtr:null,
          state:null,
          formdata: formdata,
          currentPath: '',
          validDates:"1/20/26, 2/17/26, 3/16/26, 4/13/26, 5/11/26, 6/8/26, 7/6/26, 8/3/26, 8/31/26, 9/28/26, 10/26/26, 11/23/26, 12/21/26, 1/25/27, 2/22/27, 3/22/27, 4/19/27, 5/17/27, 6/14/27, 7/12/27, 8/9/27, 9/7/27, 10/4/27, 11/1/27, 11/29/27, 1/3/28",
        }
      },
      methods: {
        persistAccountSource() {
          if (typeof window === 'undefined' || !window.localStorage) return;

          const payload = {
            account_amount: this.account_amount,
            selectedAccount: this.selectedAccount, // personal_account / family_account / other_account
            other_account: this.other_account      // typed text when "Other"
          };

          localStorage.setItem(this.accountSourceKey, JSON.stringify(payload));
        },

        restoreAccountSource() {
          if (typeof window === 'undefined' || !window.localStorage) return;

          const saved = localStorage.getItem(this.accountSourceKey);
          if (!saved) return;

          try {
            const payload = JSON.parse(saved);
            this.account_amount = payload.account_amount ?? null;
            this.selectedAccount = payload.selectedAccount ?? null;
            this.other_account = payload.other_account ?? null;

            this.other_account_required = (this.selectedAccount === "other_account");

            // push to parent so confirmation has it even before user touches anything
            this.recallAccount();
          } catch (e) {}
        },
        recallAccount(){
           let selected = this.selectedAccount;
           if(!!selected){
            selected = selected.toUpperCase().replace('_',' ');
           }
           if(this.selectedAccount == "other_account"){
            selected = this.other_account;
           }
            this.$emit("compDetails","accountDetail",{"account_balance":this.account_amount,"account_type":selected});
      
        },
        single(func){
          setTimeout(()=>{
            this[func]();
          },2000)
        },
        radioGroup(){
          console.log(this.selectedAccount)
        },
        costRecording({data:key,forminfo:data,recording}){
          let {name=null,costs=null} = data;
          if(!!costs){
             recording.insertRecord(name,costs[key]);
          }
        },
        clearSelection(key){ 
          this.formdata[key] = null;
          this.formdata = {...this.formdata};
        },
        async callAFunc(data,valueKey=null,event=null){ 
        if(data.name == "appliedProgram"){
          if(this.formdata[data.name] == "TOEFL® Preparation Program (18 hours per week)"){
            this.$emit("update",25);
          }else if(this.formdata[data.name] == "Business Plus TOEIC® Program (18 hours per week)"){
            this.$emit("update",13);
          }else if(this.formdata[data.name] == "IELTS Preparation Program (18 hours per week)"){
            this.$emit("update",13);
          }else if(this.formdata[data.name] == "Duolingo Preparation Program (18 hours per week)"){
            this.$emit("update",13);
          }else{
             this.$emit("update",null);
          }
          this.formdata["courseDuration"] = "12_weeks";
        }
        let {callback=null,name=null,notes:defNote=null,costs=null,dLabel=null,btnkey=null} = data;
        if(!!event){ 
          this.$emit("setDownloadable",data.name,event.target.value);
           if(event.target.value.toLowerCase() == "transfer"){
            this.costing.insertRecord("optional",0);
           }else{
              this.checkOptional();
           }
        }
        if(!!defNote){ 
          this.notes[name]= defNote[this.formdata[name]];
        } 
          if(!!callback){
            await this[callback]({key:name,costs,valueKey,btnkey})
            this.dLabelUpdate("$365 ($350 + Credit Card Fee $15)");
        }
        },
        checkOptional(){
           if(!!$("#optional_0").val()){
              $("#optional_0").click();
           }else{ 
             setTimeout(()=>{
                 this.checkOptional();
            },500);
           }
        },
        dLabelUpdate(payViaStripe=null,records=null){ 
          let setLabel = payViaStripe.replace('{}',this.total(records));
              this.$emit("pushed",setLabel,this.total(records));
        },
        total(records = null){ 
          let payment = null;
          if(!!records){
            payment = [...Object.values(records.getRecords())].reduce((a, b) => parseInt(a) + parseInt(b), 0)
          }else{
            payment = [...Object.values(this.costing.getRecords())].reduce((a, b) => parseInt(a) + parseInt(b), 0)
          }
          return payment;
        },
        async deliveryMode({key,costs}){ 
          this.costing.insertRecord(key,costs[this.formdata[key]]);
          return {display:false};
        },
        async optionalFee({key,costs,valueKey}){
           this.costing.insertRecord(key,costs[valueKey]);
           return {display:false};
        },
        async services({key,costs,valueKey}){ 
           this.costing.insertRecord(key,costs[valueKey]);
           return {display:false};
        },
        documentUpload({key,btnkey}){
          this.selectionKey = key;
          this.uploadCtr = Math.random();
        },
        checkboxChanges(e) {
          const self = this;
  
          switch(this.currentPath) {
            case 'admission':
            case 'slug-admission':
  
              //Switch for the ids'
              switch (e.target.name) {
                case 'japan_country_trigger':
                  const locFormInfos = this.formInfos;
                  const arrayKey = locFormInfos.map(form => form.name == 'country').indexOf(true);
  
                  locFormInfos[arrayKey].isShow = e.target.value == "true";
                  this.formInfos = locFormInfos;
                  break;
                case 'student_visa_application':
                  const selected = e.target.value;
  
                  this.resetDate('#lesson_start_date', (selected == 'Yes') ? self.admissionYesDates : self.admissionNoDates);
                  break;
  
                default:
                  break;
              }
            break;
          }
        },
        resetDate(id, allowedDates) { 
          allowedDates = allowedDates.split(',').map((each)=>{
            let [month,day,year] = each.split('/');
            return `${day.trim()}-${month.trim()}-20${year.trim()}`;
          });
          let valid = [];
          $(id).datepicker('remove');
          $(id).datepicker({
            beforeShowDay: function (date) {
              var allDates = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
              if(allowedDates.includes(allDates)){
                valid.push(date);
                return {classes:'validDates'};
              }else{
                return false;
              }
            }
          });
  
          $(id).datepicker( "setDate", this.getProperDate(allowedDates));
         
        },
        getProperDate(allowedDates){
           let listsOfDates = [];
           allowedDates.map((each)=>{
            let [day,month, year] = each.split('-');
            let format = [month,day,year];
            let dates = new Date(format.join('/'));
            if(!!dates.getTime()){
              listsOfDates.push(dates);
            }
           });
           let unique = [...new Set(listsOfDates)];
           unique.sort((date1, date2) => date1 - date2);
           let filtered = [...unique.filter((each)=>{
            let today = new Date(new Date().setHours(0,0,0,0));
            if(each.getTime() >= today.getTime()){
              return each;
            }
           })];
           return filtered[0] ?? null;
        },
        getFormData() {
          this.formInfos.filter(forminfo => forminfo.type == 'datepicker')
                        .map(forminfo => {
                          this.formdata[forminfo.name] = $(`#${forminfo.name}`).datepicker('getFormattedDate');
                        });
  
          return this.formdata;
        }
      },
      mounted() {
        $(".date").datepicker({
          autoclose: true,
          todayHighlight: true
        }).datepicker('update', new Date());
        
        // Restore datepicker values from localStorage
        if (typeof window !== 'undefined' && window.localStorage) {
          const savedAnsweredForm = localStorage.getItem('i20application_answeredForm');
          if (savedAnsweredForm) {
            try {
              const parsed = JSON.parse(savedAnsweredForm);
              const formTypes = ['detailsForm', 'countryForm', 'applicationForm', 'servicesForm'];
              
              formTypes.forEach(formType => {
                if (parsed[formType]) {
                  this.formInfos.forEach(forminfo => {
                    if (forminfo.type === 'datepicker' && parsed[formType][forminfo.name]) {
                      // Set datepicker value after initialization
                      const dateValue = parsed[formType][forminfo.name];
                      if (dateValue) {
                        $(`#${forminfo.name}`).datepicker('setDate', dateValue);
                        this.formdata[forminfo.name] = dateValue;
                      }
                    }
                  });
                }
              });
            } catch (e) {
              console.error('Error restoring datepicker from localStorage:', e);
            }
          }
        }
  
        switch(this.currentPath) {
          case 'admission':
          case 'i20application':
            this.resetDate('#programStartDate', this.validDates);
          break;
          case 'freetrial':
          case 'slug-freetrial':
            $("#date_schedule").datepicker('remove');
            $("#date_schedule").datepicker({
              daysOfWeekDisabled: [0, 1, 5, 6]
            });
            break;
        }
      },
      created() {
        this.currentPath = this.$route.name;

        // Restore values from localStorage
        if (typeof window !== 'undefined' && window.localStorage) {
          const savedAnsweredForm = localStorage.getItem('i20application_answeredForm');
          if (savedAnsweredForm) {
            try {
              const parsed = JSON.parse(savedAnsweredForm);
              const formTypes = ['detailsForm', 'countryForm', 'applicationForm', 'servicesForm'];
              
              // Check each form type in localStorage
              formTypes.forEach(formType => {
                if (parsed[formType]) {
                  // Check if any field names from this form match the saved form data
                  this.formInfos.forEach(forminfo => {
                    if (parsed[formType][forminfo.name] != null) {
                      // Found a match, populate the value
                      if (forminfo.type === 'groupOfCheckboxes') {
                        if (!this.formdata.groups[forminfo.group]) {
                          this.formdata.groups[forminfo.group] = {};
                        }
                        this.formdata.groups[forminfo.group][forminfo.name] = parsed[formType][forminfo.name];
                      } else {
                        this.formdata[forminfo.name] = parsed[formType][forminfo.name];
                      }
                    }
                  });
                }
              });
            } catch (e) {
              console.error('Error parsing localStorage in FormHandlerL20:', e);
            }
          }
        }
        this.restoreAccountSource();
      }
    }
  </script>
  
  <style lang="scss" scoped>
  .upload{
    color: blue;
  }
  label {
    font-weight: bold;
  
    &.form-check-label {
      font-weight: unset;
    }
  }
  .btnRequired{
    color:red;
  }
  .btnClass{
    border:none;
    background:none;
    font-weight:bold;
    color:#2165B9;
    text-decoration:underline;
  }
  .downloadable{
    margin-left:45px;
  }
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
  input[type=number] {
    -moz-appearance: textfield;
  }
  </style>
  