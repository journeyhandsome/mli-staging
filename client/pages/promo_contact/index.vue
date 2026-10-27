<template>
  <div class="container">
    <div class="col-lg-12">
      <h1>{{ details.title }}</h1>

      <paragraph v-if="details.subtitle" :desc="details.subtitle" />

      <form v-on:submit.prevent="onSubmit" method="post">
        <form-handler :formInfos="details.form" ref="refForm"/>
        <recaptcha :site-key="recaptcha_site_key" ref="refRecaptcha"/>
        <template v-if="isLoading">
          <button class="btn btn-primary btn-block" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
          </button>
        </template>
        <template v-else>
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
    async asyncData({ $content, $axios, params, $config: { recaptcha_site_key } }) {
      const details = await $content(`promo-contact/en`).fetch();
      const lang = params.slug;

      return {
        details,
        lang,
        $axios,
        recaptcha_site_key,
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
      }
    },
    methods: {
      async onSubmit(e) {
        const self = this;
        e.preventDefault();

        const recaptchaToken = self.$refs.refRecaptcha.getToken();

        if (!recaptchaToken) {
          self.$refs.refRecaptcha.showError('Please confirm that you are not a robot.');
          self.$refs.refRecaptcha.scrollIntoView();

          return;
        }

        this.isLoading = true;

        const dataFields = Object.assign({}, self.$refs.refForm.formdata);
              dataFields.language = self.lang;
              dataFields.message = dataFields.message == null ? '' : dataFields.message;
              dataFields.phone_call = !dataFields.phone_call ? false : true;
              dataFields.is_promo = true;
              dataFields.utm_source = helpers.getToken('utm_source');
              dataFields.recaptcha_token = recaptchaToken;

        self.$axios.post('/api/contact', dataFields).then(function(response) {
          self.isLoading = false;
          window.location.href = '/promo_contact/thanks';
        }).catch(function(error) {
          console.error('API ERROR:', error.response || error);
          self.isLoading = false;

          // A token is only valid for one submission, so a new one is needed on every retry.
          self.$refs.refRecaptcha.reset();

          if (error.response && error.response.status === 422) {
            self.$refs.refRecaptcha.showError('reCAPTCHA verification failed. Please try again.');
            self.$refs.refRecaptcha.scrollIntoView();
          } else if (error.response && error.response.status === 429) {
            alert('Too many inquiries have been sent from this connection. Please wait a few minutes and try again.');
          } else {
            alert('Something went wrong. Please try again.');
          }
        });
      }
    },
    mounted() {
      helpers.setToken('utm_source', this.$route.query.utm_source);
    },
	}
</script>