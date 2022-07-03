<template>
  <div class="card w-100">
    <div class="card-body">
      <router-link :to="{ name: 'bookable', params: { id } }">
        <h1 class="card-title">{{ title }}</h1>
      </router-link>
      <a href="/bookable/1">test</a>
      <p class="card-text">{{ description }}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: String,
    description: String,
    id: Number,
  },
};
</script>