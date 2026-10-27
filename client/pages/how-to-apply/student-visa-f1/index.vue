<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>
        <img :alt="details.title" :src="`/assets${details.image}`" class="w-100 mb-3" />
      </div>
    </div>
        <paragraph v-if="details.subtitle" :desc="details.subtitle" />
    <div class="container-fluid row" v-for="(cat, c_index) in details.category" :key="`category-e-${c_index}`">
        <template v-if="cat.btn_visa">
            <div class="image-link col-sm-4">
                <a :href="cat.btn_visa.link">
                    <img alt="visa image" :src="`/assets${cat.btn_visa.image}`" class="w-100" />
                </a>
            </div>
            <div class="image-link col-sm-4">
                <a :href="cat.btn_transfer.link">
                    <img alt="other image" :src="`/assets${cat.btn_transfer.image}`" class="w-100" />
                </a>
            </div>
            <div class="image-link col-sm-4">
                <a :href="cat.btn_status.link">
                    <img alt="other image" :src="`/assets${cat.btn_status.image}`" class="w-100" />
                </a>
            </div>
        </template>
    </div>   
      
    <div v-for="(category, c_index) in details.category" :key="`category-kr-${c_index}`">
        <div v-for="(content, co_index) in category.content" :key="`content-${c_index}-${co_index}`">
            <template v-if="content.subtitle">
                <p class="border-left-italic mt-2 mb-4"><b>{{ content.subtitle }}</b></p>
            </template>
            <paragraph :desc="content.description" />
        </div>
    </div>
    
    <div v-for="(cat, c_index) in details.category" :key="`category-jp-${c_index}`">
        <template v-if="cat.other_info">
            <h2>{{ cat.subtitle }}</h2>
            <p>{{ cat.description }}</p>
            <paragraph class="apply" :desc="cat.other_info" />
        </template>
    </div>
     
    <template v-if="details.content.subtitle">
        <h2>{{ details.content.subtitle }}</h2>
        <paragraph :desc="details.content.description" />
        <div class="image-link mt-5">
            <a :href="details.content.imageLink.link">
                <img :alt="details.content.title" :src="`/assets${details.content.imageLink.image}`" class="w-75" />
            </a>
        </div>
    </template>
    <template v-else>
        <paragraph :desc="details.content" />
    </template>

    <brochure v-if="details.hasBrochure" />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`student-visa-f1/en`).fetch();

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


<style lang="scss">
.apply {
  text-align: center !important;
  .btn {
    width: 10rem;
  }
}
.image-link {
  text-align: center;
}
</style>