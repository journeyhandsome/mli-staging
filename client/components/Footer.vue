<template>
  <div class="footer-container">
    <div class="container-fluid">
      <div class="row">
        <div class="list-of-links col-lg-6 order-lg-last">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <div v-for="(footerSecond, index) in footerSecondLinks" :key="`${index}-footer_second`">
                <a :href="footerSecond.link">
                  <p>{{ footerSecond.title }}</p>
                </a>
                <ul>
                  <li v-for="(footerSecondSub, indexSub) in footerSecond.sublinks" :key="`${indexSub}-footer_second_sub`">
                    <template v-if="footerSecondSub.link && (footerSecondSub.link.includes('http') || footerSecondSub.link.includes('pdf'))">
                      <a :href="footerSecondSub.link" target="_blank">
                        {{ footerSecondSub.title }}
                      </a>
                    </template>
                    <template v-else>
                      <a :href="footerSecondSub.link">
                        {{ footerSecondSub.title }}
                      </a>
                    </template>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
              <div v-for="(footerThird, index) in footerThirdLinks" :key="`${index}-footer_third`">
                <a :href="footerThird.link">
                  <p>{{ footerThird.title }}</p>
                </a>
                <ul>
                  <li v-for="(footerThirdSub, indexSub) in footerThird.sublinks" :key="`${indexSub}-footer_third_sub`">
                    <template v-if="!footerThirdSub.link">
                      <span>{{ footerThirdSub.title }}</span>
                    </template>
                    <template v-else-if="footerThirdSub.link && (footerThirdSub.link.includes('http') || footerThirdSub.link.includes('pdf'))">
                      <a :href="footerThirdSub.link" target="_blank">
                        {{ footerThirdSub.title }}
                      </a>
                    </template>
                    <template v-else>
                      <a :href="footerThirdSub.link">
                        {{ footerThirdSub.title }}
                      </a>
                    </template>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-mission col-lg-6 order-lg-first">
          <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-9">
              <p class="site-title">{{ footerFirstLinks.title }}</p>
                <a :href="`${siteUrl}`">
                  <img src="/assets/images/mli-logo.png" alt="Mentor Language Institute Logo" />
                </a>
                <div class="sns">
                  <a :href="`https://www.facebook.com/MentorLanguageInstitute/`">
                    <img src="/assets/images/icons/facebook.png" />
                  </a>
                  <a :href="`https://www.instagram.com/mentorlanguageinstitute/?hl=en`">
                    <img src="/assets/images/icons/instagram.png" class="sns-img"/>
                  </a>
                  <a :href="`https://www.youtube.com/@englishlanguageschoolinlos7668`">
                    <img src="/assets/images/icons/youtube.png" class="sns-img"/>
                  </a>
                  <a :href="`https://www.tiktok.com/@mentorlanguage`">
                    <img src="/assets/images/icons/tiktok.png" class="sns-img"/>
                  </a>
                </div>
              <p class="site-mission-title">{{ footerFirstLinks.subtitle }} </p>
              <p class="site-mission-desc">{{ footerFirstLinks.mission }}</p>
              <CampusContacts />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright">
      <p>Copyright© Mentor Language Institute, 2025 All Rights Reserved.</p>
    </div>
  </div>
</template>

<script>
import * as helpers from "./constants/helpers";

export default {
  data() {
    return {
      lang: 'en',
      siteUrl: '',
      footerFirstLinks: {},
      footerSecondLinks: [],
      footerThirdLinks: [],
    }
  },
  methods: {
    updateLanguage(newLang) {
      this.lang = 'en';
      this.siteUrl = '';

      if(newLang) this.lang = newLang;

      if(this.lang != 'en') this.siteUrl = `/${this.lang}`;

      this.footerFirstLinks = helpers.getConstantsMenu('footer_first', this.lang);
      this.footerSecondLinks = helpers.getConstantsMenu('footer_second', this.lang);
      this.footerThirdLinks = helpers.getConstantsMenu('footer_third', this.lang);
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
.footer-container {
  background-color: #354757;

  .container-fluid {
    padding-top: 20px;
    padding-bottom: 20px;

    p, ul a {
      color: #FFFFFF;
    }
    .footer-mission {
      padding-top: 20px;

      .site-title {
        font-size: 11px;
        line-height: 13px;
      }
      .site-mission-title {
        font-weight: 500;
        font-size: 16px;
        line-height: 20px;
        margin: 20px 0 10px 0px;
      }
      .site-mission-desc {
        font-size: 14px;
        line-height: 17px;
      }
    }
    .list-of-links {
      p {
        font-weight: bold;
        font-size: 13px;
        line-height: 20px;
        margin-bottom: 0px;
      }
      ul {
        list-style: none;
        padding-inline-start: 0;
        
        a, span {
          font-size: 13px;
          line-height: 16px;
          cursor: pointer;
        }
        span {
          color: #FFFFFF;
          cursor: default;
        }
      }
    }
  }
}
.copyright {
  background: #292F3B;

  p {
    color: #B3C6DA;
    font-size: 10px;
    line-height: 20px;
    text-align: center;
    padding: 9px;
    margin-bottom: 0px;
  }
}

@media screen and (min-width: 375px) {
  .copyright p {
    font-size: 11px;
  }
}
@media screen and (max-width: 1023px) {
  .copyright {
    margin-bottom: 90px;
  }
}
@media screen and (max-width: 544px) {
  .sns {
    margin-left: 10px;
    display: inline-block;
    img {
      height: 27px;
      width: auto;
    }
  }
  .sns-img {
    margin-left: 5px;
  }
}
@media screen and (min-width: 545px) {
  .sns {
    margin-left: 35px;
    min-height: 25px;
    display: inline-block;
    img {
      height: 50px;
      width: auto;
    }
  }
  .sns-img {
    margin-left: 10px;
  }
}

@media screen and (min-width: 992px) {
  .sns {
    margin-left: 10px;
    display: inline-block;
    img {
      height: 27px;
      width: auto;
    }
  }
  .sns-img {
    margin-left: 5px;
  }
}
@media screen and (min-width: 1152px) {
  .sns {
    margin-left: 25px;
    display: inline-block;
    img {
      height: 35px;
      width: auto;
    }
  }
  .sns-img {
    margin-left: 5px;
  }
}
@media screen and (min-width: 1452px) {
  .sns {
    margin-left: 35px;
    min-height: 25px;
    display: inline-block;
    img {
      height: 50px;
      width: auto;
    }
  }
  .sns-img {
    margin-left: 10px;
  }
}
</style>