<template>
  <div class="campus-contact">
    <a :href="`tel:${camp.subtitle}`" class="header-call" v-for="(camp, index) in campustList"
      :key="`${index}-second-section_${camp.title}`"
      >
      <i class="bi bi-telephone-fill"></i>
      <div>
        <p class="title">{{ camp.title }}</p>
        <p class="subtitle">{{ camp.subtitle }}</p>
      </div>
    </a>
  </div>
</template>

<script>
  import campus from './constants/campus';

  export default {
    data: function() {
      return {
        campustList: campus,
      }
    }
  }
</script>

<style lang="scss" scoped>
.campus-contact {
  a {
    color: #000000;

    &:hover {
      text-decoration: none;
    }
  }
}
.header-call {
  background: #F8F8F8;
  border: 1px solid #EBEBEB;
  box-sizing: border-box;
  border-radius: 6px;
  display: inline-flex;
  padding: 8px;
  margin-right: 10px;

  div {
    margin-left: 2px;
  }
  i {
    font-size: 20px;
  }
  p {
    margin-bottom: 0px;

    &.title {
      font-size: 11px;
      line-height: 13px;
    }
    &.subtitle {
      font-weight: bold;
      font-size: 13px;
      line-height: 16px;
    }
  }
}
@media screen and (min-width: 375px) {
  .header-call {
    padding: 8px 15px;
    margin-right: 10px;
    div {
      margin-left: 5px;
    }
  }
}
@media screen and (min-width: 425px) {
  .header-call p {
    &.title {
      font-size: 12px;
      line-height: 14px;
    }
    &.subtitle {
      font-size: 14px;
      line-height:17px;
    }
  }
}
@media screen and (min-width: 542px) {
  .header-call {
    margin-left: 12px;
  }
}
@media screen and (min-width: 660px) {
  .header-call {
    padding: 5px 15px;
  }
}
@media screen and (min-width: 1220px) {
  .header-call {
    padding: 7px 15px;
  }
}
@media screen and (min-width: 1220px) and (max-width: 1440px) {
  .header-call {
    margin-right: 0px;
    margin-left: 7px;
    p {
      &.title {
        font-size: 13px;
        line-height: 14px;
      }
      &.subtitle {
        font-size: 15px;
        line-height: 18px;
      }
    }
  }
}
@media screen and (min-width: 360px) and (max-width: 374px) {
  .campus-contact{
    margin-left: 12px;
    .header-call {
      padding: 8px 12px;

      div {
        margin-left: 5px;
      }
    }
  }
}
@media screen and (min-width: 375px) and (max-width: 389px) {
  .campus-contact{
    margin-left: 15px;
    .header-call {
      padding: 8px 15px;
      margin-right: 10px;

      div {
        margin-left: 5px;
      }
    }
  }
}
@media screen and (min-width: 390px) and (max-width: 411px) {
  .campus-contact{
    margin-left: 17px;
    .header-call {
      padding: 8px 17px;
      margin-right: 10px;

      div {
        margin-left: 6px;
      }
    }
  }
}
@media screen and (min-width: 412px) and (max-width: 424px) {
  .campus-contact{
    margin-left: 18px;
    .header-call {
      padding: 8px 21px;
      margin-right: 10px;

      div {
        margin-left: 8px;
      }
    }
  }
}
@media screen and (min-width: 425px) and (max-width: 541px) {
  .header-call p {
    &.title {
      font-size: 12px;
      line-height: 14px;
    }
    &.subtitle {
      font-size: 14px;
      line-height:17px;
    }
  }
}

@media screen and (min-width: 542px) and (max-width: 576px)  {
  .campus-contact{
    margin-left: 50px;
    .header-call {
      padding: 8px 21px;
      margin-right: 12px;

      div {
        margin-left: 5px;
      }
    }
  }
}
@media screen and (min-width: 575px) and (max-width: 767px) {
  .campus-contact{
    margin-left: 65px;
    .header-call {
      padding: 8px 15px;
      margin-right: 12px;

      div {
        margin-left: 5px;
      }
    }
  }
}
@media screen and (min-width: 768px) {
  .header-call {
    padding: 5px 15px;
    margin-right: 10px;
    div {
      margin-left: 5px;
    }
  }
  .header-call p {
    &.title {
      font-size: 12px;
      line-height: 14px;
    }
    &.subtitle {
      font-size: 14px;
      line-height:17px;
    }
  }
}

@media screen and (min-width: 1220px) {
  .header-call {
    padding: 7px 15px;
  }
}

@media screen and (min-width: 1220px) and (max-width: 1440px) {
  .header-call {
    margin-right: 0px;
    margin-left: 7px;

    p {
      &.title {
        font-size: 13px;
        line-height: 14px;
      }
      &.subtitle {
        font-size: 15px;
        line-height: 18px;
      }
    }
  }
}
</style>

<style lang="scss">
@media screen and (min-width: 660px) {
  .second-section .left-panel {
    img {
      margin-bottom: 15px;
    }
  }
}
</style>
