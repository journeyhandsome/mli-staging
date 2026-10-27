<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>

        <paragraph :desc="details.subtitle" />
      </div>
      <div class="row mt-5 mb-5">
        <div class="col-sm-12 col-md-4 col-lg-4 mb-5" v-for="(brochure, b_index) in details.brochures" :key="`brochure-${b_index}`">
          <div class="box-shadow-group" >
            <img :src="`/assets${brochure.image}`" :alt="`${brochure.title} photo`" />
						<div class="group-text">
							<h5>{{ brochure.title }}</h5>
							<p><a class="card-link" :href="brochure.link" target="_blank"><span v-html="brochure.link_text"></span></a></p>
						</div>
					</div>
        </div>
      </div>
      <div class="col-lg-12">
        <paragraph :desc="details.other_info" />          
      </div>
    </div>

    <brochure />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`tf_material/${params.slug}`).fetch();

			return {
				details
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
		}
	}
</script>

<style lang="scss" scoped>
.box-shadow-group {
  text-align: center;

  img {
    max-height: 169px;
    width: auto;
  }
}

// @media screen and (min-width: 900px) {
//   .box-shadow-group img {
//     min-height: 169px;
//     width: 100%;
//   }
// }
</style>