<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>
        <img :alt="details.title" :src="`/assets${details.image}`" class="w-100 mb-3" />

        <div class="mb-5" v-for="(cat, c_index) in details.category" :key="`category-${c_index}`">
          <h2>{{ cat.title }}</h2>

          <template v-if="cat.image">
            <img :alt="cat.title" :src="`/assets${cat.image}`" class="w-100 mb-4" />
          </template>

          <template v-if="cat.ordered_content">
            <list-text :listObj="cat.ordered_content" className="decimal" />
          </template>

          <paragraph :desc="cat.content" />

          <template v-if="cat.types">
            <div class="mb-5" v-for="(type, t_index) in cat.types" :key="`types-${t_index}-${c_index}`">
              <h3>{{ type.title }}</h3>
              <paragraph :desc="type.content" />
            </div>
          </template>
        </div>

        <template v-if="details.admission.image">
          <a :href="details.admission.link">
            <img alt="Admission" :src="`/assets${details.admission.image}`" class="mx-auto d-block w-50 mt-5 mb-3" />
          </a>
        </template>
        <template v-else>
          <a :href="details.admission.link">
            <button class="btn btn-lg btn-warning mx-auto d-block w-50 mt-5 mb-3" style="color: white;">{{ details.btn_label }}</button>
          </a>
        </template>
        <paragraph :desc="details.admission.content" />
      </div>
    </div>

    <brochure />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`short/en`).fetch();

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