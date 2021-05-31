<template>
  <div class="wrapper">
    <Header />
    <div class="container-fluid">
      <div class="row">
        <Sidebar />
        <Main />
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import Sidebar from '@/components/Sidebar.vue'
import Header from '@/components/Header.vue'
import Main from '@/components/Main.vue'

export default defineComponent({
  name: 'App',
  components: {
    Sidebar,
    Header,
    Main
  },
});
</script>

<style>
.bd-placeholder-img {
  font-size: 1.125rem;
  text-anchor: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

@media (min-width: 768px) {
  .bd-placeholder-img-lg {
    font-size: 3.5rem;
  }
}
</style>
