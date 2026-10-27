<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>
        <img class="w-100 mb-4" :alt="details.title" :src="`/assets${details.image}`" />

        <iframe-src :ytlink="details.yt_link" class="mb-4" />

        <paragraph :desc="details.subtitle" />

        <list-text :listObj="details.lists" />

        <paragraph :desc="details.other_desc" />
      </div>
    </div>
    <div class="row mt-5" v-for="(album, a_index) in details.albums" :key="`album-${a_index}`">
      <div class="col-lg-12">
        <p><b>{{ album.title }}</b></p>

        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6"  v-for="(photo, p_index) in album.photos" :key="`photo-${a_index}-${p_index}`">
            <img class="w-100" :alt="album.title" :src="`/assets${photo}`" />
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-lg-12">
        <p><b>{{ details.location.title }}</b></p>

        <iframe-src :ytlink="details.location.link" />
      
        <div class="row">  
          <div class="col-sm-12 col-md-12 col-lg-6 mb-n5" v-for="(video, v_index) in details.video" :key="`video-${v_index}`">
            <p>{{ video.title }}</p>
            <div class="space">
              <template v-if="video.space" >
                  <br/>
              </template>
            </div>
            <iframe-src :ytlink="video.youtube" />
          </div>
        </div>

        <h2>{{ details.accommodation.title }}</h2>

        <paragraph :desc="details.accommodation.description" />

        <div v-for="(accom, a_index) in details.accommodation.information" :key="`accomodation-${a_index}`">

          <iframe-src :ytlink="accom.yt_link" />

          <paragraph :desc="accom.desc" />
        </div>
      <template v-if="details.accommodation.information2">
        <div v-for="(accom, a_index) in details.accommodation.information2" :key="`accomodation2-${a_index}`">

          <iframe-src :ytlink="accom.yt_link" />

          <paragraph :desc="accom.desc" />
        </div>
      </template>
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
			const details = await $content(`hollywood/en`).fetch();

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
.position {
  font-size: 12px;
  text-align: center;
}

@media screen and (max-width: 1199px) {
.space{
  display: none;
}
}
</style>