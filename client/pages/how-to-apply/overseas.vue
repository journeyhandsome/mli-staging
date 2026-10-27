<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>
        <img :alt="details.title" :src="`/assets${details.image}`" class="w-100 mb-3" />

        <h3>{{ details.category.title }}</h3>
        <p><span v-html="details.category.subtitle"></span></p>

        <paragraph class="oversea" :desc="details.category.content" />
      </div>

      <brochure />
    </div>
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`overseas/en`).fetch();

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


<style lang="scss">
.oversea {
  text-align: center !important;
}
</style>