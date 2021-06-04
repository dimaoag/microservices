<template>
  <header class="p-3 mb-3 border-bottom">
    <div class="container-fluid">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li>
            <router-link to="/dashboard" class="nav-link px-2" active-class="link-secondary">Dashboard</router-link>
          </li>
          <li>
            <router-link to="/users" class="nav-link px-2" active-class="link-secondary">Users</router-link>
          </li>
          <li>
            <router-link to="/roles" class="nav-link px-2" active-class="link-secondary">Roles</router-link>
          </li>
          <li>
            <router-link to="/products" class="nav-link px-2" active-class="link-secondary">Products</router-link>
          </li>
          <li>
            <router-link to="/orders" class="nav-link px-2" active-class="link-secondary">Orders</router-link>
          </li>
        </ul>

        <div class="d-flex text-end">
          <router-link to="/profile" class="dropdown-item">{{ user?.first_name + ' ' + user?.last_name }}</router-link>
          <a class="dropdown-item" href="javascript:void(0)" @click="logOut">Log out</a>
        </div>
      </div>
    </div>
  </header>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import axios from 'axios'
import { useRouter } from 'vue-router'

export default defineComponent({
  name: 'Header',
  props: ['user'],
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

