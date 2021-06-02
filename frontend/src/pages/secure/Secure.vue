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
import { defineComponent, onMounted } from 'vue'
import Sidebar from '@/components/Sidebar.vue'
import Header from '@/components/Header.vue'
import Main from '@/components/Main.vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default defineComponent({
  name: 'Secure',
  components: {
    Sidebar,
    Header,
    Main
  },
  setup() {
    const router = useRouter()

    onMounted(async () => {
      try {
        const response = await axios.get('user')
        console.log(response)
      } catch (e) {
        await router.push('/login')
      }
    })
  }
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
