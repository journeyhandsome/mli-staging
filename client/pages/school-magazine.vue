<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>

        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4 mt-4" v-for="(list, l_index) in details.lists" :key="`newsletter-${l_index}`">
            <div class="box-shadow-group" >
              <a :href="list.link" target="_blank">
                <img :src="`/assets${list.image}`" :alt="list.title" />
              </a>
              <div class="group-text">
                <h5>{{ list.title }}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <brochure v-if="details.hasBrochure" />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`school-magazine/en`).fetch();

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
