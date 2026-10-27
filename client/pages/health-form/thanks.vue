<template>
    <div class="container pb-5 text-center">
      <div class="pt-5 mt-5">
          <h1 class="font-weight-bold mt-5 ">{{ details.txt1 }}</h1>
          <h1 class="font-weight-bold">{{ details.txt2 }}</h1>
          <p class="pt-4 thanks-txt">{{ details.txt3 }}</p>
          <p class="thanks-txt">{{ details.txt4 }}</p>
      </div>
    </div>
</template>
  
  <script>
      export default {
      async asyncData({ $content, params }) {
              const details = await $content(`health-form/thanks/en`).fetch();
  
              return {
                  details
              }
          },
          head() {
              if(this.details) {
                  return {
                      title: this.details.pageTitle,
                      meta: [
                          {
                          hid: 'description',
                          name: 'description',
                          content: this.details.pageDescription
                          }
                      ],
                  }
              }
          }
      }
  </script>