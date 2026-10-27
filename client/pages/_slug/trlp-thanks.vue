<template>
  <div>
	<div class="container thanks">
		<div class="row">
			<div class="col-lg-12 ml-5 mb-5">
				<h1>{{ details.title }}</h1>

				<paragraph :desc="details.subtitle" />
			</div>
		</div>
	</div>
    <div class="container footer">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <img src="/assets/images/lptf/footer.jpg" width="100%"/>
            </div>
        </div>
    </div>
    <div class="container socmed">
        <div class="row social">
            <div class="col-md-6"></div>
            <div class="col-md-3">
                <a href="https://www.facebook.com/MentorLanguageInstitute/">
                    <img src="/assets/images/lptf/fb_sns.png" width="90%" class="mb-1"/>
                </a>
                <a href="https://www.instagram.com/mentorlanguageinstitute/">
                    <img src="/assets/images/lptf/ig_sns.png" width="90%" class="mb-1"/>
                </a>
                <a href="https://twitter.com/mlibh">
                    <img src="/assets/images/lptf/twitter_sns.png" width="35%"/>
                </a>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
  </div>
</template>

<script>
	export default {
    layout: 'lptf',
    async asyncData({ $content, params }) {
			const details = await $content(`trlp-thanks/${params.slug}`).fetch();

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
.social {
    margin-top: -170px;
}
.footer{
    margin-top: 259px;
}
</style>