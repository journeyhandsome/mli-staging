<template>
  <div>
    <div class="row">
      <div class="col-lg-12">
          <img src="/assets/images/going-to-college/school_library.jpg" class="w-100 mt-n1 mt-2" />
      </div>
    </div>
      <h1 class="w-responsive text-center mx-auto p-3 mt-2">{{ details.title }}</h1>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <img src="/assets/images/going-to-college/main_map.jpg" class="w-100" />
        </div>
      </div>
      <div class="row yellow-bg-notes">
        <div class="col-lg-12">
          <p class="title">{{ details.university.title }}</p>
          <p>{{ details.university.description }}</p>
        </div>
      </div>
      <div class="row card-image-text-inline mt-5" v-for="(info, index) in details.university.lists" :key="`university-agreement-${index}`">
        <div class="col-lg-3">
          <a :href="info.link">
            <img :src="`/assets${info.image}`" class="w-100" />
          </a>
        </div>
        <div class="col-lg-9">
          <p class="title">{{ info.title }}</p>
          <p class="title address">{{ info.address }}</p>
          <p class="subtitle">{{ info.subtitle }}</p>
          <p class="description">{{ info.description }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <img src="/assets/images/going-to-college/mrp.jpg" class="w-100 mt-5" />
        </div>
      </div>
      <div class="row yellow-bg-notes mb-5">
        <div class="col-lg-12">
          <p class="title">{{ details.campus.title }}</p>
          <p>{{ details.campus.description }}</p>
        </div>
      </div>
      <div class="row card-image-text-inline mb-5" v-for="(info, index) in details.campus.lists" :key="`campus-agreement-${index}`">
        <div class="col-lg-3">
          <a :href="info.link">
            <img :src="`/assets${info.image}`" class="w-100" />
          </a>
        </div>
        <div class="col-lg-9">
          <p class="title">{{ info.title }}</p>
          <p class="title address">{{ info.address }}</p>
          <p class="subtitle">{{ info.subtitle }}</p>
          <p class="description" v-html="info.description"></p>
        </div>
      </div>
    </div>
    <div class="container-fluid contact-us">
      <div class="row justify-content-center">
        <div class="row max-container">
          <div class="col-lg-10">
            <h5>{{ details.contactUs.title }}</h5>
            <p>{{ details.contactUs.description }}</p>
          </div>
          <div class="col-lg-2">
            <a class="btn btn-primary" href="/contact" role="button">{{ details.contactUs.btnText }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
	export default {
    layout: 'home',
    async asyncData({ $content, params }) {
			const details = await $content(`going-to-college/en`).fetch();
      const lang = params.slug;
			return {
				details,
        lang,
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
.contact-us {
  background-color: #C6DCF9;
  padding-top: 80px;
  padding-bottom: 80px;
  margin-bottom: -3.12rem;
  .max-container {
    width: 100%;
    max-width: 1140px;
  }
}
.mt-n1 {
  margin-top: -3.12rem !important;
}
</style>