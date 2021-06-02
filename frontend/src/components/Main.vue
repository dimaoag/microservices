<template>
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <router-view></router-view>
  </main>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'Main'
});
</script>
