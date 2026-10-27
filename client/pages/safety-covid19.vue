<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>

        <div class="container row">
          <div class="col-lg-8">
            <paragraph :desc="details.subtitle" />
          </div>
          <div class="col-lg-4">
            <img :src="`/assets${details.image}`" class="w-75" />
          </div>
        </div>

        <p class="mt-4 mb-4" v-html="details.steps.title"></p>

        <div class="row card-image-text-inline mb-5" v-for="(list, l_index) in details.steps.lists" :key="`steps-${l_index}`">
          <div class="col-lg-3">
            <img :src="`/assets${list.step}`" class="w-75" />
          </div>
          <div class="col-lg-9">
            <img v-if="list.icon" :src="`/assets${list.icon}`" class="w-25 float-left" />
            <paragraph :desc="list.description" />

            <div class="steps-gallery" v-for="(gal, m_index) in list.gallery" :key="`steps-gallery-${l_index}-${m_index}`">
              <img :src="`/assets${gal.image}`" class="h-75 mb-2 d-inline-block" />
              <template v-if="gal.note"  >
                <p>{{gal.note}}</p>
              </template>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`safety-covid19/en`).fetch();

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
.steps-gallery {
  height: 350px;
}

@media screen and (max-width: 768px) {
  .steps-gallery {
    height: unset;

    img {
      width: 100%;
      height: auto;
    }
  }
}
</style>