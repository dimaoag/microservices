<template>
  <div class="wrapper">
    <Header :user="user" />
    <div class="container-fluid">
      <div class="row">
        <Main />
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, onMounted, ref } from 'vue'
import Header from '@/pages/secure/components/Header.vue'
import Main from '@/pages/secure/components/Main.vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default defineComponent({
  name: 'Secure',
  components: {
    Header,
    Main
  },
  setup() {
    const router = useRouter()
    const user = ref(null)

    onMounted(async () => {
      try {
        const response = await axios.get('user')
        user.value = response.data.data
      } catch (e) {
        await router.push('/login')
      }
    })

    return {
      user
    }
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
