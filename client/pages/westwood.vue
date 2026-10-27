<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>
        <img :alt="details.title" :src="`/assets${details.image}`" class="w-100" />

        <iframe-src :ytlink="details.yt_link" class="mt-5 mb-5" />

        <paragraph :desc="details.subtitle" />
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-4 mb-5" v-for="(landmark, l_index) in details.landmark" :key="`landmark-${l_index}`">
        <div class="box-shadow-group">
          <img :alt="landmark.title" :src="`/assets${landmark.image}`" />
          <div class="group-text">
            <h5>{{ landmark.title }}</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <h2>{{ details.gallery.title }}</h2>

      <template v-if="details.gallery.subtitle">
        <h3>{{ details.gallery.subtitle }}</h3>
      </template>

      <div class="container row gallery">
        <div class="col-sm-12 col-md-12 col-lg-6 mb-5" v-for="(gallery, g_index) in details.gallery.photos" :key="`gallery-${g_index}`">
          <div class="box-shadow-group">
            <img :alt="gallery.title" :src="`/assets${gallery.image}`" />
            <div class="group-text">
              <h5>{{ gallery.title }}</h5>
              <p>{{ gallery.subtitle }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row" v-if="details.location">
      <div class="col-lg-12">
        <h5>{{ details.location.title }}</h5>
        <iframe-src :ytlink="details.location.map_link" />
        
        <div class="row">  
          <div class="col-sm-12 col-md-12 col-lg-6 mb-n5" v-for="(video, v_index) in details.video" :key="`video-${v_index}`">
            <p>{{ video.title }}</p>
            <iframe-src :ytlink="video.youtube" />
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <h2>{{ details.environment.title }}</h2>

      <div class="container row environment">
        <div class="col-sm-12 col-md-12 col-lg-6 mb-5" v-for="(environment, e_index) in details.environment.photos" :key="`environment-${e_index}`">
          <div class="box-shadow-group">
            <img :alt="environment.title" :src="`/assets${environment.image}`" />
            <div class="group-text">
              <p>{{ environment.title }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h2>{{ details.accommodation.title }}</h2>

        <paragraph :desc="details.accommodation.description" />

        <div v-for="(type, t_index) in details.accommodation.types" :key="`accomodation-${t_index}`">
          <paragraph :desc="type.desc" />
          <template v-if="type.yt_link">
            <iframe-src :ytlink="type.yt_link" />
          </template>
          <template v-if="type.yt_link2">
            <iframe-src :ytlink="type.yt_link2" />
          </template>

          <template v-if="type.other_desc">
            <paragraph :desc="type.other_desc" />
          </template>
        </div>
      </div>
    </div>
    <div class="row" v-if="details.courses">
      <div class="col-lg-12">
        <h2>{{ details.courses.title }}</h2>

        <list-text :listObj="details.courses.lists" />
      </div>
    </div>
    <campus-message :message="details.message" />
    <div class="row">
      <div class="col-lg-12">
        <template v-if="details.dl_links">
          <h3>{{ details.dl_links }}</h3>
        </template>
      </div>
    </div>
    <brochure />
  </div>
</template>

<script>
	export default {
		async asyncData({ $content, params }) {
			const details = await $content(`westwood/en`).fetch();

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
.gallery {
  img {
    max-height: 244px;
  }
}
.environment {
  img {
    max-height: 220px;
  }
}
.position {
  font-size: 12px;
  text-align: center;
}
</style>