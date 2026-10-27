<template>
  <div class="container">
		<div class="row">
        <div class="col-md-12">
            <h1>{{ details.title }}</h1>
            <paragraph :desc="details.subtitle" />
            <p class="mt-4">{{ details.questions.question }}</p>
            <div v-for="(question, index_q) in details.questions.tables" :key="`questions-${index_q}`">
                <template v-if="question.table">
                    <div class="col-md-10">
                        <p class="title"><b><u>{{ question.title_optional }}</u></b></p>
                        <mli-table :tableMaxCol="question.table.tableMaxCol" :tableInfo="question.table" class="tables" />
                    </div>
                    <paragraph :desc="question.table.description" class="sale" />
                </template>
            </div>
            <div v-for="(qa, index_q) in details.qa" :key="`qa-${index_q}`">
                <p class="mt-4">{{ qa.question }}</p>
                <paragraph :desc="qa.answer" />
                <p>{{ qa.description }}</p> 
                <template v-if="qa.btn_link">
                    <a :href="qa.btn_link">
                        <img :src="`/assets${qa.btn}`" class="btnImage" />
                    </a>
                </template>
            </div>
        </div>
	    </div>
		<brochure />
	</div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`2023promo/${params.slug}`).fetch();
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

<style lang="scss" scoped>
    .tables tbody{
        text-align: left !important;
    }
    .sale{
        margin-left: 25px;
    }
    .title {
        font-size: 19px;
        color: black;
    }
@media screen and (max-width: 767px) {
	.btnImage{
		width: 60%;
	}
}
@media screen and (min-width: 768px) {
	.btnImage{
		width: 30%;
	}
}
</style>