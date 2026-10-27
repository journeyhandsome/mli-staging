<template>
    <div>
      <div class='d-flex flex-column'>
          <div @click="initiateUpload" :class="{[details.style]: true}">{{ details.description }}
            <!-- <span class="hutoaka">*</span> -->
          </div>
          <div class="d-flex flex-column">
            <div class="m-2" :class="{showMe:!isVisible}">
              <input type="file" class="form-control" :accept="mime" multiple ref="file" @change="preview">
            </div>
            <div class="docs d-flex flex-column">
              <div v-for="(per,p_index) in chunk" :key="'per'+p_index">
                  <div class="d-flex border justify-content-space">
                      <div v-for="(each,index) in per" :key="'img'+index">
                          <div class="uploadImg d-flex">
                              {{each.name}}&nbsp;
                              <!-- <img src="/assets/images/icons/cancel.svg" style="width:3% !important" class="align-self-start"  @click="cancel(index)" v-if="hasDocumentCancel"/> -->
                              <button @click="cancel(index)" class="align-self-center btnClass" v-if="hasDocumentCancel">remove</button>  
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-end mt-2" v-if="binary.length > 0">
              <button @click="add" class="btnClass">Add</button>&nbsp;&nbsp;
              <button @click="clear" class="btnClass">Clear</button>
          </div>
       </div>
    </div>
  </template>
  <script>
  export default {
    props:{
      uploadAttemptCtr:{
          type:Number,
          default:null,
      },
      isVisible:{
          type:Boolean,
          default:false,
      },
      selectionKey:{
          type:String,
          default:null,
      },
      hasDocumentCancel:{
          type:Boolean,
          default:true,
      },
      details:{
          type: Object,
          default () {
              return {}
          }
      }
    },
    watch:{
      uploadAttemptCtr(newVal,oldVal){
          this.copy = [];
          if(!!newVal){
              this.$refs['file'].click();
          }
      },
      binary(newVal,oldVal){
          this.$emit("uploadedDocs",this.binary)
      }
    },
    data() {
        return {
           copy:[],
           binary:[],
           chunk:[],
           mime:['.png','.jpg','.jpeg','.bmp','.gif','.doc','.pdf','.xls','.zip'],
        }
    },
    methods:{
          initiateUpload() {
              this.$refs['file'].click();
          },
  
          async preview(){
              this.binary = [...this.copy];
              let attachments = this.$refs["file"].files;
              let count = 0;
              [...attachments].forEach((binary) =>{
                  let src = this.base64(binary);
                  src.then((data)=>{
                      let [,type] = binary.type.split('/');
                      if(this.mime.includes(`.${type}`)){
                          this.binary.push({src:data,type:binary.type,name:binary.name});
                          this.chunk = this.sliceIntoChunks(this.binary,4);
                      }
                  })
              });
          },
          async base64(file){
              return await new Promise((resolve, reject) => {
                      const reader = new FileReader();
                      reader.readAsDataURL(file);
                      reader.onload = () => resolve(reader.result);
                      reader.onerror = error => reject(error);
              }); 
          },
          sliceIntoChunks(arr, chunkSize) {
              const res = [];
              for (let i = 0; i < arr.length; i += chunkSize) {
                  const chunk = arr.slice(i, i + chunkSize);
                  res.push(chunk);
              }
          return res;
          },
          clear(){
              this.copy =   [];
              this.binary = [];
              this.chunk  = [];
               this.$refs['file'].value = null;
              this.$emit('selectionClear',this.selectionKey);
          },
          add(e){
              e.preventDefault();
              this.copy = [...this.binary];
              this.$refs['file'].click();
          },
          cancel(index){
             delete this.binary[index];
             this.binary = [...this.binary.filter((x)=>x)];
             this.chunk = this.sliceIntoChunks(this.binary,4);
             if(this.chunk.length <= 0){
              this.clear();
             }
          }
      },
  }
  </script>
  <style scoped>
   .showMe{
      position: absolute;
      visibility:hidden;
      top:-3000px;
   }
   .uploadImg{
      width:auto;
      margin:5px;
      padding:3px;
      box-sizing: border-box;
      cursor: pointer;
   }
   .uploadImages{
      width:200px;
   }
   .cancel{
      color:red;
      font-weight: bold;
      cursor: pointer;
  
   }
   .btnClass{
    border:none;
    background:none;
    font-weight:bold;
    color:#2165B9;
    text-decoration:underline;
  }
  
  .docs {
      overflow: scroll;
  }
  .docs::-webkit-scrollbar {
    display: none;
  }
  .docs {
      -ms-overflow-style: none;  /* Internet Explorer and Edge */
      scrollbar-width: none;  /* Firefox */
  }
  
  .style_1 {
      font-weight: bolder;
      /* margin: 5px 0 5px; */
      cursor: pointer;
  }
  </style>
   