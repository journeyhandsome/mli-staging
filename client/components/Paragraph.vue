<template>
  <div>
    <p v-for="(info_p, index_p) in desc" :key="`${randomText}-${index_p}`">
      <span v-html="info_p"></span>
    </p>
  </div>
</template>

<script>
  export default {
    props: {
      desc: Array,
    },
    data: function() {
      return {
        randomText: Math.random().toString(36).substring(7) 
      }
    }
  }
</script>