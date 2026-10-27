<template>
  <div class="container whatsapp">
    <div class="row justify-content-center">
        <div v-if="lang == 'jp'">
          <div class="lineImage">
              <a :href="`${info.link}`" v-for="(info, index) in images" :key="`${index}-whatsapp-image`">
                <img :src="`/assets${info.image}`" :alt="info.title"/>
              </a>
          </div>
        </div>
        <div v-if="lang != 'jp'" class="button">
            <a :href="`${info.link}`" v-for="(info, index) in images" :key="`${index}-whatsapp-image`">
            <img :src="`/assets${info.image}`" :alt="info.title" />
            </a>
        </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'Whatsapp',
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
      const path = "/images/whatsapp/";
      let currentLanguage = '';

      switch(this.lang) {
        //has assigned image
        default: //english
          currentLanguage = 'en';
        break;
        case 'jp': //japan
          currentLanguage = 'jp';
        break;
      }
      if (this.lang == 'jp'){
        this.images = [
          {
            title: 'MLI Line',
            image: path + currentLanguage + "/MLI_LINE.png",
            link: 'https://lin.ee/PwQqV3z',
          },
        ];
      }
      else{
        this.images = [
          {
            title: 'Hollywood Whatsapp',
            image: path + currentLanguage + "/HOLLYWOOD_Whatsapp_button_English_NOV23.png",
            link: 'https://api.whatsapp.com/send?phone=14244404062',
          },
          {
            title: 'Westwood Whatsapp',
            image: path + currentLanguage + "/WESTWOOD_Whatsapp_button_English_NOV23.png",
            link: 'https://api.whatsapp.com/send?phone=13107298091',
          },
        ];

      }
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
.whatsapp .row .button{
    margin-bottom: -50px;
    display: inline-flex;
    margin-right: auto;
    margin-left: auto;
    img {
        width: auto;
        max-width: 120%;
    }
    
}
.whatsapp .row .lineImage{
    display: inline-flex;
    margin-bottom: 10px;
    margin-right: auto;
    margin-left: auto;
    img {
        width: auto;
        max-width: 110%;
    }
    
}
@media screen and (max-width: 375px) {
    .whatsapp .row .button{
        padding: 0 20px;
        margin-left: -25px;
        margin-right: auto;
    }
    .whatsapp .row .lineImage{
        margin-left: -18px;
        margin-right: 20px;
        img{
          padding: 0 20px;
        }
    }
}
@media screen and (min-width: 376px) and (max-width: 515px) {
    .whatsapp .row .button{
        padding: 0 25px;
        margin-left: -28px;
        margin-right: auto;
      
    }
    .whatsapp .row .lineImage{
        margin-left: -18px;
        margin-right: 20px;
        img{
          padding: 0 22px;
        }
    }
}

@media screen and (min-width: 516px) and (max-width: 767px) {
    .whatsapp .row .button{
        padding: 0 14px;
        margin-left: 16px;
        margin-right: auto;
      
    }
    .whatsapp .row .lineImage{
        margin-left: -22px;
        margin-right: 25px;
        img{
          padding: 0 30px;
        }
    }
}

@media screen and (min-width: 768px) {
.whatsapp {
    display: none;
}
}
</style>