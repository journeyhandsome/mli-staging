<template>
  <div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>{{ details.title }}</h1>
				<img :src="`/assets${details.image}`" class="w-100" :alt="details.title" />

				<div v-for="(info, index) in details.lists" :key="`teachers-lists-${index}`">
					<h2>{{ info.title}}</h2>
          <paragraph :desc="info.description" />

					<template v-if="info.checklist">
						<div v-for="(info, index) in info.checklist" :key="`teachers-checklists-${index}`">
							<h3>{{ info.title}}</h3>
							<list-text :listObj="info.lists" :className="info.listType ? info.listType : ''" />
							<span v-if="info.note" class="note">{{ info.note }}</span>
						</div>
					</template>

					<template v-if="info.lists">
						<list-text :listObj="info.lists" :className="info.listType" />
					</template>

					<span v-if="info.note" class="note mb-5">
						{{ info.note }}
					</span>
				</div>
			</div>
		</div>
		<div class="row teachers mt-5">
			<div class="col-sm-12 col-md-4 col-lg-4 mb-4" v-for="(info, index) in details.teachers" :key="`employee-teachers-${index}`">
				<div class="box-shadow-group">
					<img :src="`/assets${info.image}`" class="w-100" />
					<div class="group-text">
						<h5>{{ info.name }}</h5>
					</div>
				</div>
			</div>
		</div>
		
		<brochure />
	</div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`teachers/${params.slug}`).fetch();

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
	.note {
		font-weight: bold;
		color: #ff0000;
	}
	.teachers .col-lg-4 {
		.box-shadow-group {
			h5 {
				min-height: unset;
			}
		}
	}
</style>