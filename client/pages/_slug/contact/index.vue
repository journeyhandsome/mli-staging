<template>
  <div class="container">
    <div class="col-lg-12">
      <h1>{{ details.title }}</h1>

      <paragraph v-if="details.subtitle" :desc="details.subtitle" />     

      <template v-if="details.icon">
          <div class="col-sm-12 d-flex justify-content-center" v-for="(imgLink, index) in details.icon" :key="`result-image-${index}`">
            <a :href="imgLink.link">
              <img :src="`/assets/images/sidebar/jp/${imgLink.image}`" class="w-80 mb-3 mx-auto" />
            </a>
          </div>
      </template>

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
  import helpers from '../../../plugins/helpers.js';

	export default {
    async asyncData({ $content, $axios, params, $config: { recaptcha_site_key } }) {
      const details = await $content(`contact/${params.slug}`).fetch();
      const lang = params.slug;

      return {
        details,
        lang,
        $axios,
        recaptcha_site_key
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
        e.preventDefault();
          const dataFields = Object.assign({}, this.$refs.refForm.formdata);

          const normalizeEmail = (v) => (v || '').trim().toLowerCase();

            if (normalizeEmail(dataFields.email) !== normalizeEmail(dataFields.confirm_email)) {
              this.$refs.refForm.$emit('email-error', 'Email addresses do not match.');
              const field = this.$el.querySelector('input[name="confirm_email"]');
              if (field) field.scrollIntoView({ behavior: 'smooth', block: 'center' });

              return;
            } else {
              this.$refs.refForm.$emit('email-error', '');
            }

          delete dataFields.confirm_email;

          const recaptchaToken = this.$refs.refRecaptcha.getToken();

          if (!recaptchaToken) {
            this.$refs.refRecaptcha.showError('Please confirm that you are not a robot.');
            this.$refs.refRecaptcha.scrollIntoView();

            return;
          }

          dataFields.recaptcha_token = recaptchaToken;

          this.isLoading = true;
              dataFields.language = this.lang;
              dataFields.message = dataFields.message == null ? '' : dataFields.message;
              dataFields.phone_call = !dataFields.phone_call ? false : true;
              dataFields.utm_source = helpers.getToken('utm_source');

          try {
            await this.$axios.post('/api/contact', dataFields);
            window.location.href = '/' + this.lang + '/contact/thanks';
          } catch (error) {
            console.error('API ERROR:', error.response || error);

            // A token is only valid for one submission, so a new one is needed on every retry.
            this.$refs.refRecaptcha.reset();

            if (error.response && error.response.status === 422) {
              this.$refs.refRecaptcha.showError('reCAPTCHA verification failed. Please try again.');
              this.$refs.refRecaptcha.scrollIntoView();
            } else if (error.response && error.response.status === 429) {
              alert('Too many inquiries have been sent from this connection. Please wait a few minutes and try again.');
            } else {
              alert('Something went wrong. Please try again.');
            }
          } finally {
            this.isLoading = false;
          }
      }
    },
    mounted() {
      helpers.setToken('utm_source', this.$route.query.utm_source);
    },
	}
</script>