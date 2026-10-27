<template>
  <div>
    <template v-if="!isOrderedList">
      <ul :class="className">
        <li v-for="(info_li, index_li) in listObj" :key="`list-${uniqueKey}-${index_li}`">
          <span v-html="info_li"></span>
        </li>
      </ul>
    </template>
    <template v-else>
      <ol :class="className">
        <li v-for="(info_li, index_li) in listObj" :key="`list-${uniqueKey}-${index_li}`">
          <span v-html="info_li"></span>
        </li>
      </ol>
    </template>
  </div>
</template>

<script>

export default {
  props: {
    listObj: Array,
    className: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
      isOrderedList: false,
      uniqueKey: Math.random().toString(36).substring(7)
    }
  },
  created: function() {
    switch (this.$props.className) {
      case 'decimal':
      case 'decimal-leading-zero':
      case 'upper-roman':
      case 'upper-alpha':
        this.isOrderedList = true;
    }
  }
}
</script>

<style lang="scss">
  ul {
    &.circle {
      list-style-type: circle;
    }
    &.square {
      list-style-type: square;
    }
  }
  ol {
    &.upper-roman {
      list-style-type: upper-roman;
    }
    &.upper-alpha {
      list-style-type: upper-alpha;
    }
  }
</style>
