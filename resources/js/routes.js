import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use( VueRouter );

export default new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'index',
      redirect: '/en/home',
    },
    {
      path: '/:lang/home',
      name: 'home-page',
      component: () => import('./components/Home.vue'),
    },
    {
      path: '/:lang/going-to-college',
      name: 'going-to-college',
      component: () => import('./components/pages/WhatIsMLI/GoingToCollege.vue'),
    },
    {
      path: '/:lang',
      name: 'internal-pages',
      component: () => import('./components/pages/Layout.vue'),
      children: [
        // WHAT IS MLI
        {
          path: 'about',
          name: 'what-is-mli',
          component: () => import('./components/pages/WhatIsMLI/About.vue'),
        },
        {
          path: 'feature',
          name: 'feature',
          component: () => import('./components/pages/WhatIsMLI/Feature.vue'),
        },
        {
          path: 'company',
          name: 'company',
          component: () => import('./components/pages/WhatIsMLI/Company.vue'),
        },
        {
          path: 'teachers',
          name: 'teachers',
          component: () => import('./components/pages/WhatIsMLI/Teachers.vue'),
        },
        {
          path: 'firstday-at-mli',
          name: 'firstday-at-mli',
          component: () => import('./components/pages/WhatIsMLI/FirstDayAtMli.vue'),
        },
        {
          path: 'image-gallery',
          name: 'image-gallery',
          component: () => ('./components/pages/WhatIsMLI/ImageGallery.vue'),
        },
        {
          path: 'careers',
          name: 'careers',
          component: () => import('./components/pages/WhatIsMLI/Careers.vue'),
        },
        // COURSES
        {
          path: 'course',
          name: 'course',
          component: () => import('./components/pages/Courses/Course.vue'),
        },
        {
          path: 'school-calendar',
          name: 'school-calendar',
          component: () => import('./components/pages/Courses/SchoolCalendar.vue'),
        },
        // PRICES
        {
          path: 'price',
          name: 'price',
          component: () => import('./components/pages/Prices/Price.vue'),
        },
        {
          path: 'price-auto',
          name: 'price-auto',
          component: () => import('./components/pages/Prices/PriceAuto.vue'),
        },
        // LOCATION
        {
          path: 'hollywood',
          name: 'hollywood',
          component: () => import('./components/pages/Location/Hollywood.vue'),
        },
        {
          path: 'westwood',
          name: 'westwood',
          component: () => import('./components/pages/Location/Westwood.vue'),
        },
        {
          path: 'stay',
          name: 'stay',
          component: () => import('./components/pages/Location/Accommodations.vue'),
        },
        // LOCATION
        {
          path: 'how-to-apply-for-a-student-visa',
          name: 'student-visa',
          component: () => import('./components/pages/HowToApply/StudentVisa.vue'),
        },
        {
          path: 'how-to-apply-for-an-overseas-students',
          name: 'oversea-student',
          component: () => import('./components/pages/HowToApply/OverseasStudent.vue'),
        },
        {
          path: 'how-to-apply-for-a-tranfer-students',
          name: 'transfer-students',
          component: () => import('./components/pages/HowToApply/TransferStudents.vue'),
        },
        {
          path: 'how-to-apply-for-a-change-of-status',
          name: 'change-of-status',
          component: () => import('./components/pages/HowToApply/ChangeOfStatus.vue'),
        },
        {
          path: 'how-to-apply-others',
          name: 'apply-others',
          component: () => import('./components/pages/HowToApply/Others.vue'),
        },
        // STUDENTS
        {
          path: 'testimonials',
          name: 'testimonials',
          component: () => import('./components/pages/Students/Testimonials.vue'),
        },
        {
          path: 'school-magazine',
          name: 'school-magazine',
          component: () => import('./components/pages/Students/SchoolMagazine.vue'),
        },
      ]
    },
    {
      path: '*',
      name: 'page-not-found',
      component: () => import('./components/PageNotFound.vue'),
    },
  ]
});