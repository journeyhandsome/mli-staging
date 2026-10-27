<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>

        <paragraph :desc="details.subtitle" />
          <template v-if="details.category">
            <div class="category" v-for="(info, index) in details.category" :key="`${index}-category`">
                <paragraph :desc="info.description" />
                <iframe-src :ytlink="info.link" class="w-50"/>
            </div>
          </template>
      </div>
    </div>

    <brochure />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`freetrial-thanks/en`).fetch();

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