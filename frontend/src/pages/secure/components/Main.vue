<template>
  <main>
    <div class="container-fluid">
      <router-view></router-view>
    </div>
  </main>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'Main'
});
</script>
