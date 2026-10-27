<template>
  <div class="container">
    <div class="col-lg-12">
      <h1>{{ details.title }}</h1>
    <paragraph v-if="details.subtitle" :desc="details.subtitle" />
      <form v-on:submit.prevent="onSubmit" method="post">
        <h3> {{ details.studentInfo.title }}</h3> 
        <form-handler :formInfos="details.studentInfo.form" ref="studentForm"/>
          <template>
            <div class="form-group mb-4">
            <label class="labelClass">Payment Details</label>
            <select class="form-control" v-model="payment_details" id="" required> 
                <option value="Processing Fee">Processing Fee</option>
                <option value="Tuition">Tuition</option>
                <option value="Tuition split payment/ installment">Tuition split payment/ installment</option>
                <option value="Tuition Deposit">Tuition Deposit</option>
                <option value="Tuition balance">Tuition balance</option>
                <option value="Shipping Fee">Shipping Fee</option>
                <option value="SEVIS Fee">SEVIS Fee</option>
                <option value="Textbooks">Textbooks</option>
                <option value="AI TOEFL Test">AI TOEFL Test</option>
                <option value="Official documents">Official documents</option>
                <option value="Others">Others</option>
            </select>
            </div>
            <div class="form-group mb-4"  v-if="payment_details === 'Others'">
              <input type="text" placeholder="Please input other details here" size="98%" style="border: 1px solid #ced4da; height: 40px;" v-model="payment_others" required>
            </div>
        </template>  
        <template v-if="isLoading">
          <button class="btn btn-success btn-block" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading... Please Wait
          </button>
        </template>
        <template v-else>
          <button type="submit" style="color: white;" class="btn btn-warning btn-block">{{ details.btn_label }}</button>
        </template>
      </form>
    </div>
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, $axios, params }) {
      const details = await $content(`payment/en`).fetch();
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
        payment_details: null,
        payment_others: null,
        answeredForm: {
          studentInfo: {
          }
        },
        isLoading: false,
        isRequired: false,
      }
    },
    methods: {
      async onSubmit(e) {
        // console.log('p '+document.getElementById("percent").value);
        e.preventDefault();
        this.isLoading = true;
        const self = this;
        this.answeredForm.studentInfo = Object.assign({}, this.$refs.studentForm.getFormData());
        const { studentInfo } = this.answeredForm;
        const dataFields = {
              language : this.lang,
              fname: studentInfo.fname,
              lname: studentInfo.lname,
              agency: studentInfo.agency,
              date: studentInfo.date,
              campus: studentInfo.campus,
              amount: studentInfo.amount,
              percent: studentInfo.percent ? studentInfo.percent : document.getElementById("percent").value,
              payment_details : this.payment_details,
              payment_others : this.payment_others,  
        };
        console.log(dataFields);
        await this.$axios.post('/api/payment', dataFields).then(function(response) {
          self.isLoading = false;
          window.location.href=response.data.Location;
        }).catch(function(error) {
          console.log('error: ', error);
          self.loading = false;
        });
      }
    }
	}
</script>

<style lang="scss" scoped>
.labelClass {
  font-size: 1rem;
  line-height: 1.5; 
  color: #212529;
  font-weight: 700;
}
</style>