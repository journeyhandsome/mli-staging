<template>
  <div class="table-responsive">
    <table :class="`table ${tableClass}`">
      <thead>
        <tr class="main-header" v-if="tableInfo.title">
          <th :colspan="tableMaxCol">
            <span v-html="tableInfo.title"></span>
          </th>
        </tr>
        <tr v-if="tableInfo.title_optional">
          <th :colspan="tableMaxCol">
            <span v-html="tableInfo.title_optional"></span>
          </th>
        </tr>
        <tr>
          <th class="second-header" v-for="(th_det, th_i) in tableInfo.thead" :key="`table-header-${randomText}-${th_i}`">
            {{ th_det }}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-if="tableInfo.weeksStudy">
          <th :rowspan="13">
            <span v-html="tableInfo.weeksPlan"></span>
          </th>
          <th :colspan="2">
            <span v-html="tableInfo.weeksStudy"></span>
          </th>
        </tr>
        <tr v-for="(tr_det, tr_i) in tableInfo.tbody" :key="`table-row-${randomText}-${tr_i}`">
          <td v-for="(td_det, td_i) in tr_det" :key="`table_column-${randomText}-${tr_i}-${td_i}`">
            <span v-html="td_det"></span>
          </td>
        </tr>
        <tr v-if="tableInfo.weeks2Study">
          <th :colspan="2">
            <span v-html="tableInfo.weeks2Study"></span>
          </th>
        </tr>
        <tr v-for="(tr_det1, tr_i) in tableInfo.tbody1" :key="`table-row-${randomText}-${tr_i}`">
          <td v-for="(td_det1, td_i) in tr_det1" :key="`table_column-${randomText}-${tr_i}-${td_i}`">
            <span v-html="td_det1"></span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  export default {
    props: {
      tableClass: {
        type: String,
        default: 'table-striped',
      },
      tableMaxCol: {
        type: Number,
        default: 4,
      },
      tableInfo: Object,
    },
    data: function() {
      return {
        randomText: Math.random().toString(36).substring(7) 
      }
    },
  }
</script>

<style lang="scss" scoped>
table {
  thead {
    .main-header {
      background: #FFFBDA;
    }
    .second-header{
      text-align: center;
    }
  }
  tbody {
    text-align: center;
  }
}
.table, th, td {
    border: 1px solid black !important;
}
th {
  vertical-align:middle; 
  text-align:center;
}
</style>
