<template>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <div class="text-end">
<!--            <button type="button" class="btn btn-outline-light me-2">Login</button>-->
            <button type="button" class="btn btn-warning" @click="logOut">Log out</button>
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import axios from 'axios'
import { useRouter } from 'vue-router'

export default defineComponent({
  name: 'Header',
  setup() {
    const router = useRouter()

    const logOut = async () => {
      await axios.post('logout')
      localStorage.clear()
      await router.push('/login')
    }

    return {
      logOut
    }
  }
});
</script>
