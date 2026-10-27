<template>
  <div>
    <div class="container container-small-sections">
      <!-- First Section !-->
      <div class="row first-section">
        <div class="col-sm-5 col-md-5 col-lg-6 left-panel">
          <p class="header-title">
            {{ siteInfo.title }}
          </p>
        </div>
        <div class="col-sm-7 col-md-7 col-lg-6 right-panel">
          <ListLinks :menu-links="firstSectionLinks" :is-language-handler="true" additional-class="float-right" />
        </div>
      </div>
      <!-- Second Section !-->
      <div class="row second-section">
        <div class="col-sm-10 col-md-12 col-lg-5 col-xl-6 left-panel">
          <a :href="`${siteUrl}`">
            <img :src="`/assets${siteInfo.logo}`" class="mli-logo" alt="Mentor Language Institute Logo">
          </a>
          <CampusContacts />
          <template v-if="siteLang != 'jp'">
            <Whatsapp />
          </template>
        </div>
        <div class="col-sm-7 col-md-7 col-lg-6 right-panel">
          <template v-if="siteLang == 'jp'">
            <Whatsapp />
          </template>
          <button type="button" class="btn btn-orange" @click="redirectToPage(secondLink)"
            v-for="(secondLink, index) in secondSectionLinks"
            :key="`${index}-second-right-panel`">
            {{ secondLink.title }}
          </button>
        </div>
      </div>
    </div>

    <MainMenu />
  </div>
</template>

<script>
import * as helpers from './constants/helpers';
export default {
  data() {
    return {
      siteLang: 'en',
      siteUrl: '/',
      siteInfo: {},
      firstSectionLinks: [],
      secondSectionLinks: [],
    }
  },
  methods: {
    redirectToPage(info) {
      this.$router.push(info.link);
    },
    getLanguageTitle() {
      switch(this.siteLang) {
        case 'ar': //arabic
          return 'مدرسة اللغة الإنجليزية ممتازة فعالة من حيث التكلفة في لوس انجليس | Mentor Language Institute';
        case 'kr': //korean
          return '로스 엔젤레스의 우수하고 합리적인 영어학습 | 멘토 어학원';
        case 'ru': //russian
          return ' Отличная школа английского языка в Лос-Анджелесе по доступной цене| Mentor Language Institute';
        case 'fr': //france
          return 'Excellente école d\'anglais accessible à Los Angeles | Mentor Language Institute';
        case 'sp': //spanish
          return 'Escuela de Inglés en Los Angeles con excelente precio-calidad | Mentor Language Institute';
        case 'th': //thailand
          return 'โรงเรียนสอนภาษาอังกฤษราคาไม่แพงใน Los Angeles | Mentor Language Institute';
        case 'jp': //japan
          return 'ロサンゼルスにあるリーズナブルな語学学校';
        case 'por': //portugues
          return 'Intercâmbio com melhor custo-benefício em Los Angeles | Mentor Language Institute';
        case 'ch': //chinese
          return '洛杉磯 C/P值最高的學校 | Mentor Language Institute';
        case 'it': //italian
          return 'Mentor Language Institute';
        case 'tr': //turkey
          return 'Los Angeles\'da Uygun İngilizce Okullari | Mentor Dil Enstitüsü';
        case 'de': //deutsch
          return 'Erschwingliche Englisch Sprachschule in Los Angeles | Mentor Language Insitute';
        case 'tw': //taiwanese
          return '位於洛杉磯的平價英語學校 | 語言輔導機構';
        default: //english
          return 'Affordable English School in Los Angeles | Mentor Language Institute';
      }
    },
    updateLanguage(newLang) {
      this.siteLang = 'en';
      this.siteUrl = '/';

      if(newLang) this.siteLang = newLang;

      if(this.siteLang != 'en') this.siteUrl = `/${this.siteLang}/`;
      
      this.siteInfo =  {
        title: this.getLanguageTitle(),
        logo: '/images/mli-logo.png'
      };

      this.firstSectionLinks = helpers.getConstantsMenu('header_first', this.siteLang);
      this.secondSectionLinks = helpers.getConstantsMenu('header_second', this.siteLang);
    },
    getImageLanguage() {
      const path = "/images/sidebar/jp";
      let currentLanguage = '';

      switch(this.lang) {
        //has assigned image
        case 'jp': //japanese
          currentLanguage = 'jp';
        break;
      }

      this.images = [
        {
          title: 'Hollywood Campus',
          image: path + currentLanguage + "/HOLLYWOOD_LINE_button_English_DEZ01.png",
          link: 'https://line.me/ti/p/TliCLA_GIi#~',
        },
        {
          title: 'Westwood Campus',
          image: path + currentLanguage + "/WESTWOOD_LINE_button_English_DEC01.png",
          link: 'https://line.me/ti/p/WZOeHttaYf',
        },
      ];
    },
  },
  watch: {
    '$route.params': {
      handler(newValue) {
        this.updateLanguage(newValue.slug);
        this.getImageLanguage();
      },
      immediate: true,
    }
  },
  created: function() {
    this.updateLanguage(this.$route.params.slug);
    this.getImageLanguage();
  }
}
</script>

