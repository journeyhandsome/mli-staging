<template>
  <div class="container brochure">
    <div class="row justify-content-center">
      <div class="col-lg-6" v-for="(info, index) in images" :key="`${index}-brochure-image`">
        <a :href="`${urlLang}/${info.link}`">
          <img :src="`/assets${info.image}`" :alt="info.title" />
        </a>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'Brochure',
  async asyncData({ params }) {
    const lang = params.slug;

    return {
      lang
    }
  },
  data() {
    return {
      images: [],
      urlLang: '/en',
      lang: 'en'
    }
  },
  methods: {
    getImageLanguage() {
      const path = "/images/brochure/";
      let currentLanguage = '';

      switch(this.lang) {
        //has assigned image
        case 'tw': //taiwanese
          currentLanguage = 'tw';
        break;
        case 'tr': //turkey
          currentLanguage = 'tr';
        break;
        case 'it': //italian
          currentLanguage = 'it';
        break;
        case 'ch': //chinese
          currentLanguage = 'ch';
        break;
        case 'por': //portugues
          currentLanguage = 'por';
        break;
        case 'fr': //france
          currentLanguage = 'fr';
        break;
        case 'th': //thailand
          currentLanguage = 'th';
        break;
        case 'sp': //spanish
          currentLanguage = 'sp';
        break;
        case 'jp': //japan
          currentLanguage = 'jp';
        break;
        case 'de': //deutsch
          currentLanguage = 'de';
        break;
        case 'ru': //russian
          currentLanguage = 'ru';
        break;
        default: //english
          currentLanguage = 'en';
        break;
      }

      this.images = [
        {
          title: 'Download Brochure',
          image: path + currentLanguage + "/download-brochure.jpg",
          link: 'material',
        },
        {
          title: 'Contact Us',
          image: path + currentLanguage + "/contact-us.jpg",
          link: 'contact',
        },
      ];
    },
    setLanguage(newLang) {
      this.lang = 'en';
      this.urlLang = '';

      if(newLang) this.lang = newLang;

      if(this.lang != 'en') this.urlLang = `/${this.lang}`;
    }
  },
  watch: {
    '$route.params': {
      handler(newValue) {
        this.setLanguage(newValue.slug);
        this.getImageLanguage();
      },
      immediate: true,
    }
  },
  created: function() {
    this.setLanguage(this.$route.params.slug);
    this.getImageLanguage();
  }
}
</script>

<style lang="scss" scoped>
.brochure {
	text-align: center;

	.row {
		margin-top: 50px;
	}
	img {
    width: auto;
    max-width: 100%;
		max-height: 127px;
	}
}

@media screen and (max-width: 991px) {
  img {
    margin-bottom: 30px;
  }
}
</style>