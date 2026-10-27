<template>
  <div class="container">
    <div class="col-lg-12">
      <template v-if="isDefaultView">
        <h1>{{ details.title }}</h1> 

        <template v-if="details.flow">
          <div class="container mt-5 mb-5 flow">
            <div class="row align-items-center">
              <div class="col-lg-4 text-center" v-for="(step, s_index) in details.flow.steps" :key="`steps${s_index}`">
                <div class="container p-3" :style="`background-color: ${step.bgcolor};`" >
                  <button class="btn btn-light">{{ step.key }} <span class="step">{{ s_index + 1 }}</span></button>
                  <br />
                  <span class="description">{{ step.value }}</span>
                </div>
              </div>
            </div>
            <div class="row blue-border-notes col-lg-12 notes">
              <paragraph :desc="details.flow.notes" />
            </div>
          </div>
        </template>

        <paragraph v-if="details.subtitle" :desc="details.subtitle" />

        <div v-if="details.cards" class="mb-5">
          <img v-for="(card, c_index) in details.cards" :key="`card-${c_index}`" :src="`/assets${card}`" alt="Credit Card" />
        </div>

        <form v-on:submit.prevent="showConfirmation" method="post">
          <h3 v-if="lang == 'jp'">{{ details.customerInfo.title }}</h3>
          <form-handler-l20 :formInfos="details.customerInfo.form" ref="detailsForm"  @pushed="pushedData" @setDownloadable="setDownloadable"/>
          <h3 v-if="details.homeCountry.title">{{ details.homeCountry.title }}</h3>
          <form-handler-l20 :formInfos="details.homeCountry.form" ref="countryForm" @pushed="pushedData"/>
          <h3 v-if="details.application.title">{{ details.application.title }}</h3>
          <form-handler-l20 :formInfos="details.application.form" ref="applicationForm" @pushed="pushedData" @update="updateForm"/>
           
           <h3 v-if="details.passport.title">{{ details.passport.title }}</h3>
          <form-handler-l20 :formInfos="details.passport.form" ref="passportForm" @pushed="pushedData" @uploadedDocs="uploadedDocs" :asRequired="asRequired['supportingDocumentPassport']"/>
           <!-- <h3 v-if="details.financial.title">{{ details.financial.title }}</h3> -->
          <form-handler-l20 :formInfos="details.financial.form" ref="financialForm" @pushed="pushedData" @uploadedDocs="uploadedDocs" :asRequired="asRequired['supportingDocumentFinancial']"/>
          <form-handler-l20 :formInfos="details.accountSource.form" ref="accountSourceForm" @compDetails="compDetails"/>
         
           <template v-if="showDowbloadable">
            <form-handler-l20 :formInfos="details.visa.form" ref="visaForm" @pushed="pushedData" @uploadedDocs="uploadedDocs" :asRequired="asRequired['supportingDocumentVisa']"/>
            <form-handler-l20 :formInfos="details.i94.form" ref="i94Form" @pushed="pushedData" @uploadedDocs="uploadedDocs" :asRequired="asRequired['supportingDocumentI94']"/>
            <form-handler-l20 :formInfos="details.transfer_form.form" ref="transfer_formForm" @pushed="pushedData" @uploadedDocs="uploadedDocs" :asRequired="asRequired['supportingDocumentTransferForm']" :downloadable="downloadable" :showDowbloadable="showDowbloadable"/>
          </template>
          
          <template v-if="!showDowbloadable">
            <h3 v-if="details.optional.title">{{ details.optional.title }}</h3>
            <form-handler-l20 v-if="details.optional.form" :formInfos="details.optional.form" ref="processingForm" @pushed="pushedData"/>
          </template>
          <h3 v-if="details.services.title">{{ details.services.title }}</h3>
          <form-handler-l20 v-if="details.services.form" :formInfos="details.services.form" ref="servicesForm" @pushed="pushedData"/>

          <template v-if="hasPayment">
            <h3 v-if="details.processingFee.title">{{ details.processingFee.title }}</h3>
            <form-handler-l20 v-if="details.processingFee.form" :formInfos="details.processingFee.form" ref="processingForm" :dLabel="dLabel"/>
          </template>
          <div class="regulations">
            <h1 class="mt-3 text-center">{{ details.processingFee.subtitle }}</h1>

            <div v-for="(det, d_index) in details.processingFee.details" :key="`processing-fee-${d_index}`">
              <h3>{{ det.title }}</h3>
              <paragraph :desc="det.description" />
            </div>
          </div>

          <form-handler-l20 :formInfos="details.processingFee.additional_form" ref="additionalForm" />

          <button type="submit" class="btn btn-lg btn-success btn-block" @click="handleSubmit">{{ details.btn_label }}</button>
        </form>
      </template>
      <template v-else>
        <h1>{{ details.confirmation }}</h1>
        <h3>{{ details.customerInfo.title }}</h3>
        <div class="container">
          <template v-for="(customer, c_index) in details.customerInfo.form">
            <div v-if="customer.type != 'note' && customer.name != 'japan_country_trigger'" class="row mb-2 fields" :key="`customer-info-${c_index}`">
              <div class="col-lg-1">
                <i :class="`bi bi-${customer.icon}`"></i>
              </div>
              <div class="col-lg-5">
                {{ (customer.new_label) ? customer.new_label : customer.label }}
              </div>
              <div class="col-lg-6">
                {{ answeredForm.detailsForm[customer.name] }}
              </div>
            </div>
          </template>
          <h3>{{ details.homeCountry.title }}</h3>
          <template v-for="(customer, c_index) in details.homeCountry.form">
            <div v-if="customer.type != 'note' && customer.name != 'japan_country_trigger'" class="row mb-2 fields" :key="`home-country-${c_index}`">
              <div class="col-lg-1">
                <i :class="`bi bi-${customer.icon}`"></i>
              </div>
              <div class="col-lg-5">
                {{ (customer.new_label) ? customer.new_label : customer.label }}
              </div>
              <div class="col-lg-6">
                {{ answeredForm.countryForm[customer.name] }}
              </div>
            </div>
          </template>
           <h3>{{ details.application.title }}</h3>
          <template v-for="(customer, c_index) in details.application.form">
            <div v-if="customer.type != 'note' && customer.name != 'japan_country_trigger'" class="row mb-2 fields" :key="`application-${c_index}`">
              <div class="col-lg-1">
                <i :class="`bi bi-${customer.icon}`"></i>
              </div>
              <div class="col-lg-5">
                {{ (customer.new_label) ? customer.new_label : customer.label }}
              </div>
              <div class="col-lg-6" v-html="formatToUpper(answeredForm.applicationForm[customer.name],customer.name)">
              </div>
            </div>
          </template>
          <template>
            <div class="row mb-2 fields" :key="`passport`">
             <div class="col-lg-1"></div>
            <div class="col-lg-5">
               Supporting Document (Passport)
            </div>
              <div class="col-lg-6">
               <div class="d-flex flex-column">
                  <div v-for="(each,index) in answeredForm.supportingDocumentPassport" :key="`passport_${index}`">
                    {{each.name}}
                  </div>
               </div>
              </div>
            </div>
          </template>
          <template>
            <div class="row mb-2 fields" :key="`financial`">
             <div class="col-lg-1"></div>
            <div class="col-lg-5">
               Supporting Document (Financial Statement/ Bank Statement)
            </div>
              <div class="col-lg-6">
               <div class="d-flex flex-column">
                  <div v-for="(each,index) in answeredForm.supportingDocumentFinancial" :key="`financial_${index}`">
                    {{each.name}}
                  </div>
               </div>
              </div>
            </div>
             <div class="row mb-2 fields" :key="`accountBal`">
             <div class="col-lg-1"></div>
            <div class="col-lg-5">
               Account Balance (U.S dollar)
            </div>
              <div class="col-lg-6">
               <div class="d-flex flex-column">
                  <div>
                    {{answeredForm.supportingDocumentFinancialDetails[0]["account_balance"]}}
                  </div>
               </div>
              </div>
            </div>
             <div class="row mb-2 fields" :key="`accountType`">
             <div class="col-lg-1"></div>
            <div class="col-lg-5">
               Account Source
            </div>
              <div class="col-lg-6">
               <div class="d-flex flex-column">
                  <div>
                    {{answeredForm.supportingDocumentFinancialDetails[0]["account_type"]}}
                  </div>
               </div>
              </div>
            </div>
          </template>
          
          <template v-if="showDowbloadable > 0">
          <template>
            <div class="row mb-2 fields" :key="`visa`">
             <div class="col-lg-1"></div>
            <div class="col-lg-5">
               Supporting Document (Visa)
            </div>
              <div class="col-lg-6">
               <div class="d-flex flex-column">
                  <div v-for="(each,index) in answeredForm.supportingDocumentVisa" :key="`visa_${index}`">
                    {{each.name}}
                  </div>
               </div>
              </div>
            </div>
          </template>
           <template>
            <div class="row mb-2 fields" :key="`i94`">
             <div class="col-lg-1"></div>
            <div class="col-lg-5">
               Supporting Document (I94)
            </div>
              <div class="col-lg-6">
               <div class="d-flex flex-column">
                  <div v-for="(each,index) in answeredForm.supportingDocumentI94" :key="`i94_${index}`">
                    {{each.name}}
                  </div>
               </div>
              </div>
            </div>
          </template>
          <template>
            <div class="row mb-2 fields" :key="`transfer_form`">
             <div class="col-lg-1"></div>
            <div class="col-lg-5">
               Supporting Document (Signed Transfer Form)
            </div>
              <div class="col-lg-6">
               <div class="d-flex flex-column">
                  <div v-for="(each,index) in answeredForm.supportingDocumentTransferForm" :key="`transfer_form_${index}`">
                    {{each.name}}
                  </div>
               </div>
              </div>
            </div>
          </template>
          </template>


           <h3>{{ details.services.title }}</h3>
          <template v-for="(customer, c_index) in details.services.form">
            <div v-if="customer.type != 'note' && customer.name != 'japan_country_trigger'" class="row mb-2 fields" :key="`services-${c_index}`">
              <div class="col-lg-1">
                <i :class="`bi bi-${customer.icon}`"></i>
              </div>
              <div class="col-lg-5">
                {{ (customer.new_label) ? customer.new_label : customer.label }}
              </div>
              <div class="col-lg-6" v-html="formatToUpper(answeredForm.servicesForm[customer.name],customer.name)">
              </div>
            </div>
          </template>
        </div>
        <template v-if="hasPayment">
        <h3>{{ details.processingFee.new_title }}</h3>
        <div class="container">
          <div class="row mb-2 fields" v-for="(customer, c_index) in details.processingFee.form" :key="`customer-info-${c_index}`">
            <div class="col-lg-1">
              <i :class="`bi bi-${customer.icon}`"></i>
            </div>
            <div class="col-lg-5">
              {{ (customer.new_label) ? customer.new_label : ''}}
            </div>
            <div class="col-lg-6">
              <template v-if="customer.name == 'pay-via-stripe'">
                {{ customer.new_result }} 
              </template>
              <template v-else>
                {{customer.currency}}{{answeredForm.servicesForm.fee}} ($350 + Credit Card Fee $15)
              </template>
            </div>
          </div>
        </div>
        </template>
        <template v-if="isLoading">
          <button class="btn btn-primary btn-block" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
          </button>
        </template>
        <template v-else>
          <template v-if="hasPayment">
            <button type="button" class="btn btn-lg btn-back-soft btn-block mb-2 mt-5" @click="backToForm">
              Back to Previous Page to Edit
            </button>
            <button type="button" class="btn btn-lg btn-primary btn-block" @click="onSubmit">{{ details.btn_confirmation }}</button>
          </template>
          <template v-else>
            <button type="button" class="btn btn-lg btn-back-soft btn-block mb-2 mt-5" @click="backToForm">
              Back to Previous Page to Edit
            </button>
            <button type="button" class="btn btn-lg btn-primary btn-block" @click="onSubmit(false)">{{ directEmailText }}</button>
          </template>
        </template>
      </template>
    </div>
    <brochure />
    <div class="modal fade calendar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <img :src="`/assets/images/common/calendar.jpg`" alt="Calendar 2020" />
        </div>
      </div>
    </div>
    <!-- Attachment Required Modal -->
    <div class="modal fade attachment-required" tabindex="-1" role="dialog" aria-labelledby="attachmentRequiredLabel" aria-hidden="true"> 
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="attachmentRequiredLabel">Required Attachment Missing</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <p>Please upload the following required document(s):</p>
            <ul class="mb-0">
              <li v-for="(err, i) in attachmentErrors" :key="`att-err-${i}`">
                {{ err }}
              </li>
            </ul>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Helper from '~/assets/js/helper.js';
	export default {
    async asyncData({ $content, params, $axios }) { 
     
			let details = await $content(`i20application/en`).fetch();
       details = await Helper.getFieldContent({
                    content:$content,
                    reference:details,
                    partial:['country'],
                     keys:['customerInfo','homeCountry','application','passport','financial','accountSource','visa','i94','transfer_form','processingFee']
                  })
                  .then(res=>{
                    return res;
                  }); 
      const lang = params.slug;
			return {
				details,
        lang,
        $axios
			}
		},
		head() {
			if(this.details) {
				return {
					title: this.details.pageTitle,
					meta: [
						{
						hid: 'description',
						name: 'description',
						content: this.details.pageDescription
						}
					],
				}
			}
		},
    data: function() {
      return {
        answeredForm: {
          customerInfo: {},
          applicationInfo: {},
          paymentInfo: {},
          additionalForm: {}
        },
        isDefaultView: true,
        isLoading: false,
        dLabel:null,
        uploadedLists:[],
        uploadedListsKey:null,
        dAmount:0,
        entries:null,
        asRequired:{supportingDocumentPassport:true,supportingDocumentFinancial:true,supportingDocumentVisa:false,supportingDocumentI94:false,supportingDocumentTransferForm:false},
        hasPayment:true,
        directEmailText:'Confirmed',
        downloadable:'hollywood',
        showDowbloadable:null,
        sevis:true,
        fromComponent:{},
        attachmentErrors:[],
      }
    },
    mounted() {
      if (typeof window !== 'undefined' && window.localStorage) {
        const savedAnsweredForm = localStorage.getItem('i20application_answeredForm');
        const savedEntries = localStorage.getItem('i20application_entries');
        const savedIsDefaultView = localStorage.getItem('i20application_isDefaultView');

        if (savedAnsweredForm) {
          try { this.answeredForm = JSON.parse(savedAnsweredForm); } catch (e) {}
        }

        if (savedEntries) {
          try { this.entries = JSON.parse(savedEntries); } catch (e) {}
        }
        if (savedIsDefaultView !== null) {
          try { this.isDefaultView = JSON.parse(savedIsDefaultView); } catch (e) {
            this.isDefaultView = true;
          }
        } else {
          this.isDefaultView = true;
        }
      }
    },
    methods: {
      backToForm() {
        this.isDefaultView = true;

        if (typeof window !== 'undefined' && window.localStorage) {
          localStorage.setItem('i20application_isDefaultView', JSON.stringify(true));
        }

        this.$nextTick(() => {
          window.scrollTo({ top: 0, behavior: 'smooth' });
        });
      },
      compDetails(key,data){
        this.fromComponent[key] = [data];
      },
      updateForm(num){
        let weeks =  Helper.scheduleToObject("Week|Weeks",12,48);
        let copy = [...this.details.application.form];
         copy.map((each)=>{
          if(each.name == "courseDuration"){ 
           each.selection = !!num ? [...weeks.slice(0,num)]:[...weeks];
          }
         });
        this.details.application.form = [...copy];
      },
      setDownloadable(name,selected){
        if(name == 'campus'){
          this.downloadable = selected.toLowerCase();
        }else if(name == 'studentType'){
          if(selected == "Transfer"){
            this.asRequired.supportingDocumentVisa = true;
            this.asRequired.supportingDocumentI94 = true;
            this.asRequired.supportingDocumentTransferForm = true;
            this.showDowbloadable = Math.random() + 1;
            this.sevis = false;

            this.details.homeCountry.title = "Address in the U.S.";

          }else{
            this.asRequired.supportingDocumentVisa = false;
            this.asRequired.supportingDocumentI94 = false;
            this.asRequired.supportingDocumentTransferForm = false;
            this.showDowbloadable = 0;
            this.sevis = true;
            
            this.details.homeCountry.title = "Home Country Address";

          }
          
        }
      },
      uploadedDocs(data,key){
        this.uploadedLists[key] = [...data];
        this.uploadedListsKey = key;
        if(data.length > 0){
          this.asRequired[key] = false;
          // Clear error for this attachment if it was uploaded
          if (this.attachmentErrors.length > 0) {
            const attachmentLabels = {
              'supportingDocumentPassport': 'Passport',
              'supportingDocumentFinancial': 'Financial Statement/Bank Statement',
              'supportingDocumentVisa': 'Visa',
              'supportingDocumentI94': 'I94',
              'supportingDocumentTransferForm': 'Signed Transfer Form'
            };
            const labelToRemove = attachmentLabels[key];
            if (labelToRemove) {
              this.attachmentErrors = this.attachmentErrors.filter(error => error !== labelToRemove);
            }
          }
        }else{
           this.asRequired[key] = true;
        }
         this.asRequired = {...this.asRequired};
         
      },
      formatToUpper(str,key=null){
      if(!!str && !Array.isArray(str)){
          let formatted = str.split('_').map((each)=>{
          if(!!each){
            let letters = [...each]
            letters[0] = letters[0].toUpperCase();
            return letters.join('');
          }
        }).join(' ');
        return formatted;
      }else{
        if(!!key){
           if(key == "supportingDocument" && str.length > 0){
            let lists = `<h5>${this.formatToUpper(this.uploadedListsKey)}</h5><div class='d-flex' style='overflow:scroll'>`; 
            str.map((each)=>{
              let {src,name} = each;
              lists += `<div style='margin:10px'>
                          <img src="${src}" style="width:100px">
                       </div>`;
              });
            lists += `</div>`;
            return lists;
           }else{
            return null;
           }
        }else{return null}
      }
      },
      pushedData(data,amount){
       this.dLabel = data;
       this.dAmount = amount;
       if(amount == 0){
        this.hasPayment = false;
       }else{
        this.hasPayment = true;
       }
      },
      showConfirmation(e) {
        e.preventDefault();
        
        // Validate required attachments
        this.attachmentErrors = [];
        const attachmentLabels = {
          'supportingDocumentPassport': 'Passport',
          'supportingDocumentFinancial': 'Financial Statement/Bank Statement',
          'supportingDocumentVisa': 'Visa',
          'supportingDocumentI94': 'I94',
          'supportingDocumentTransferForm': 'Signed Transfer Form'
        };

        // Check each required attachment
        Object.keys(this.asRequired).forEach(key => {
          if (this.asRequired[key] === true) {
            const attachment = this.uploadedLists[key];
            if (!attachment || attachment.length === 0 || attachment === null) {
              this.attachmentErrors.push(attachmentLabels[key] || key);
            }
          }
        });

        // If there are attachment errors, display them and prevent showing confirmation
        if (this.attachmentErrors.length > 0) {
          this.$nextTick(() => {
            window.scrollTo({ top: 0, behavior: 'smooth' });

                // show modal (same as bootstrap calendar modal behavior)
              if (typeof window !== 'undefined' && window.$) {
                window.$('.attachment-required').modal('show');
              }
          });
          return;
        }
        if(!Object.values(this.asRequired).find((each)=>each===true)){
          this.answeredForm.detailsForm = Object.assign({},this.$refs.detailsForm.getFormData());
          this.answeredForm.countryForm = Object.assign({},this.$refs.countryForm.getFormData());
          this.answeredForm.applicationForm = Object.assign({},this.$refs.applicationForm.getFormData());
          this.answeredForm.supportingDocumentPassport = this.uploadedLists['supportingDocumentPassport'];
          this.answeredForm.supportingDocumentFinancial = this.uploadedLists['supportingDocumentFinancial'];
          this.answeredForm.supportingDocumentFinancialDetails = this.fromComponent["accountDetail"] ?? [{"account_balance":0,"account_type":null}];
          this.answeredForm.supportingDocumentVisa = this.uploadedLists['supportingDocumentVisa'];
             this.answeredForm.supportingDocumentI94 = this.uploadedLists['supportingDocumentI94'];
             this.answeredForm.supportingDocumentTransferForm = this.uploadedLists['supportingDocumentTransferForm'];
          this.answeredForm.servicesForm = Object.assign({},this.$refs.servicesForm.getFormData());
          this.answeredForm.servicesForm.fee = this.dAmount;
          this.answeredForm.servicesForm.fee_currency = "usd";
          this.isDefaultView = false;
          
          let {applicationForm,countryForm,detailsForm,servicesForm,
               supportingDocumentPassport,
               supportingDocumentFinancial,
               supportingDocumentFinancialDetails,
               supportingDocumentVisa,
               supportingDocumentI94,
               supportingDocumentTransferForm
               } = {...this.answeredForm};
          let entries = {...applicationForm,...countryForm,...detailsForm,...servicesForm,
                        passport:[...supportingDocumentPassport ?? []],
                        financial:[...supportingDocumentFinancial ?? []],
                        visa:[...supportingDocumentVisa ?? []],
                        i94:[...supportingDocumentI94 ?? []],
                        transfer_form:[...supportingDocumentTransferForm ?? []],
                        account_balance:supportingDocumentFinancialDetails[0]["account_balance"],
                        account_type:supportingDocumentFinancialDetails[0]["account_type"]
                        }
          this.entries = entries;
          
          // Save to localStorage
          if (typeof window !== 'undefined' && window.localStorage) {
            localStorage.setItem('i20application_answeredForm', JSON.stringify(this.answeredForm));
            localStorage.setItem('i20application_entries', JSON.stringify(this.entries));
            localStorage.setItem('i20application_isDefaultView', JSON.stringify(this.isDefaultView));
          }
        }
      },
      handleSubmit() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      },
      async onSubmit(payment=true) {
        this.isLoading = true;
        if (typeof window !== 'undefined' && window.localStorage) {
          localStorage.removeItem('i20application_answeredForm');
          localStorage.removeItem('i20application_entries');
          localStorage.removeItem('i20application_isDefaultView');
        }
        await this.$axios.post('/api/online-application-l20', {'entries':JSON.stringify(this.entries),payment})
          .then(response => {
            this.isLoading = false;
            // Clear localStorage after successful submission

            window.location.href=response.data.Location;
          }).catch(function(error) {
            console.log('error: ', error);
            this.loading = false;
          });
      }
    }
	}
</script>

<style lang="scss" scoped>
.regulations {
  height: 400px;
  overflow-y: auto;
  width: 100%;
  padding: 8px 15px;
  border: 1px solid #d0d5d8;
  border-radius: 3px;
}
.fields {
  background: #eee;
  padding: 10px 10px;
  border: 1px solid #ddd;
  border-radius: 25px;
}
.flow {
  .notes div {
    margin: 0 auto;
  }
  .step {
    font-weight: bold;
    font-size: 1.2rem;
  }
  span.description {
    color: #FFFFFF;
  }
}
.btn-back-soft {
  background-color: #aec8f2;
  color: #2165B9;
  border: 1px solid #aec8f2;
}

.btn-back-soft:hover {
  background-color: #aec8f2;
  color: #2165B9;
}
</style>

<style lang="scss">
.flow {
  .notes p {
    text-align: center !important;
  }
}
</style>
<style>
.validDates{
  font-weight:bolder !important;
}
</style>