<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Section 1 !-->
        <h1>{{ details.section1.title }}</h1>
        <img :src="`/assets${details.section1.image}`" :alt="details.section1.title" class="w-100" />

        <!-- Section 2 !-->
        <h2>{{ details.section2.title }}</h2>
        <div class="table-responsive">
          <table class="table table-dark-left">
            <tbody>
              <tr v-for="(info, index) in details.section2.entries" :key="`${index}-company-table-sec-2`">
                <td><span>{{ info.key }}</span></td>
                <td>
                  <span v-for="(desc, index2) in info.list" :key="`row-${index}-column-${index2}-company-table-sec-2`">
                    <span v-html="desc"></span>
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!--Section 3 !-->
        <h2>{{ details.section3.title }}</h2>
      </div>
    </div>
    <div class="row justify-content-center section-3">
      <div class="col-lg-4" v-for="(info, index) in details.section3.entries" :key="`${index}-company-download-sec-3`">
        <img :src="`/assets${info.image}`" :alt="info.text" class="w-100" />
        <a :href="info.link" target="_blank">{{ info.text }}</a>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h2>{{ details.section4.title }}</h2>
        <template v-for="(text, index) in details.section4.links">
          <a :href="text.link" target="_blank" class="links" :key="`${index}-company-other-services-link`">
            <i class="bi bi-arrow-right"></i> {{ text.text }}
          </a>
        </template>
      </div>
    </div>
    <Brochure />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`company/en`).fetch();

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

.section-3 {
  .col-lg-4 {
    margin-bottom: 50px;
    text-align: center;
  }
  img {
    max-width: 200px;
    display: block;
    margin: 0 auto;
  }
  a {
    text-align: center;
  }
}
</style>