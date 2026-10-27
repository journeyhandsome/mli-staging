<template>
  <ul class="nav justify-content-center" :class="additionalClass">
    <li class="nav-item"
      v-for="(menuLink, index) in menuLinks"
      :key="`${index}-main_${menuLink.title}`"
      :class="(menuLink.submenus && menuLink.submenus.length > 0) ? 'dropdown' : ''">

      <template v-if="menuLink.submenus && menuLink.submenus.length > 0">
        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <template v-if="isLanguageHandler && menuLink.title == 'Language'">
            <span v-html="activeLanguage"></span>
          </template>
          <template v-else>
            {{ menuLink.title }}
          </template>
        </a>
        <template v-if="isLanguageHandler">
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <span v-on:click="translate" :id="submenu.link" v-for="(submenu, index) in menuLink.submenus" :key="`${index}-submenu_${submenu.title}`" class="dropdown-item">
              <img v-if="submenu.image" :src="submenu.image" :alt="submenu.title" />
              {{ submenu.title }}
            </span>
          </div>
        </template>
        <template v-else>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <template v-for="(submenu, index) in menuLink.submenus">
              <a :href="`${submenu.link}`" class="dropdown-item" :key="`${index}-submenu_${submenu.title}`">
                <img v-if="submenu.image" :src="`/assets${submenu.image}`" :alt="submenu.title" />
                {{ submenu.title }}
              </a>
            </template>
          </div>
        </template>
      </template>
      <template v-else>
        <template v-if="menuLink.link.includes('http')">
          <a :href="menuLink.link" target="_blank" class="nav-link">
            {{ menuLink.title }}
          </a>
        </template>
        <template v-else>
          <a :href="menuLink.link" class="nav-link">
            {{ menuLink.title }}
          </a>
        </template>
      </template>
    </li>
  </ul>
</template>

<script>
  import language from './constants/lptflanguage';

  export default {
    props: {
      menuLinks: Array,
      additionalClass: String,
      isLanguageHandler: {
        type: Boolean,
        default: false,
      }
    },
    data: function() {
      return {
        activeLanguage: '',
        language: [],
      }
    },
    watch: {
      '$route.params': {
        handler(newValue) {
          if(this.isLanguageHandler) {
            this.updateLanguage(newValue.slug);
          }
        },
        immediate: true,
      }
    },
    methods: {
      translate(event) {
        let lang = event.target.id;
        let slug = this.$route.params.slug;
            slug = (slug) ? slug : 'en';
        let currentLocation = '/';
        let fullPath = this.$route.fullPath;

        if(lang == 'en') {
          if(!this.$route.fullPath.includes('home')) {
            currentLocation = this.$route.path.replace(`/${this.$route.params.slug}/`, `/`);
          }
        } else {
          if(slug == 'en') {
            if(fullPath == '/') {
              currentLocation = `/${lang}`;
            } else {
              currentLocation = `/${lang}${this.$route.fullPath}`;
            }
          } else {
            currentLocation = this.$route.path.replace(`/${slug}/`, `/${event.target.id}/`);
          }
        }

        window.location.href = currentLocation;
      },
      updateLanguage(lang) {
          lang = (lang) ? lang : 'en';
        const langInfo = language.filter(data => data.link == lang);

        if(langInfo.length > 0) {
          this.activeLanguage = `<img src="${langInfo[0].image}" alt="${langInfo[0].title}"> ${langInfo[0].title}`;
        }
      }
    },
    created: function() {
      if(this.isLanguageHandler) {
        this.updateLanguage(this.$route.params.slug);
      }
    }
  }
</script>

<style scoped lang="scss">
.dropdown-menu {
  margin: 0;
  padding: 0;
}
.dropdown-toggle {
  padding: 3px 20px;
  border: 1px solid #777;
}
li { cursor: pointer; }
.dropdown-item {
  font-size: 18px;
  padding: 3px 28px;
  border-top: 1px solid #777;
  border-left: 1px solid #777;
  border-right: 1px solid #777;
}
.dropdown-item:last-child {
    border-bottom: 1px solid #777;
}

@media screen and (max-width: 834px) {
  .dropdown-item {
    font-size: 15px;
    padding: 5px 28px;
  }
}

</style>