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
          <form-handler :formInfos="details.customerInfo.form" ref="detailsForm" />

          <h3 v-if="details.application.title && lang != 'jp'">{{ details.application.title }}</h3>
          <form-handler :formInfos="details.application.form" ref="applicationForm" />

          <h3 v-if="details.processingFee.title && lang != 'jp'">{{ details.processingFee.title }}</h3>
          <form-handler v-if="details.processingFee.form && lang != 'jp'" :formInfos="details.processingFee.form" ref="processingForm" />

          <div class="regulations">
            <h1 class="mt-3 text-center">{{ details.processingFee.subtitle }}</h1>

            <div v-for="(det, d_index) in details.processingFee.details" :key="`processing-fee-${d_index}`">
              <h3>{{ det.title }}</h3>
              <paragraph :desc="det.description" />
            </div>
          </div>

          <form-handler :formInfos="details.processingFee.additional_form" ref="additionalForm" />

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
                {{ answeredForm.customerInfo[customer.name] }}
              </div>
            </div>
          </template>
        </div>
        <h3>{{ (details.application.new_title) ? details.application.new_title : details.application.title }}</h3>
        <div class="container">
          <template v-for="(customer, c_index) in details.application.form">
            <div v-if="customer.type != 'note'" class="row mb-2 fields" :key="`customer-info-${c_index}`">
              <div class="col-lg-1">
                <i :class="`bi bi-${customer.icon}`"></i>
              </div>
              <div class="col-lg-5">
                {{ (customer.new_label) ? customer.new_label : customer.label }}
              </div>
              <div class="col-lg-6">
                {{ answeredForm.applicationInfo[customer.name] }}
              </div>
            </div>
          </template>
        </div>
        <h3>{{ details.processingFee.new_title }}</h3>
        <div class="container">
          <div class="row mb-2 fields" v-for="(customer, c_index) in details.processingFee.form" :key="`customer-info-${c_index}`">
            <div class="col-lg-1">
              <i :class="`bi bi-${customer.icon}`"></i>
            </div>
            <div class="col-lg-5">
              {{ (customer.new_label) ? customer.new_label : customer.label }}
            </div>
            <div class="col-lg-6">
              <template v-if="customer.name == 'pay-via-stripe'">
                {{ customer.new_result }}
              </template>
              <template v-else>
                {{ answeredForm.paymentInfo[customer.name] }}
              </template>
            </div>
          </div>
        </div>
        <template v-if="isLoading">
          <button class="btn btn-primary btn-block" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
          </button>
        </template>
        <template v-else>
          <button type="button" class="btn btn-lg btn-back-soft btn-block mb-2 mt-5" @click="backToForm">
            Back to Previous Page to Edit
          </button>
          <button type="button" class="btn btn-lg btn-primary btn-block" @click="onSubmit">{{ details.btn_confirmation }}</button>
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
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params, $axios }) {
			const details = await $content(`admission/en`).fetch();
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
      }
    },
    methods: {
      showConfirmation(e) {
        e.preventDefault();
        this.answeredForm.customerInfo = { ...this.$refs.detailsForm.getFormData() };
        this.answeredForm.applicationInfo = { ...this.$refs.applicationForm.getFormData() };
        this.answeredForm.paymentInfo = { ...this.$refs.processingForm.getFormData() };
        this.answeredForm.additionalForm = { ...this.$refs.additionalForm.getFormData() };
        delete this.answeredForm.additionalForm.agree_terms;
        this.isDefaultView = false;

        //For Handling Japanese Changes on Country
        if(this.lang == 'jp') {
          const customerInfo = this.answeredForm.customerInfo;

          if(customerInfo.japan_country_trigger == "false") {
            this.answeredForm.customerInfo.country = customerInfo.nationality;
          }
        }
          // ✅ Save draft
        if (typeof window !== 'undefined' && window.localStorage) {
          localStorage.setItem('onlineApplication_answeredForm', JSON.stringify(this.answeredForm));
          localStorage.setItem('onlineApplication_isDefaultView', JSON.stringify(this.isDefaultView));
        }
      },
      handleSubmit() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      },
      async onSubmit() {
        this.isLoading = true;
        const self = this;
        const { customerInfo, applicationInfo } = this.answeredForm;
        const mname = customerInfo.mname ? customerInfo.mname : '';
        const dataFields = {
          language: this.lang,
          fname: customerInfo.fname,
          mname: mname,
          lname: customerInfo.lname,
          name: `${customerInfo.fname} ${mname} ${customerInfo.lname}`,
          birthday: customerInfo.birthday,
          gender: customerInfo.gender,
          phone: customerInfo.tel,
          email: customerInfo.email,
          nationality: customerInfo.nationality,
          country: customerInfo.country,
          student_visa_application: customerInfo.student_visa_application,
          campus: this.lang == 'jp' ? customerInfo.campus : applicationInfo.campus,
          accommodation_arrangements: applicationInfo.accommodation_arrangements,
          lesson_start_date: applicationInfo.lesson_start_date,
          length_of_program: applicationInfo.length_of_program,
          promo_code: applicationInfo.promo_code,
          message: applicationInfo.message
        }

        await this.$axios.post('/api/online-application', dataFields).then((response) => {
          this.isLoading = false;
          
            if (typeof window !== 'undefined' && window.localStorage) {
              localStorage.removeItem('onlineApplication_answeredForm');
              localStorage.removeItem('onlineApplication_isDefaultView');
            }
          window.location.href=response.data.Location;
        }).catch(function(error) {
          console.log('error: ', error);
          self.loading = false;
        });
      },
      backToForm() {
        this.isDefaultView = true;

        if (typeof window !== 'undefined' && window.localStorage) {
          localStorage.setItem('onlineApplication_isDefaultView', JSON.stringify(true));
        }

        this.$nextTick(() => {
          this.$refs.detailsForm?.setFormData?.(this.answeredForm.customerInfo);
          this.$refs.applicationForm?.setFormData?.(this.answeredForm.applicationInfo);
          this.$refs.additionalForm?.setFormData?.(this.answeredForm.additionalForm);
          this.$refs.processingForm?.setFormData?.(this.answeredForm.paymentInfo);

          const additional = { ...(this.answeredForm.additionalForm || {}) };
          delete additional.agree_terms;
          this.$refs.additionalForm?.setFormData?.(additional);

          window.scrollTo({ top: 0, behavior: 'smooth' });
        });
      },
    },
    mounted() {
      if (typeof window !== 'undefined' && window.localStorage) {
        const savedAnsweredForm = localStorage.getItem('onlineApplication_answeredForm');
        const savedIsDefaultView = localStorage.getItem('onlineApplication_isDefaultView');

        if (savedAnsweredForm) {
          try { this.answeredForm = JSON.parse(savedAnsweredForm); } catch (e) {}
        }

        if (savedIsDefaultView !== null) {
          try { this.isDefaultView = JSON.parse(savedIsDefaultView); } catch (e) {
            this.isDefaultView = true;
          }
        }
      }
    },
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