<template>
    <div class="container pb-5 text-center">
      <div class="pt-5">
          <h1 class="font-weight-bold ">{{ lang.txt1 }}</h1>
          <h1 class="font-weight-bold">{{ lang.txt2 }}</h1>
          <p class="pt-4 thanks-txt">{{ lang.txt3 }}</p>
          <p class="thanks-txt">{{ lang.txt4 }}</p>
      </div>
      <div class="pt-4">
          <img class="thanks-img-3" src="/assets/images/mli-logo.png">
      </div>
      <div class="pt-4">
          <img class="thanks-contact-img cursor-pointer" @click="goToPage" src="/assets/images/brochure/en/contact-us.jpg">
      </div>
    </div>
</template>
<style>
    .thanks-div-1 {
        width: 280px;
        box-shadow: 1px 5px 18px #c2c2c2;
        border-radius: 6px;
    }

    .thanks-txt {
        font-size: 1.3em;
    }

    .thanks-img-1 {
        height: 250px;
        width: 96%;
    }

    .thanks-download {
        color: #1f97ea;
        cursor: pointer;
    }

    .thanks-img-2 {
        width: 25%;
    }

    .thanks-img-3 {
        width: 18%;
    }

    .thanks-contact-img {
        width: 40%;
    }

    .cursor-pointer {
        cursor: pointer;
    }
</style>
<script>
    export default {
        async asyncData({ $content, params }) {
            const lang = await $content(`dancecamp/health-form/thanks/en`).fetch();
            return {
                lang
            }
        },
        head() {
			if(this.lang) {
				return {
					title: this.lang.pageTitle,
					meta: [
						{
                            hid: 'description',
                            name: 'description',
                            content: this.lang.pageDescription
						}
					],
				}
			}
		},
        layout:'dancecamp',
        // methods: {
        //     goToPage() {
        //         window.location.href = '/#content-30';
        //     }
        // }
    }
</script>