<template>
  <div class="container-price">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>
        <template v-if="lang == 'ar'">
        <div class="button-sticky-ar" v-for="(button_list, index_b) in details.button.lists" :key="`steps-lists-${index_b}`">
            <paragraph :desc="button_list.link" />
        </div>
        </template>
        <template v-else>
        <div class="button-sticky" v-for="(button_list, index_b) in details.button.lists" :key="`steps-lists-${index_b}`">
            <paragraph :desc="button_list.link" />
        </div>
        </template>
        <img :alt="details.title" :src="`/assets${details.image}`" class="w-100" />

        <template v-if="details.japanese">
          <paragraph :desc="details.japanese.desc" />

          <div class="yellow-bg-notes">
            <paragraph :desc="details.japanese.note" />
          </div>

          <paragraph :desc="details.japanese.other_desc1" />

          <a :href="`/${lang}/price-auto`">
            <img alt="Calculate Price" :src="`/assets${details.japanese.image}`" class="w-100" />
          </a>

          <paragraph :desc="details.japanese.other_desc2" />
        </template>
          <!-- Hide Title if Japanese !-->
          <template v-if="!details.japanese">
            <h2>{{ details.steps.title }}</h2>

            <paragraph :desc="details.steps.subtitle" />
          </template>

          <div class="steps" v-for="(info_list, index_l) in details.steps.lists" :key="`steps-lists-${index_l}`">
            <h3>{{ info_list.title }}</h3>
            <paragraph :desc="info_list.subtitle" />

            <div v-if="info_list.image" class="text-center">
              <img :alt="info_list.title" :src="`/assets${info_list.image}`" class="w-75" data-toggle="modal" :data-target="`.tuition-program-${index_l}`"/>
            </div>

            <template v-if="info_list.link">
              <paragraph :desc="info_list.link" />
            </template>

            <template v-if="info_list.category">
              <div class="mt-3" v-for="(cat_det, cat_i) in info_list.category" :key="`category-${index_l}-${cat_i}`">
                <template v-if="cat_det.title">
                  <template v-if="lang == 'ar'">
                    <h5 class="border-right-italic">{{ cat_det.title}}</h5>
                  </template>
                  <template v-else>
                    <h5 class="border-left-italic">{{ cat_det.title}}</h5>
                  </template>
                </template>
                <paragraph v-if="cat_det.subtitle" :desc="cat_det.subtitle" />

                <template v-if="cat_det.table">
                  <mli-table :tableMaxCol="cat_det.table.tableMaxCol" :tableInfo="cat_det.table" />
                </template>
                
                <template v-if="cat_det.additional_note">
                  <paragraph :desc="cat_det.additional_note" />
                </template>

                <div class="yellow-bg-notes" v-if="cat_det.notes">
                  <paragraph :desc="cat_det.notes" />
                </div>

                <paragraph v-if="cat_det.description" :desc="cat_det.description" />
              </div>
            </template>

            <template v-if="info_list.lists">
              <list-text :listObj="info_list.lists" />
            </template>

            <template v-if="info_list.description">
              <paragraph :desc="info_list.description" />
            </template>
          </div>
      <div class="row" v-if="details.faq">
        <div class="col-lg-12">
          <h2>{{ details.faq.title }}</h2>
          <paragraph :desc="details.faq.questions" />
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h2>{{ details.examples.title }}</h2>
          <paragraph :desc="details.examples.subtitle" />

          <div v-for="(info_e, index_e) in details.examples.lists" :key="`examplest-lists-${index_e}`">
              <template v-if="lang == 'ar'">
                <h5 class="border-right-italic">{{ info_e.title}}</h5>
              </template>
              <template v-else>
                <h5 class="border-left-italic">{{ info_e.title}}</h5>
              </template>
            <list-text :listObj="info_e.items" />
          </div>
        </div>
        <div class="col-lg-12" v-if="details.other_info">
          <paragraph :desc="details.other_info" />
        </div>
      </div>
      <div class="row" v-if="details.japanese_others">
        <div class="col-lg-12">
          <a :href="`/${lang}/price-auto`">
            <img alt="Calculate Price" :src="`/assets${details.japanese_others.image}`" class="mt-5 mb-3 w-100" />
          </a>
          <p>{{ details.japanese_others.title }}</p>

          <list-text :listObj="details.japanese_others.lists" />

          <paragraph :desc="details.japanese_others.desc" />
        </div>
      </div>

    </div>
    </div>

    <brochure />

    <div v-if="details.steps.lists[0]" class="modal fade tuition-program-0" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <img :src="`/assets${details.steps.lists[0].image}`" alt="Tuition Program" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`price-v2/${params.slug}`).fetch();
      const lang = params.slug;

			return {
				details,
        lang
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

<style lang="scss">
.price .total {
  color: #FF0000;
  font-weight: bold;
}
.container-price{
  position: relative;
}
.button-sticky {
    top: 0;
    position: sticky !important;
    position: -webkit-sticky;
    float: right;
}
.button-sticky-ar {
    top: 0;
    position: sticky !important;
    position: -webkit-sticky;
    float: left;
}
</style>