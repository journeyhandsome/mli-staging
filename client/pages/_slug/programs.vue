<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>
        <img :src="`/assets${details.image}`" :alt="details.title" class="w-100 mb-5" />
        <p>{{ details.programs.title }}</p>
        <list-text :listObj="details.programs.lists" />
        <paragraph :desc="details.subtitle" />
      </div>
    </div>
    <template v-for="(info_s, index_s) in details.services_esl">
      <div class="row" :key="`course-services-${index_s}`" id="esl">
        <div class="col-lg-12">
          <h2>{{ info_s.title }}</h2>

          <template v-if="info_s.other_image">
            <a :href="info_s.link">
              <img :src="`/assets${info_s.other_image}`" class="w-100 mb-3" :alt="info_s.title" />
            </a>
          </template>

          <div class="row card-image-text-inline align-items-center mb-5">
            <div class="col-md-3 col-lg-3">
              <img :src="`/assets${info_s.image}`" :alt="info_s.title" class="w-100" />
            </div>
            <div class="col-md-9 col-lg-9">
              <p v-html="info_s.subtitle"></p>
            </div>
          </div>

          <paragraph :desc="info_s.description" />

          <template v-if="info_s.youtube">
            <iframe-src :ytlink="info_s.youtube" class="mt-5" />
          </template>
        </div>
      </div>
    </template>
    <template v-for="(info_s, index_s) in details.services_toefl">
      <div class="row" :key="`course-services-${index_s}`" id="toefl">
        <div class="col-lg-12">
          <h2>{{ info_s.title }}</h2>

          <template v-if="info_s.other_image">
            <a :href="info_s.link" target="_blank">
              <img :src="`/assets${info_s.other_image}`" class="w-100 mb-3" :alt="info_s.title" />
            </a>
          </template>

          <div class="row card-image-text-inline align-items-center mb-5">
            <div class="col-md-3 col-lg-3">
              <img :src="`/assets${info_s.image}`" :alt="info_s.title" class="w-100" />
            </div>
            <div class="col-md-9 col-lg-9">
              <p v-html="info_s.subtitle"></p>
            </div>
          </div>

          <paragraph :desc="info_s.description" />

          <template v-if="info_s.youtube">
            <iframe-src :ytlink="info_s.youtube" class="mt-5" />
          </template>

          <template v-if="info_s.other_info && info_s.other_info.description">
            <paragraph :desc="info_s.other_info.description" />
          </template>

          <template v-if="info_s.other_info && info_s.other_info.lists">
            <list-text :listObj="info_s.other_info.lists" />
          </template>
        </div>
      </div>
    </template>
    <template v-for="(info_s, index_s) in details.services_ielts">
      <div class="row" :key="`course-services-${index_s}`" id="ielts">
        <div class="col-lg-12">
          <h2>{{ info_s.title }}</h2>

          <template v-if="info_s.other_image">
            <a :href="info_s.link">
              <img :src="`/assets${info_s.other_image}`" class="w-100 mb-3" :alt="info_s.title" />
            </a>
          </template>

          <div class="row card-image-text-inline align-items-center mb-5">
            <div class="col-md-3 col-lg-3">
              <img :src="`/assets${info_s.image}`" :alt="info_s.title" class="w-100" />
            </div>
            <div class="col-md-9 col-lg-9">
              <p v-html="info_s.subtitle"></p>
            </div>
          </div>

          <paragraph :desc="info_s.description" />

          <template v-if="info_s.youtube">
            <iframe-src :ytlink="info_s.youtube" class="mt-5" />
          </template>

          <template v-if="info_s.other_info && info_s.other_info.description">
            <paragraph :desc="info_s.other_info.description" />
          </template>

          <template v-if="info_s.other_info && info_s.other_info.lists">
            <list-text :listObj="info_s.other_info.lists" />
          </template>
        </div>
      </div>
    </template>
    <template v-for="(info_s, index_s) in details.services_conversation">
      <div class="row" :key="`course-services-${index_s}`" id="conversation">
        <div class="col-lg-12">
          <h2>{{ info_s.title }}</h2>

          <template v-if="info_s.other_image">
            <a :href="info_s.link">
              <img :src="`/assets${info_s.other_image}`" class="w-100 mb-3" :alt="info_s.title" />
            </a>
          </template>

          <div class="row card-image-text-inline align-items-center mb-5">
            <div class="col-md-3 col-lg-3">
              <img :src="`/assets${info_s.image}`" :alt="info_s.title" class="w-100" />
            </div>
            <div class="col-md-9 col-lg-9">
              <p v-html="info_s.subtitle"></p>
            </div>
          </div>

          <paragraph :desc="info_s.description" />

          <template v-if="info_s.youtube">
            <iframe-src :ytlink="info_s.youtube" class="mt-5" />
          </template>

          <template v-if="info_s.other_info && info_s.other_info.description">
            <paragraph :desc="info_s.other_info.description" />
          </template>

          <template v-if="info_s.other_info && info_s.other_info.lists">
            <list-text :listObj="info_s.other_info.lists" />
          </template>
        </div>
      </div>
    </template>
    <template v-for="(info_s, index_s) in details.services_toeic">
      <div class="row" :key="`course-services-${index_s}`" id="toeic">
        <div class="col-lg-12">
          <h2>{{ info_s.title }}</h2>

          <template v-if="info_s.other_image">
            <a :href="info_s.link">
              <img :src="`/assets${info_s.other_image}`" class="w-100 mb-3" :alt="info_s.title" />
            </a>
          </template>

          <div class="row card-image-text-inline align-items-center mb-5">
            <div class="col-md-3 col-lg-3">
              <img :src="`/assets${info_s.image}`" :alt="info_s.title" class="w-100" />
            </div>
            <div class="col-md-9 col-lg-9">
              <p v-html="info_s.subtitle"></p>
            </div>
          </div>

          <paragraph :desc="info_s.description" />

          <template v-if="info_s.youtube">
            <iframe-src :ytlink="info_s.youtube" class="mt-5" />
          </template>

          <template v-if="info_s.other_info && info_s.other_info.description">
            <paragraph :desc="info_s.other_info.description" />
          </template>

          <template v-if="info_s.other_info && info_s.other_info.lists">
            <list-text :listObj="info_s.other_info.lists" />
          </template>
        </div>
      </div>
    </template>
    <template v-for="(info_s, index_s) in details.services_private">
      <div class="row" :key="`course-services-${index_s}`" id="private">
        <div class="col-lg-12">
          <h2>{{ info_s.title }}</h2>

          <template v-if="info_s.other_image">
            <a :href="info_s.link">
              <img :src="`/assets${info_s.other_image}`" class="w-100 mb-3" :alt="info_s.title" />
            </a>
          </template>

          <div class="row card-image-text-inline align-items-center mb-5">
            <div class="col-md-3 col-lg-3">
              <img :src="`/assets${info_s.image}`" :alt="info_s.title" class="w-100" />
            </div>
            <div class="col-md-9 col-lg-9">
              <p v-html="info_s.subtitle"></p>
            </div>
          </div>

          <paragraph :desc="info_s.description" />

          <template v-if="info_s.youtube">
            <iframe-src :ytlink="info_s.youtube" class="mt-5" />
          </template>

          <template v-if="info_s.other_info && info_s.other_info.description">
            <paragraph :desc="info_s.other_info.description" />
          </template>

          <template v-if="info_s.other_info && info_s.other_info.lists">
            <list-text :listObj="info_s.other_info.lists" />
          </template>
        </div>
      </div>
    </template>

    <brochure />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`programs/${params.slug}`).fetch();

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