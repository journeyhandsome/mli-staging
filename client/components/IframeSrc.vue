<template>
  <div class="embed-responsive embed-responsive-16by9 mb-5">
    <iframe class="embed-responsive-item" :src="ytlink" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
  </div>
</template>

<script>
  export default {
    props: {
      ytlink: String,
    }
  }
</script>