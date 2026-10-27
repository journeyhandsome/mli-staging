import axios from 'axios'

export default {
  target: 'static',

  components: true,

  head: {
    // script: [
    //     {
    //       href: 'https://cdn-cookieyes.com/client_data/b1a9e825aa3041a5b41cd798/script.js',
    //       type:'text/javascript',
    //       id:'cookieyes',
    //       body: true
    //     }
    //   ],
    title: 'Affordable English School in Los Angeles | Mentor Language Institute',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: 'Meta description' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      { rel: 'stylesheet', type: 'text/css', href: 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' },
    ],
    script: [
      {
        src: "/js/jquery-3.3.1.slim.min.js",
        type: "text/javascript",
        body: true
      },
      {
        src:
          "/js/popper.min.js",
        type: "text/javascript",
        body: true
      },
      {
        src:
          "/js/bootstrap.bundle.min.js",
        type: "text/javascript",
        body: true
      },
      {
        src:
          "/js/bootstrap-datepicker.min.js",
        type: "text/javascript",
        body: true
      },
      {
        src: "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js",
        type: "text/javascript",
        body: true
      }
    ]
  },

  // router: {
  //   extendRoutes(routes, resolve) {
  //     routes.push({
  //       name: 'custom',
  //       path: '*',
  //       component: resolve(__dirname, 'pages/404.vue')
  //     })
  //   }
  // },

  generate: {
    routes() {
      const url = `${process.env.APP_API_URL}/get_routes`;
      console.log('Generating routes from:', url);
      return axios.get(url).then(res => {
        return res.data.map(user => user.link);
      }).catch(err => {
        console.error('Failed to fetch dynamic routes:', err.response?.data || err.message);
        return []; // prevent fatal error
      });
    },
    exclude: [
      /tel:323-870-7102/g,
      /tel:310-887-0777/g,
      /https:\/\/agent.mliesl.edu/g,
      /\/(?:de|kr|th)\/faq\b/,
      /\/(?:ar|ch|de|en|fr|it|jp|kr|por|ru|sp|th|tr|tw)\/(?:admission|contact|freetrial|material|how\-to\-apply|how\-to\-apply\/student\-visa\-f1)\/about\b/,
      /\/(?:ar|ch|de|en|fr|it|jp|kr|por|ru|sp|th|tr|tw)\/(?:admission|contact|freetrial|material|how\-to\-apply|how\-to\-apply\/student\-visa\-f1)\/admission\b/,
      /\/(?:ar|ch|de|en|fr|it|jp|kr|por|ru|sp|th|tr|tw)\/(?:admission|contact|freetrial|material|how\-to\-apply|how\-to\-apply\/student\-visa\-f1)\/careers\b/,
      /\/(?:ar|ch|de|en|fr|it|jp|kr|por|ru|sp|th|tr|tw)\/(?:admission|contact|freetrial|material|how\-to\-apply|how\-to\-apply\/student\-visa\-f1)\/company\b/,
      /\/(?:ar|ch|de|en|fr|it|jp|kr|por|ru|sp|th|tr|tw)\/(?:admission|contact|freetrial|material|how\-to\-apply|how\-to\-apply\/student\-visa\-f1)\/contact\b/,
      /\/(?:ar|ch|de|en|fr|it|jp|kr|por|ru|sp|th|tr|tw)\/(?:admission|contact|freetrial|material|how\-to\-apply|how\-to\-apply\/student\-visa\-f1)\/feature\b/,
      /\/(?:ar|ch|de|en|fr|it|jp|kr|por|ru|sp|th|tr|tw)\/(?:admission|contact|freetrial|material|how\-to\-apply|how\-to\-apply\/student\-visa\-f1)\/hollywood\b/,
      /\/(?:ar|ch|de|en|fr|it|jp|kr|por|ru|sp|th|tr|tw)\/(?:admission|contact|freetrial|material|how\-to\-apply|how\-to\-apply\/student\-visa\-f1)\/material\b/,
      /\/(?:ar|ch|de|en|fr|it|jp|kr|por|ru|sp|th|tr|tw)\/(?:admission|contact|freetrial|material|how\-to\-apply|how\-to\-apply\/student\-visa\-f1)\/price\b/,
      /\/(?:ar|ch|de|en|fr|it|jp|kr|por|ru|sp|th|tr|tw)\/(?:admission|contact|freetrial|material|how\-to\-apply|how\-to\-apply\/student\-visa\-f1)\/price-auto\b/,
      /\/(?:ar|ch|de|en|fr|it|jp|kr|por|ru|sp|th|tr|tw)\/(?:admission|contact|freetrial|material|how\-to\-apply|how\-to\-apply\/student\-visa\-f1)\/westwood\b/,
      /\/(?:ar|ch|de|en|fr|it|jp|kr|por|ru|sp|th|tr|tw)\/how\-to\-apply\/\b/,
      '/kr/school-magazine',
      '/en/admission/how-to-apply',
      '/en/how-to-apply/how-to-apply',
      '/en/how-to-apply/student-visa-f1/how-to-apply'
    ]
  },

  css: [
    '~/assets/css/bootstrap.css',
    '~/assets/css/bootstrap-icons.css',
    '~/assets/css/datepicker.min.css',
    '~/assets/css/app.scss',
  ],

  buildModules: [
    '@nuxtjs/axios',
    '@nuxt/content',
    '@nuxtjs/gtm',
  ],
  modules: [],

  serverMiddleware: [
    '~/server-middleware/sitemap',
  ],

  hooks: {
    async 'generate:done'(generator) {
      const fs = require('fs')
      const path = require('path')
      const { buildXML } = require('./server-middleware/sitemap')
      fs.writeFileSync(path.join(generator.distPath, 'sitemap.xml'), buildXML())
    },
  },

  gtm: {
    id: 'GTM-WZ3ZXG4',
    pageTracking: true
  },

  publicRuntimeConfig: {
    axios: {
      baseURL: process.env.APP_API_URL,
    },
    // Public by design: the site key is served inside the generated HTML. Defaulted here so
    // a build on a machine without a client/.env still ships a working widget.
    recaptcha_site_key: process.env.RECAPTCHA_SITE_KEY || '6Lel5L4tAAAAAEkdVhn6HaWQ3t9aLdo4w58lq0o6',
  },

  ignore: [
    '.nuxt',
    'dist',
    'node_modules'
  ]
}