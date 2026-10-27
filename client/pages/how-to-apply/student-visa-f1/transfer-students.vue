<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>

        <img :alt="details.title" :src="`/assets${details.image}`" class="w-100 mb-2" />
        <div v-for="(sec, c_index) in details.section" :key="`section-${c_index}`">
          <template v-if="sec.subtitle">
            <h3>{{ sec.subtitle }}</h3>
          </template>
          <paragraph :desc="sec.description" />
        </div>

        <div v-for="(cat, c_index) in details.category" :key="`category-${c_index}`">
          <h2>{{ cat.title }}</h2>

          <template v-if="cat.image">
            <img :alt="cat.title" :src="`/assets${cat.image}`" class="w-100 mb-5" />
          </template>
          <template v-if="cat.subtitle">
            <paragraph :desc="cat.subtitle" />
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

        <h3>{{ details.applyOnline.title }}</h3>
        <paragraph :desc="details.applyOnline.description" />

        <template v-if="details.applyOnline.imageLink">
          <div class="image-link mt-5">
            <a :href="details.applyOnline.imageLink.link">
              <img :alt="details.applyOnline.title" :src="`/assets${details.applyOnline.imageLink.image}`" class="w-50" />
            </a>
          </div>
        </template>
        <template v-else>
          <a :href="details.applyOnline.admission.link">
            <button class="btn btn-lg btn-warning mx-auto d-block w-50 mt-5 mb-3" style="color: white;">{{ details.applyOnline.btn_label }}</button>
          </a>
        <paragraph :desc="details.applyOnline.admission.content" />
        </template>

      </div>
    </div>
    <brochure v-if="details.hasBrochure" />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`transfer-students/en`).fetch();

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
.image-link {
  text-align: center;
}
</style>