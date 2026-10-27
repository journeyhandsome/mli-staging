<template>
  <div class="container">
    <div class="col-lg-12">
      <h1>{{ details.title }}</h1>
      <img v-if="details.image" :alt="details.title" :src="`/assets${details.image}`" class="w-100 mb-3" />

      <paragraph v-if="details.category" :desc="details.category.content" />

     <template v-if="details.category">
          <a :href="details.category.link">
            <img alt="Line" :src="`/assets${details.category.image}`" class="mx-auto d-block w-50 mt-5 mb-3" />
          </a>
     </template>
      <h3 v-if="details.subtitle">{{ details.subtitle }}</h3>
      <form v-on:submit.prevent="onSubmit" method="post">
        <form-handler :formInfos="details.form" ref="refForm"/>
        <template v-if="isLoading">
          <button class="btn btn-primary btn-block" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
          </button>
        </template>
        <template v-else>
          <button type="submit" class="btn btn-success btn-block">{{ details.btn_label }}</button>
        </template>
      </form>
    </div>
    <brochure />
  </div>
</template>

<script>
  import helpers from '../../plugins/helpers.js';

	export default {
    async asyncData({ $content, $axios }) {
      const details = await $content(`promo-material/en`).fetch();

      return {
        details,
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
        lang: 'en',
      }
    },
    methods: {
      async onSubmit(e) {
        e.preventDefault();
        this.isLoading = true;
        const dataFields = Object.assign({}, this.$refs.refForm.formdata);
              dataFields.language = this.lang;
              dataFields.message = dataFields.message == null ? '' : dataFields.message;
              dataFields.phone_call = !dataFields.phone_call ? false : true;
              dataFields.is_promo = true;
              dataFields.utm_source = helpers.getToken('utm_source');

        await this.$axios.post('/api/download-brochure', dataFields).then(function(response) {
          this.isLoading = false;
          window.location.href = '/promo_material/thanks';
        }.bind(this));
      }
    },
    mounted() {
      helpers.setToken('utm_source', this.$route.query.utm_source);
    },
	}
</script>