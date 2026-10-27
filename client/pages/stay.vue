<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>

        <paragraph :desc="details.subtitle" />

        <img :alt="details.title" :src="`/assets${details.image}`" class="w-100" />
        
        <h5 class="border-left-italic mt-5 mb-5">{{ details.note }}</h5>

        <div class="container-fluid row mt-3">
          <div class="col-sm-12 col-md-12 col-lg-6 mb-3" v-for="(gallery, g_index) in details.gallery" :key="`gallery-${g_index}`">
            <img alt="accomodations" :src="`/assets${gallery}`" class="w-100" />
          </div>
        </div>
      </div>
    </div>
    <div class="row col-lg-12" v-for="(types, t_index) in details.types" :key="`types-${t_index}`">
      <h2>{{ types.title }}</h2>
      <paragraph :desc="types.description" />
      <list-text :listObj="types.lists" />

      <div class="container row">
        <div class="col-sm-12 col-md-6 col-lg-6" v-for="(gallery, g_index) in types.gallery" :key="`gallery-${t_index}-${g_index}`">
          <img :alt="types.title" :src="`/assets${gallery}`" class="w-100 mt-2 mb-2" />
        </div>
      </div>

      <div class="col-lg-12" v-for="(prices, p_index) in types.prices" :key="`prices-${t_index}-${p_index}`">
        <h3>{{ prices.title }}</h3>

        <mli-table :tableMaxCol="prices.maxCol" :tableInfo="prices.table" />

        <paragraph v-if="prices.notes" :desc="prices.notes" />
      </div>
    </div>
    <div class="row" v-if="details.japanese">
      <div class="col-lg-12">
        <h2>{{ details.japanese.title }}</h2>
        <paragraph :desc="details.japanese.description" />
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h3><span v-html="details.comments.title"></span></h3>
        <paragraph :desc="details.comments.description" />
      </div>
    </div>

    <brochure />
  </div>
</template>

<script>
	export default {
		async asyncData({ $content, params }) {
			const details = await $content(`stay/en`).fetch();

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