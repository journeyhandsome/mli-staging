<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>

        <img :alt="details.title" :src="`/assets${details.image}`" class="w-100 mb-5" />

        <paragraph v-if="details.subtitle" :desc="details.subtitle" />

        <template v-if="details.applyOnline">
          <div class="image-link mt-5">
            <a :href="details.applyOnline.imageLink.link">
              <img :alt="details.applyOnline.title" :src="`/assets${details.applyOnline.imageLink.image}`" class="w-50" />
            </a>
          </div>
        </template>

        <template v-if="details.applicationSteps">
          <div class="blue-border-notes">
            <p class="hutoaka">{{ details.applicationSteps.title }}</p>
            <paragraph :desc="details.applicationSteps.description" />
          </div>
        </template>

        <template v-if="details.visaFree">
          <h2>{{ details.visaFree.title }}</h2>
          <paragraph :desc="details.visaFree.description" />
          <a :href="details.visaFree.link">
            <button class="btn btn-lg btn-warning mx-auto d-block w-50 mt-5 mb-3" style="color: white;">{{ details.visaFree.btn_label }}</button>
          </a>
        </template>

        <h2>{{ details.needHelp.title }}</h2>
        <paragraph :desc="details.needHelp.description" />

        <template v-if="details.contactUs.image">
          <div class="image-link mt-5">
            <a :href="details.contactUs.link">
              <img :alt="details.contactUs.title" :src="`/assets${details.contactUs.image}`" class="w-50" />
            </a>
          </div>
        </template>

        <h3>{{ details.contactUs.title }}</h3>
        <paragraph v-if="details.contactUs.description" :desc="details.contactUs.description" />
        <div v-for="(info, index) in details.contactUs.lists" :key="`contact-us-lists-${index}`">
          <p>
            <span>{{ info.campus }}</span><br />
            <span>{{ info.address }}</span><br />
            <span>{{ info.telephone }}</span><br />
          </p>
        </div>
      </div>
    </div>

    <brochure v-if="details.hasBrochure" />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`change-of-status/en`).fetch();

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