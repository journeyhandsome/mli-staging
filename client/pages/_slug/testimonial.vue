<template>
  <div class="container">
    <div class="row" v-if="testimonial.title">
      <div class="col-lg-12">
        <div class="image-container mb-5">
          <img :src="`https://mliesl.edu:81/images/testimonial/${testimonial.image}`" class="w-auto" :alt="`${testimonial.title} photo`" />
        </div>

        <h1>{{ testimonial.title }}</h1>

        <p v-html="testimonial.text"></p>

        <a href="/testimonials" class="mt-3">Click here for more student testimonials!</a>
      </div>
    </div>

    <brochure />
  </div>
</template>

<script>
	export default {
    async asyncData({ redirect, $axios, params }) {
      const lang = params.slug;

			return {
        $axios,
        lang,
        redirect,
			}
		},
    data() {
      return {
        testimonial: [],
      }
    },
    created() {
      const self = this;
      const queryId = this.$route.query.id;

      if(!queryId) {
        this.redirect('/404');
        return;
      }

      this.$axios.$get(`/testimonial/${this.lang}/${queryId}`).then((response) => {
        this.testimonial = response;
      }).catch(error => {
        self.redirect('/404');
      });
    }
	}
</script>

<style lang="scss" scoped>
.image-container {
  text-align: center;

  img {
    max-height: 400px;
  }
}
p {
  text-align: justify;
  overflow-wrap: break-word;
  white-space: pre-wrap;
}
</style>