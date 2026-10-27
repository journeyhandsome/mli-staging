<template>
  <div class="app">
    <Header />
    <div class="content-bg" :class="$route.params.slug">
      <Nuxt />
    </div>
    <Footer />
  </div>
</template>
