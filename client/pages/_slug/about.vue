<template>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- Section 1 !-->
				<h1>{{ details.section1.title }}</h1>
        <paragraph :desc="details.section1.description" />

				<!-- Section 2 !-->
				<h2>{{ details.section2.title }}</h2>
				<img :src="`/assets${details.section2.image}`" :alt="details.section2.title" class="w-100 mb-5" />
        <paragraph :desc="details.section2.description" />

				<!-- Section 3 !-->
				<h2>{{ details.section3.title }}</h2>
				<img :src="`/assets${details.section3.image}`" :alt="details.section3.title" class="w-100 mb-5" />
        <paragraph :desc="details.section3.description" />
				<br />
				<template v-for="(text, index) in details.section3.lists">
					<a :href="text.link" class="links" :key="`${index}-about-lists-3`">
						<i class="bi bi-arrow-right"></i> {{ text.text }}
					</a>
				</template>
			</div>
		</div>
		<Brochure />
	</div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`about/${params.slug}`).fetch();

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
						content: 'my website description'
						}
					],
				}
			}
		}
	}
</script>

<style lang="scss" scoped>
	hr {
		border-top-width: 2px;
		margin-bottom: 2rem;
	}
  img {
    width: 100%;
  }
	a.links {
		display: block;
	}
</style>