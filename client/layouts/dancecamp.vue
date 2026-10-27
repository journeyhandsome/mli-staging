<template>
  <div class="app">
    <Header />
    <div class="content-bg" :class="$route.params.slug">
      <div class="container internal-pages">
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <nuxt-child />
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>