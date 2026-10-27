<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>{{ message.title }}</h3>

        <div class="row align-items-center ">
          <div class="col-lg-3">
            <img :alt="message.position" :src="`/assets${message.image}`" class="w-100 rounded-circle" />
            <p class="position">{{ message.position }}</p>
          </div>
          <div class="col-lg-9 message">
            <paragraph :desc="message.description" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
	import Paragraph from './Paragraph.vue';
  export default {
    components: {
      Paragraph,
    },
    props: {
      message: Object,
    },
  }
</script>

<style lang="scss" scoped>
.message {
  background: #eceaea;
  border-radius: 0px 20px 20px 20px;
  padding: 30px;
}
.position {
  font-size: 12px;
  text-align: center;
}
</style>