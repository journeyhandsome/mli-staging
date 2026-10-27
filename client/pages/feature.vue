<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Section 1 !-->
        <h1>{{ details.section1.title }}</h1>
        <img :src="`/assets${details.section1.image}`" :alt="details.section1.title" class="w-100" />

        <!-- Section 2 !-->
        <h2>{{ details.section2.title }}</h2>
        <paragraph :desc="details.section2.description" />
        <img :src="`/assets${details.section2.image}`" :alt="details.section2.title" class="w-100" />
        <span>{{ details.section2.notes }}</span>

        <!-- Section 3 !-->
        <div class="section-3" v-for="(info, index) in details.section3" :key="`${index}-feature-sec-3`">
          <h3>{{ info.title }}</h3>
          <p class="border-left-italic mt-2 mb-4">{{ info.subtitle }}</p>
          <paragraph :desc="info.description" />
          <img class="main-img" :src="`/assets${info.image}`" />
          <template v-if="info.locations">
            <div class="row justify-content-center feat-location">
              <div class="col-lg-6" v-for="(location, index) in info.locations" :key="`${index}-feature-location`">
                <img :src="`/assets${location.image}`" />
                <h5>{{ location.label }}</h5>
              </div>
            </div>
          </template>
          <template v-if="info.notes">
            <p><span>{{ info.notes }}</span></p>
          </template>
          <template v-if="info.links">
            <template v-for="(text, index) in info.links">
              <a :href="text.link" class="links" :key="`${index}-feature-link`">
                <i class="bi bi-arrow-right"></i> {{ text.text }}
              </a>
            </template>
          </template>
        </div>

        <template v-if="details.section4">
          <h3>{{ details.section4.text }}</h3>
        </template>
      </div>
    </div>
    <Brochure />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`feature/en`).fetch();

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
  img {
    width: 100%;
  }
  a {
    display: block;
    margin-top: 20px;
  }
  .feat-location {
    margin-top: 50px;

    img {
      margin-bottom: 20px;
    }
    h5 {
      text-align: center;
    }
  }
</style>
