<template>
    <div class="container pb-5 text-center">
      <div class="pt-5">
          <h1 class="font-weight-bold">{{ lang.txt1 }}</h1>
          <p class="thanks-txt">{{ lang.txt2 }}</p>
          <div class="container pt-4 pb-4">
              <div class="row">
                    <div class="col-lg-3 col-12 pt-lg-0 pt-5">
                        <a class="download-brochure" href="/assets/images/dancecamp/2025 Summer Camp Application Fillable.pdf" download="2025 Summer Camp Application Fillable.pdf">
                            <img class="brochure-img" src="/assets/images/dancecamp/2025-application-form.PNG">
                            <h5 class="font-weight-bold mt-4 pl-2 pr-2">{{ lang.txt6 }} (Fillable pdf)</h5>
                        </a>
                    </div>
                  <div class="col-lg-3 col-12 pt-lg-0 pt-5">
                      <a class="download-brochure" href="/documents/dancecamp/[English] 2025 Summer Camp UCLA Brochure.pdf" download="[English] 2025 Summer Camp UCLA Brochure.pdf">
                          <img class="brochure-img" src="/assets/images/dancecamp/2025-English-brochure.PNG">
                          <h5 class="font-weight-bold mt-4 pl-2 pr-2">{{ lang.txt7 }} (English)</h5>
                      </a>
                  </div>
                  <!-- <div class="col-lg-3 col-12 pt-lg-0 pt-5">
                      <a class="download-brochure" href="/documents/dancecamp/[French] 2025 Summer Camp at UCLA Brochure.pdf" download="[French] 2025 Summer Camp at UCLA Brochure.pdf">
                          <img class="brochure-img" src="/assets/images/dancecamp/2025-French-brochure.PNG">
                          <h5 class="font-weight-bold mt-4 pl-2 pr-2">{{ lang.txt7 }} (French)</h5>
                      </a>
                  </div> -->
                  <div class="col-lg-3 col-12 pt-lg-0 pt-5">
                      <a class="download-brochure" href="/documents/dancecamp/[Japanese] 2025 Summer Camp at UCLA Brochure.pdf" download="[Japanese] 2025 Summer Camp at UCLA Brochure.pdf">
                          <img class="brochure-img" src="/assets/images/dancecamp/2025-Japanese-brochure.PNG">
                          <h5 class="font-weight-bold mt-4 pl-2 pr-2">{{ lang.txt7 }} (Japanese)</h5>
                      </a>
                  </div>
              </div>
              <!-- <div class="row mt-5">
                  <div class="col-lg-3 col-12 pt-lg-0 pt-5">
                      <a class="download-brochure" href="/documents/dancecamp/[Portuguese] 2025 Summer Camp at UCLA Brochure.pdf" download="[Portuguese] 2025 Summer Camp at UCLA Brochure.pdf">
                          <img class="brochure-img" src="/assets/images/dancecamp/2025-Portuguese-brochure.PNG">
                          <h5 class="font-weight-bold mt-4 pl-2 pr-2">{{ lang.txt7 }} (Portuguese)</h5>
                      </a>
                  </div>
                  <div class="col-lg-3 col-12 pt-lg-0 pt-5">
                      <a class="download-brochure" href="/documents/dancecamp/[Korean] 2025 Summer Camp at UCLA Brochure.pdf" download="[Korean] 2025 Summer Camp at UCLA Brochure.pdf">
                          <img class="brochure-img" src="/assets/images/dancecamp/2025-Korean-brochure.PNG">
                          <h5 class="font-weight-bold mt-4 pl-2 pr-2">{{ lang.txt7 }} (Korean)</h5>
                      </a>
                  </div>
                  <div class="col-lg-3 col-12 pt-lg-0 pt-5">
                      <a class="download-brochure" href="/documents/dancecamp/[Chinese Trad] 2025 Summer Camp at UCLA Brochure.pdf" download="[Chinese Trad] 2025 Summer Camp at UCLA Brochure.pdf">
                          <img class="brochure-img" src="/assets/images/dancecamp/2025-Taiwanese-brochure.PNG">
                          <h5 class="font-weight-bold mt-4 pl-2 pr-2">{{ lang.txt7 }} (Chinese - Traditional)</h5>
                      </a>
                  </div>
                  <div class="col-lg-3 col-12 pt-lg-0 pt-5">
                      <a class="download-brochure" href="/documents/dancecamp/[Chinese Simp] 2025 Summer Camp at UCLA Brochure.pdf" download="[Chinese Simp] 2025 Summer Camp at UCLA Brochure.pdf">
                          <img class="brochure-img" src="/assets/images/dancecamp/2025-Chinese-brochure.PNG">
                          <h5 class="font-weight-bold mt-4 pl-2 pr-2">{{ lang.txt7 }} (Chinese - Simplified)</h5>
                      </a>
                  </div>
              </div>
              <div class="row mt-5">
                  <div class="col-lg-3 col-12 pt-lg-0 pt-5">
                      <a class="download-brochure" href="/documents/dancecamp/[Spanish] 2025 Summer Camp at UCLA Brochure.pdf" download="[Spanish] 2025 Summer Camp at UCLA Brochure.pdf">
                          <img class="brochure-img" src="/assets/images/dancecamp/2025-Spanish-brochure.PNG">
                          <h5 class="font-weight-bold mt-4 pl-2 pr-2">{{ lang.txt7 }} (Spanish)</h5>
                      </a>
                  </div>
                  <div class="col-lg-3 col-12 pt-lg-0 pt-5">
                      <a class="download-brochure" href="/documents/dancecamp/[German] 2025 Summer Camp at UCLA Brochure.pdf" download="[German] 2025 Summer Camp at UCLA Brochure.pdf">
                          <img class="brochure-img" src="/assets/images/dancecamp/2025-German-brochure.PNG">
                          <h5 class="font-weight-bold mt-4 pl-2 pr-2">{{ lang.txt7 }} (German)</h5>
                      </a>
                  </div>
                  <div class="col-lg-3 col-12 pt-lg-0 pt-5">
                      <a class="download-brochure" href="/documents/dancecamp/[Italian] 2025 Summer Camp at UCLA Brochure.pdf" download="[Italian] 2025 Summer Camp at UCLA Brochure.pdf">
                          <img class="brochure-img" src="/assets/images/dancecamp/2025-Italian-brochure.PNG">
                          <h5 class="font-weight-bold mt-4 pl-2 pr-2">{{ lang.txt7 }} (Italian)</h5>
                      </a>
                  </div>
                  <div class="col-lg-3 col-12 pt-lg-0 pt-5">
                      <a class="download-brochure" href="/documents/dancecamp/[Russian] 2025 Summer Camp at UCLA Brochure.pdf" download="[Russian] 2025 Summer Camp at UCLA Brochure.pdf">
                          <img class="brochure-img" src="/assets/images/dancecamp/2025-Russian-brochure.PNG">
                          <h5 class="font-weight-bold mt-4 pl-2 pr-2">{{ lang.txt7 }} (Russian)</h5>
                      </a>
                  </div>
              </div>
              <div class="row mt-5">
                  <div class="col-lg-3 col-12 pt-lg-0 pt-5">
                      <a class="download-brochure" href="/documents/dancecamp/[Turkish] 2025 Summer Camp at UCLA Brochure.pdf" download="[Turkish] 2025 Summer Camp at UCLA Brochure.pdf">
                          <img class="brochure-img" src="/assets/images/dancecamp/2025-Turkish-brochure.PNG">
                          <h5 class="font-weight-bold mt-4 pl-2 pr-2">{{ lang.txt7 }} (Turkish)</h5>
                      </a>
                  </div>
              </div> -->
          </div>
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

    .brochure-img {
        height: 300px;
        width: 230px;
        box-shadow: 1px 5px 18px #c2c2c2;
    }

    .download-brochure {
        color: black;
    }
</style>
<script>
	export default {
        async asyncData({ $content, params }) {
            const lang = await $content(`dancecamp/thanks/en`).fetch();
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
        layout:'dancecamp'
        // methods: {
        //     goToPage() {
        //         window.location.href = '/#content-30';
        //     }
        // }
	}
</script>