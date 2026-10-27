<template>
    <header class="header">
        <div class="inner header__flexWrap">
            <div class="header__fixed">
                <h1 class="header__logoWrap"><a href="/"><img class="header__logo" src="/assets/images/lptf-new/logo.png" alt="Mentor Language Institute"></a></h1>
                <div class="header__select">
                    <div class="header__option">
                      <LptfListLinks :menu-links="firstSectionLinks" :is-language-handler="true"/>
                    </div>
                </div>
            </div>
            <div class="header__wrapper">
                <div class="header__upper">
                    <div class="header__btnWrap">
                        <a class="header__btn--westwood" href="tel:310 887 0777">WESTWOOD<br><span class="header__tel">(310) 887-0777</span></a>
                        <a class="header__btn--hollywood" href="tel:323 870 7102">HOLLYWOOD<br><span class="header__tel">(323) 870-7102</span></a>
                    </div>
                    
                    <template v-if="siteLang == 'ch'">
                      <a class="header__app_ch" v-for="(secondLink, index) in secondSectionLinks" :key="`${index}-second`" :href="`${secondLink.link}`">{{ secondLink.title }}</a>
                  </template>
                  <template v-else>
                      <a class="header__app" v-for="(secondLink, index) in secondSectionLinks" :key="`${index}-second`" :href="`${secondLink.link}`">{{ secondLink.title }}</a>
                  </template>
                </div>
                <nav class="nav">
                    <div class="nav__splab sp">
                        <label class="nav__label" for="menu"><div class="menu-trigger"><span></span><span></span><span></span></div></label>
                    </div>
                    <input type="checkbox" id="menu" class="on-off nav__checkbox">
                    <div class="nav__panel">
                          <template v-if="siteLang == 'ch'">
                              <ul class="nav__list_ch">
                                <li class="nav__item" v-for="(thirdLink, index) in thirdSectionLinks" :key="`${index}-third`"> <a class="nav__link" :href="`${thirdLink.link}`">{{ thirdLink.title }}</a></li>
                            </ul>
                          </template>
                          <template v-else-if="siteLang == 'jp'">
                              <ul class="nav__list_jp">
                                <li class="nav__item" v-for="(thirdLink, index) in thirdSectionLinks" :key="`${index}-third`"> <a class="nav__link" :href="`${thirdLink.link}`">{{ thirdLink.title }}</a></li>
                            </ul>
                          </template>
                          <template v-else-if="siteLang == 'kr'">
                              <ul class="nav__list_kr">
                                <li class="nav__item" v-for="(thirdLink, index) in thirdSectionLinks" :key="`${index}-third`"> <a class="nav__link" :href="`${thirdLink.link}`">{{ thirdLink.title }}</a></li>
                            </ul>
                          </template>
                          <template v-else>
                            <ul class="nav__list">
                              <li class="nav__item" v-for="(thirdLink, index) in thirdSectionLinks" :key="`${index}-third`"> <a class="nav__link" :href="`${thirdLink.link}`">{{ thirdLink.title }}</a></li>
                            </ul>
                          </template>
                    </div>
                </nav>
            </div>
            <div class="header_btn w-100 text-center p-2 pt-3 pb-3">
                <Button class="btn header-text header_btn-btn header_btn-btn-1" @click="admission">
                    {{ siteInfo.application }}
                </Button>
                <Button class="btn header-text header_btn-btn header_btn-btn-2" @click="contact">
                    {{ siteInfo.contact }}
                </Button>
            </div>
        </div>
    </header>
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
      thirdSectionLinks: [],
    }
  },
  methods: {
    redirectToPage(info) {
      this.$router.push(info.link);
    },
    getLangApplication() {
      switch(this.siteLang) {
        case 'kr': //korean
          return '온라인 신청';
        case 'fr': //france
          return 'Application en ligne';
        case 'sp': //spanish
          return 'Aplicación Online';
        case 'jp': //japan
          return 'オンライン申し込み';
        case 'por': //portugues
          return 'Inscrição online';
        case 'ch': //chinese
          return '線上報名';
        default: //english
          return 'Online Application';
      }
    },  
    getLangContact() {
      switch(this.siteLang) {
        case 'kr': //korean
          return '상담하기';
        case 'fr': //france
          return 'Contact';
        case 'sp': //spanish
          return 'Contacto';
        case 'jp': //japan
          return 'お問い合わせ';
        case 'por': //portugues
          return 'Contato';
        case 'ch': //chinese
          return '聯繫我們';
        default: //english
          return 'Contact';
      }
    }, 
    updateLanguage(newLang) {
      this.siteLang = 'en';
      this.siteUrl = '/';

      if(newLang) this.siteLang = newLang;

      if(this.siteLang != 'en') this.siteUrl = `/${this.siteLang}/home`;

      this.firstSectionLinks = helpers.getConstantsMenu('header_lptf_first', this.siteLang);
      this.secondSectionLinks = helpers.getConstantsMenu('header_lptf_second', this.siteLang);
      this.thirdSectionLinks = helpers.getConstantsMenu('header_lptf_third', this.siteLang);
      
      this.siteInfo =  {
        application: this.getLangApplication(),
        contact: this.getLangContact(),
      };
    },  
    admission() {
      if(this.siteLang == 'sp'){
        window.location.href = '/sp/admission';
      }
      else if(this.siteLang == 'por'){
        window.location.href = '/por/admission';
      }
      else if(this.siteLang == 'ch'){
        window.location.href = '/ch/admission';
      }
      else if(this.siteLang == 'jp'){
        window.location.href = '/jp/admission';
      }
      else if(this.siteLang == 'fr'){
        window.location.href = '/fr/admission';
      }
      else if(this.siteLang == 'kr'){
        window.location.href = '/kr/admission';
      }
      else{
        window.location.href = '/admission';
      }
    },
    contact() {
      if(this.siteLang == 'sp'){
        window.location.href = '/sp/lptf#contact';
      }
      else if(this.siteLang == 'por'){
        window.location.href = '/por/lptf#contact';
      }
      else if(this.siteLang == 'ch'){
        window.location.href = '/ch/lptf#contact';
      }
      else if(this.siteLang == 'jp'){
        window.location.href = '/jp/lptf#contact';
      }
      else if(this.siteLang == 'fr'){
        window.location.href = '/fr/lptf#contact';
      }
      else if(this.siteLang == 'kr'){
        window.location.href = '/kr/lptf#contact';
      }
      else{
        window.location.href = '/lptf#contact';
      }
    }
  },
  watch: {
    '$route.params': {
      handler(newValue) {
        this.updateLanguage(newValue.slug);
      },
      immediate: true,
    }
  },
  created: function() {
    this.updateLanguage(this.$route.params.slug);
  }
}
</script>

<style lang="scss" scoped>
.nav__list_ch {
    display: flex;
    justify-content: space-between;
    grid-gap: 20px;
    gap: 30px;
}
.nav__list_jp {
    display: flex;
    grid-gap: 13px;
}
.nav__list_kr {
    display: flex;
    justify-content: space-between;
    grid-gap: 20px;
    gap: 18px;
}
.header_btn {
    display: none;
}
/* for mobile */
  @media screen and (min-width: 0px) and (max-width: 765px) {
      .nav__list_kr, .nav__list_jp, .nav__list_ch {
        display: block;
      }
      .header_btn {
          display: block;
          background-color: #ffffff;
          position: fixed;
          z-index: 100;
          bottom: 0px;
      }
      .header_btn-btn {
          width: 48%;
          height: 40px;
      }
      .header_btn-btn-1 {
          background-color: #ea6216;
          color: #ffffff;
          border-radius: 0px;
      }
      .header_btn-btn-2 {
          border: 1px solid;
          background-color: #ea6216;
          color: #ffffff;
          border-radius: 0px;
      }
  }
</style>

