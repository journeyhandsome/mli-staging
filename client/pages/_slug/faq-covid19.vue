<template>
  <div class="container">
    <div class="row">
      <h1>{{ details.title }}</h1>

      <div v-for="(type, t_index) in details.types" :key="`types-${t_index}`">
        <h2>{{ type.title }}</h2>

        <div v-for="(list, l_index) in type.lists" :key="`q-n-a-${t_index}-${l_index}`">
          <h3>{{ list.question }}</h3>
          <paragraph :desc="list.answer" />
        </div>
      </div>

    </div>

    <brochure />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`faq-covid19/${params.slug}`).fetch();

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