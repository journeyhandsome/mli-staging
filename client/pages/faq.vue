<template>
  <div class="container">
    <div class="row">
      <h1>{{ details.title }}</h1>

      <div v-for="(type, t_index) in details.types" :key="`types-${t_index}`" class="col-lg-12 content">
        <h3>{{ type.title }}</h3>

        <template v-for="(list, l_index) in type.lists">
          <p :key="`q-n-a-p-${t_index}-${l_index}`"><b>{{ list.question }}</b></p>
          <paragraph :desc="list.answer" :key="`q-n-a-${t_index}-${l_index}`"/>
        </template>
      </div>

    </div>

    <brochure />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`faq/en`).fetch();

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
.content {
  word-wrap: break-word;
}
</style>