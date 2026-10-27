<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>

        <img :alt="details.title" :src="`/assets${details.image}`" class="w-100 mb-5" />

        <paragraph :desc="details.subtitle" />

      </div>

      <div v-for="(cat, c_index) in details.category" :key="`category-${c_index}`">
        <h2>{{ cat.title }}</h2>

        <template v-if="cat.image">
          <img :alt="cat.title" :src="`/assets${cat.image}`" class="w-100 mb-5" />
        </template>

        <template v-if="cat.lists">
          <list-text :listObj="cat.lists" :className="cat.listType" />
        </template>

        <paragraph :desc="cat.description" />

        <div class="image-link mt-5" v-if="cat.hasApplyNow">
          <a :href="details.applyOnline.imageLink.link">
            <img :alt="details.applyOnline.title" :src="`/assets${details.applyOnline.imageLink.image}`" class="w-50" />
          </a>
        </div>
      </div>

      <h5 class="border-left-italic mt-5">{{ details.applyOnline.title }}</h5>
      <paragraph :desc="details.applyOnline.description" />

      <div class="image-link mt-5">
        <a :href="details.applyOnline.imageLink.link">
          <img :alt="details.applyOnline.title" :src="`/assets${details.applyOnline.imageLink.image}`" class="w-50" />
        </a>
      </div>
    </div>
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params, redirect }) {
      try {
        const details = await $content(`overseas-students/${params.slug}`).fetch();

        return {
          details
        }
      } catch(e) {
        redirect('/404');
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
.image-link {
  text-align: center;
}
</style>