<style lang="scss" scoped>
.first-section {
  .left-panel p {
    font-size: 11px;
    color: #999999;
    margin: 0 auto;
    padding-right: 40px;
  }
}
.second-section {
  padding-bottom: 10px;
  display: flex;
  .mli-logo {
    max-height: 60px;
  }
  .left-panel {
    .campus-contact {
      margin-top: 15px;
      display: inline-block;
      & > .header-call {
        margin-left: 20px;
      }
    }
  }
  .right-panel {
    display: flex;
    flex-wrap: wrap;
    padding: 22px 13px 10px 13px;
    position: fixed;
    bottom: 0;
    left: 0;
    z-index: 11;
    background: #FFFFFF;
    box-shadow: 0px -10px 30px #00000026;
    border-radius: 20px 20px 0px 0px;
    button {
      color: #FFFFFF;
      width: 160px;
      font-size: 15px;
      display: block;
      margin-left: auto;
      margin-right: auto;
      flex: 0 0 48%;
      margin-bottom: 10px;
    }
  }
}
@media screen and (max-width: 366px) {
  .second-section .right-panel button {
    font-size: 12px;
  }
  .second-section .right-panel .lineImage img{
    display: inline-flex;
    margin-right: 7px;
    margin-left: auto;
    width: auto;
    max-width: 48%;
    
}
}
@media screen and (min-width: 516px) and (max-width: 576px) {
  .second-section .col-sm-10 {
    flex: 0 0 83.3333333333%;
    max-width: 83.3333333333%;
  }
}
@media screen and (min-width: 1440px) {
  .second-section {
    padding-bottom: 0px;
  }
}
@media screen and (min-width: 768px) {
  .second-section .right-panel button {
    flex: 0 0 23%;
    margin-bottom: 15px;
  }
  .lineImage {
      display: none;
  }
}
@media screen and (min-width: 992px) {
  .container-small-sections {
    max-width: 98%;
  }
  .second-section {
    .right-panel {
      padding: 15px 0px 0px 0px;
      position: unset;
      background: unset;
      box-shadow: unset;
      justify-content: flex-end;
      button {
        flex: 0 0 45%;
        margin-left: 10px;
        margin-right: 0px;
      }
    }
  }
}
@media screen and (min-width: 1220px) {
  .second-section .right-panel button {
    flex: 0 0 22%;
  }
}
@media screen and (min-width: 1220px) and (max-width: 1440px) {
  .second-section {
    .left-panel {
      flex: 0 0 44%;
      max-width: 44%;
    }
    .right-panel {
      flex: 0 0 56%;
      max-width: 56%;
      button {
        padding: 10px;
      }
    }
  }
}
@media screen and (min-width: 1220px) and (max-width: 1269px) {
  .second-section {
    .left-panel {
      flex: 0 0 45%;
      max-width: 45%;
    }
    .right-panel {
      flex: 0 0 55%;
      max-width: 55%;
      button {
        font-size: 14px;
      }
    }
  }
}
</style>

<style lang="scss">
.right-panel {
  text-align: right;
}
.first-section .right-panel .nav-link {
  color: #393939;
  padding: 0 1rem 0.5rem 1rem;
}
@media screen and (max-width: 700px) {
  .first-section .right-panel ul li {
    
    &:first-child {
      margin-top: 20px;
      }
    &:nth-child(2){
      margin-right: -115px;
      margin-top: 20px;
    }
    &:last-child {
      display: block;
      z-index: 1;
      margin-top: 50px;
      margin-bottom: -60px;
    }
    a {
      font-size: 15px;
      line-height: 18px;
      color: #000000;
    }
  }

}
@media screen and (min-width: 991px) {
  .first-section .right-panel ul li {
    &:last-child a {
      padding-right: 0px;
    }
  }
}
</style>