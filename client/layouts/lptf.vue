<template>
  <div class="app">
    <LptfHeader />
    <div class="content-bg" :class="$route.params.slug">
      <Nuxt />
    </div>
  </div>
</template>