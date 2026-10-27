<template>
  <div class="row">
    <div class="col-lg-12">
      <h1>{{ details.title }}</h1>
      <h1 class="main-title">{{ details.header }}</h1>
	 <img :src="`/assets${details.image}`" class="w-100" :alt="details.title" />
      <paragraph :desc="details.subtitle" />
     
	<form v-on:submit.prevent="onSubmit" method="post">
        <form-handler-l20 :formInfos="details.form" ref="refForm" @uploadedDocs="uploadedDocs"/>
        <template v-if="isLoading">
          <button class="btn btn-primary btn-block" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
          </button>
        </template>
        <template v-else>
            <div class="alert alert-warning" v-if="emptyFields">
                <strong>Notice!</strong> All fields with <span style="color:red;font-weight:700">'*'</span> is required! Thank you.
            </div>
          <button type="submit" class="btn btn-primary btn-block">{{ details.btn_label }}</button>
        </template>
	</form>
    </div>

    <brochure />
  </div>
</template>

<script>
  import helpers from '../../plugins/helpers.js';
	export default {
    async asyncData({ $content, $axios, params }) {
      const details = await $content(`careers/${params.slug}`).fetch();
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
        isLoading: false,
        uploads: {coverLetter:null, resume:null},
        emptyFields:false,
      }
    },
    methods: {
      uploadedDocs(data, key){
       this.uploads[key] = data
      },
      checkRequired(data) {
        let isEmpty =  true;
        if (
            Object.values(data.groups.positions).some(val => val === true) && 
            Object.values(data.groups.campus).some(val => val === true) &&
            !!this.uploads['coverLetter'] &&
            !!this.uploads['resume'] &&
            this.uploads['coverLetter'].length > 0 &&
            this.uploads['resume'].length > 0 ) {
                isEmpty = false
        }
        
        return isEmpty;
      },
      async onSubmit(e) {
       
        if (this.checkRequired(this.$refs.refForm.formdata)) {
            this.emptyFields = true

            setTimeout(()=> {
                this.emptyFields = false
            }, 5000)

            return false;
        }
        e.preventDefault();
        this.isLoading = true;
        const dataFields = Object.assign({}, this.$refs.refForm.formdata);
              dataFields['uploads'] = this.uploads
              dataFields.language = this.lang;
              dataFields.utm_source = helpers.getToken('utm_source');
        await this.$axios.post('/api/careers', dataFields).then(function(response) {
          this.isLoading = false;
          window.location.href = '/career/thanks';
        }.bind(this))
        .catch((e)=>{
            console.log("too large")
            this.isLoading = false;
        });
      }
    },
    mounted() {
      helpers.setToken('utm_source', this.$route.query.utm_source);
    },
	}
</script>

<style lang="scss" scoped>
.main-title {
  font-size: 45px;
  line-height: 55px;
  text-align: center;
}
@media screen and (min-width: 768px) {
  .main-title {
    font-size: 50px;
  }
}
</style>