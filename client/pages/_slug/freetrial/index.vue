<template>
  <div class="container">
    <div class="col-lg-12">
      <h1>{{ details.title }}</h1>

      <paragraph v-if="details.subtitle" :desc="details.subtitle" class="font-weight-bolder" />

      <form v-on:submit.prevent="onSubmit" method="post">
        <form-handler :formInfos="details.form" ref="refForm"/>
        <template v-if="isLoading">
          <button class="btn btn-success btn-block" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
          </button>
        </template>
        <template v-else>
          <button type="submit" class="btn btn-success btn-block">SEND</button>
        </template>
      </form>
    </div>
    <brochure />
  </div>
</template>

<script>
  import helpers from '../../../plugins/helpers.js';

  export default {
    async asyncData({ $content, $axios, params }) {
      const details = await $content(`freetrial/${params.slug}`).fetch();
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
        emailError: '',
      }
    },
    methods: {
      async onSubmit(e) {
        e.preventDefault();
        const dataFields = Object.assign({}, this.$refs.refForm.getFormData());
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
          
          this.isLoading = true;
          dataFields.language = this.lang;
          dataFields.message = dataFields.message == null ? '' : dataFields.message;
          dataFields.phone_call = !dataFields.phone_call ? false : true;
          dataFields.utm_source = helpers.getToken('utm_source');

          try {
            await this.$axios.post('/api/free-trial', dataFields);
            window.location.href = '/' + this.lang + '/freetrial/thanks';
          } catch (error) {
            console.error('API ERROR:', error.response || error);
            alert('Something went wrong. Please try again.');
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