<template>
  <div class="sidebar">
    <div class="banners">
      <div v-for="(image, index) in sidebarTexts.banner" :key="`sidebar-data-banner-${index}`">
        <a :href="image.link.includes('http') ? image.link : `${siteUrl}/${image.link}`" :target="image.link.includes('http') ? `_blank` : ''">
          <img :src="`/assets${image.image}`" :key="`${index}-sidebar-banner`" alt="brochure and contact us" />
        </a>
      </div>
    </div>
    <div class="icons mb-3">
      <div v-for="(image, index) in sidebarTexts.icon" :key="`sidebar-data-icon-${index}`">
        <a :href="image.link.includes('http') ? image.link : `${siteUrl}/${image.link}`" :target="image.link.includes('http') ? `_blank` : ''">
          <img :src="`/assets${image.image}`" :key="`${index}-sidebar-icon`" alt="brochure and contact us" />
        </a>
      </div>
    </div>
    <div class="introduction-video mb-4">
      <p class="title">{{ sidebarTexts.introductoryVideo.title }}</p>
      <template v-for="(ytlink, index) in sidebarTexts.introductoryVideo.videos">
        <div class="embed-responsive embed-responsive-16by9 mb-3" :key="`${index}-sidebar-introduction-video`">
          <iframe class="embed-responsive-item" :src="ytlink" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
        </div>
      </template>
    </div>
    <div class="life-at-mli mb-4">
      <p class="title">{{ sidebarTexts.lifeAtMli.title }}</p>
      <template v-for="(ytlink, index) in sidebarTexts.lifeAtMli.videos">
        <div class="embed-responsive embed-responsive-16by9" :key="`${index}-sidebar-mli-life`">
          <iframe class="embed-responsive-item" :src="ytlink" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
        </div>
      </template>
    </div>
    <div class="certifications mb-4">
      <p class="title">Certifications</p>
      <template v-for="(cert, index) in sidebarStatic.certifications">
        <img :src="`/assets${cert}`" :key="`${index}-sidebar-certification`" alt="mli certificates"/>
      </template>
    </div>
    <div class="locations mb-4">
      <p class="title">Locations</p>
      <div class="location-list" v-for="(loc, index) in sidebarStatic.locations" :key="`${index}-sidebar-location-div`">
        <p class="location-title">{{ loc.title }}</p>
        <p>{{ loc.subtitle }}</p>
        <a :href="loc.link">
          {{ loc.tel }}
        </a>
      </div>
    </div>
  </div>
</template>

<script>
  import sidebarInfo from './constants/sidebardata';

  export default {
    data() {
      return {
        lang: 'en',
        siteUrl: '',
        sidebarStatic: {},
        sidebarTexts: {}
      }
    },
    methods: {
      updateLanguage(newLang) {
        this.lang = 'en';
        this.siteUrl = '';

        if(newLang) this.lang = newLang;

        if(this.lang != 'en') this.siteUrl = `/${this.lang}`;

        this.sidebarStatic = sidebarInfo;
        this.sidebarTexts = sidebarInfo.getInfo(this.lang);
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
.sidebar {
  p {
    font-size: 20px;
    line-height: 24px;
    margin-bottom: 0px;

    &.title {
      margin-bottom: 10px;
    }
  }
  div {

    &.locations .location-list {
      margin-bottom: 20px;

      p {
        font-size: 15px;
        line-height: 18px;
        color: #3D4C5C;

        &.location-title {
          margin-bottom: 10px;
        }
      }
    }
  }
  img {
    width: 100%;
    margin-bottom: 10px;
  }
}

@media screen and (max-width: 767px) {
  .icons {
    display: none;
  }
}
</style>