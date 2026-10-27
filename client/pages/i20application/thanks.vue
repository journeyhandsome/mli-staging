<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>

        <paragraph :desc="details.subtitle" />
      </div>
    </div>

    <brochure />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, $axios,query }) {
		// let details = null;
		    // if(!!query['np']){
			 const details = await $content(`i20application/thanks/jp`).fetch();
			// }else{
			//  details = await $content(`i20application/thanks/jp`).fetch();
			// }
			return {
        		$axios,
				details,
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
	},
    created() {
      const id = this.$route.query.id ?? '';
      const value = this.$route.query.value ?? '';
      if(!id && !value) return;
      this.$axios.$put(`/api/online-application-l20/${id}/${value}`);
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