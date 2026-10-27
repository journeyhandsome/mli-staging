<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>
        <img :src="`/assets${details.image}`" :alt="details.title" class="w-100 mb-5" />
        <template v-if="details.yt_link">
          <iframe-src :ytlink="details.yt_link" class="mb-4" />
        </template>

        <paragraph :desc="details.subtitle" />
      </div>
    </div>
    <template v-for="(info, index) in details.schools">
      <div class="row" :key="`gallery-title-${index}`">
        <div class="col-lg-12">
          <h2>{{ info.value }}</h2>

          <div class="row photos" :key="`gallery-photo-${index}`">
            <div class="col-sm-12 col-md-6 col-lg-6" v-for="(info_m, index_m) in getStaticImages(info.key)" :key="`school-${index}-${index_m}`">
              <img :src="`/assets${info_m}`" class="w-100" :alt="`${info.key} photo`" />
            </div>
          </div>
        </div>
      </div>
    </template>

    <brochure />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`image-gallery/en`).fetch();

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
		},
    methods: {
      getStaticImages(key) {
        const path = "/images/what-is-mli/image-gallery/"
        switch(key) {
          case 'hollywood-campus':
            return [
              path + 'hollywood-campus-1.jpg',
              path + 'hollywood-campus-2.jpg',
              path + 'hollywood-campus-3.jpg',
              path + 'hollywood-campus-4.jpg',
              path + 'hollywood-campus-5.jpg',
              path + 'hollywood-campus-6.jpg',
            ];
          case 'hollywood-class':
            return [
              path + 'hollywood-class-1.jpg',
              path + 'hollywood-class-2.jpg',
              path + 'hollywood-class-3.jpg',
              path + 'hollywood-class-4.jpg',
              path + 'hollywood-class-5.jpg',
            ];
          case 'westwood-campus':
            return [
              path + 'westwood-campus-1.jpg',
              path + 'westwood-campus-2.jpg',
              path + 'westwood-campus-3.jpg',
              path + 'westwood-campus-4.jpg',
              path + 'westwood-campus-5.jpg',
              path + 'westwood-campus-6.jpg',
              path + 'westwood-campus-7.jpg',
              path + 'westwood-campus-8.jpg',
              path + 'westwood-campus-9.jpg',
            ];
          case 'westwood-class':
            return [
              path + 'westwood-class-1.jpg',
              path + 'westwood-class-2.jpg',
              path + 'westwood-class-3.jpg',
              path + 'westwood-class-4.jpg',
              path + 'westwood-class-5.jpg',
              path + 'westwood-class-6.jpg',
              path + 'westwood-class-7.jpg',
              path + 'westwood-class-8.jpg',
              path + 'westwood-class-9.jpg',
              path + 'westwood-class-10.jpg',
            ];
          default:
            return [];
        }
      }
    },
	}
</script>

<style lang="scss" scoped>
  .photos {
    .col-lg-6 {
      padding: 10px;

      img {
        max-height: 248px;
      }
    }
  }
</style>