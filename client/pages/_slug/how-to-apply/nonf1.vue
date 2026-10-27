<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>
        <img :alt="details.title" :src="`/assets${details.image}`" class="w-100 mb-3" />

        <h2>{{ details.category.title }}</h2>
        
        <div class="category" v-for="(info_list, index) in details.category.description" :key="`category-description-${index}`">
            <h3>{{ info_list.subtitle }}</h3>
            <list-text :listObj="info_list.lists" />
        </div>
      </div>
    </div>
      <div class="row">
        <div class="col-lg-12">
        </div>
      </div>
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`nonf1/${params.slug}`).fetch();

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