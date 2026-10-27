<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark-blue">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <i class="bi bi-list"></i>
      <i class="bi bi-x"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav justify-content-center">
        <li class="nav-item"
          v-for="(menuLink, index) in availableLinks"
          :key="`${index}-main_${menuLink.title}`"
          :class="(menuLink.submenus && menuLink.submenus.length > 0) ? 'dropdown' : ''">

          <template v-if="menuLink.submenus && menuLink.submenus.length > 0">
                <a class="nav-link dropdown-toggle mli-link" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                <a class="nav-link clickable mli-link" :href="`/${menuLink.link}`">
                    <span v-html="menuLink.title"></span>
                </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <template v-for="(submenu, index) in menuLink.submenus">
                
              <template v-if="submenu.link.includes('https')">
                  <a :href="submenu.link" class="dropdown-item" :key="`${index}-submenu_${submenu.title}`">
                    <img v-if="submenu.image" :src="submenu.image" :alt="submenu.title" />
                    <span v-html="submenu.title"></span>
                  </a>
              </template>
              <template v-else>
                  <a :href="`/${submenu.link}`" class="dropdown-item" :key="`${index}-submenu_${submenu.title}`">
                    <img v-if="submenu.image" :src="submenu.image" :alt="submenu.title" />
                    <span v-html="submenu.title"></span>
                  </a>
              </template>
              </template>
            </div>
          </template>
          <template v-else>
              <template v-if="menuLink.link.includes('https')">      
                <a class="nav-link dropdown-mli mli-link" href="#"></a>
                <a :href="menuLink.link" class="nav-link mli-link">
                  {{ menuLink.title }}
                </a>
              </template>
              <template v-else>
                <a class="nav-link dropdown-mli mli-link" href="#"></a>
                <a :href="`/${menuLink.link}`" class="nav-link mli-link">
                  {{ menuLink.title }}
                </a>
              </template>
          </template>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
import * as helpers from "./constants/helpers";
export default {
  data() {
    return {
      availableLinks: [],
    }
  },
  watch: {
    '$route.params': {
      handler(newValue) {
        this.availableLinks = helpers.getConstantsMenu('header_third', newValue.slug);
      },
      immediate: true,
    }
  },
  created: function() {
    this.availableLinks = helpers.getConstantsMenu('header_third', this.$route.params.slug);
  }
}
</script>

<style lang="scss" scoped>
.highlight{
  color: #FF0000;
}
.navbar {
  padding: unset;
  position: absolute;
  top: 0;
  right: 0;
  width: 100%;
  z-index: 10000;
  .navbar-toggler {
    padding: 0.25rem;
    background-color: #0A81DE;
    border-radius: 0px;
    position: absolute;
    top: 0;
    right: 0;
    &[aria-expanded="true"] {
      background-color: unset;
      border: unset;
      .bi.bi-list {
        display: none;
      }
      .bi.bi-x {
        display: block;
      }
    }
    &[aria-expanded="false"] {
      .bi.bi-x {
        display: none;
      }
      .bi.bi-list {
        display: block;
      }
    }
    i {
      color: white;
      font-size: 30px;
      &.bi.bi-x {
        z-index: 1;
      }
    }
  }
  .navbar-collapse {
    margin-top: 50px;
  }
  &.navbar-light .navbar-nav {
    background-color: #3862A4;
    padding: 0px;
    min-height: 100vh;
    a {
      &.nav-link, &.nav-link.active {
        font-size: 22px;
        color: #FFFFFF;
        padding: 15px 25px;
      }
      &.dropdown-item {
        font-size: 18px;
        color: #FFFFFF;
      }
    }
    .dropdown-menu {
      background-color: #3862A4;
      border: unset;
      padding-top: 0rem;
      margin-top: 0;
      margin-left: 20px;
      a {
        cursor: pointer;
        font-size: 18px;
        padding: 15px 25px;
        &:hover {
          background-color: unset;
        }
      }
    }
  }
}
@media screen and (max-width: 991px) {
  a.nav-link.clickable.mli-link {
    padding-left: 0px !important;
  }
  .navbar-nav.justify-content-center {
    justify-content: unset !important;
  }
  .mli-link {
    display: inline-flex;
  }
}
@media screen and (min-width: 992px) {
  .navbar {
    .navbar-collapse {
      margin-top: 0px;
    }
  }
  .nav-item.dropdown:hover .dropdown-menu {
    display: block !important;
  }
  .navbar.navbar-light {
    position: unset;
    .collapse.navbar-collapse {
      display: block !important;
    }
    .navbar-nav {
      padding: unset;
      min-height: unset;
      li {
        padding: 0 10px;
        a.dropdown-toggle.mli-link, a.dropdown-mli.mli-link {
          display: none;
        }
      }
      a.nav-link, .dropdown-menu a {
        font-size: 15px;
        line-height: 18px;
        padding: 15px 8px;
        &:hover {
          background-color: #004494;
        }
      }
      .dropdown-menu {
        background-color: unset;
        display: none;
        &:hover {
          display: block;
        }
        a {
          color: #004494;
          background-color: #FFFFFF;
          &:hover {
            background-color: #ECF7FF;
          }
        }
      }
    }
  }
}
@media screen and (min-width: 768px) {
  .navbar.navbar-light .navbar-nav {
    a.nav-link, .dropdown-menu a {
      padding: 20px;
    }
  }
}
@media screen and (min-width: 1220px) {
  .navbar.navbar-light .navbar-nav {
    a.nav-link, .dropdown-menu a {
      padding: 15px;
    }
  }
}
@media screen and (min-width: 1440px) {
  .navbar.navbar-light .navbar-nav {
    a.nav-link, .dropdown-menu a {
      padding: 15px 25px;
    }
  }
}
</style>