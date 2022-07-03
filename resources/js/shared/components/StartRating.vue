<template>
  <div>
    <font-awesome-icon icon="fas fa-star" class="fa-lg" v-for="fStar in fullStars" :key="'full' + fStar"/>
    <font-awesome-icon icon="fa-solid fa-star-half-alt" v-if="halfStar" class="fa-lg"/>
    <font-awesome-icon icon="fa-regular fa-star" v-for="eStar in emptyStars" :key="'empty' + eStar" class="fa-lg"/>
    <!-- <font-awesome-icon icon="fa-solid fa-users-between-lines" /> -->
  </div>
</template>
<script>
  export default {
    props: {
      rating: Number
    },
    computed: {
      halfStar() {
        const fraction = this.rating - Math.floor(this.rating);
        return fraction > 0 && fraction <= 0.5;
      },
      fullStars() {
        return Math.round(this.rating);
      },
      emptyStars() {
        return 5 - Math.ceil(this.rating);
      }
    }


  }
</script>