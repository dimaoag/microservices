<template>
  <div class="login-wrapper text-center">
    <main class="form-signin">
      <form @submit.prevent="submit">
        <h1 class="h3 mb-3 fw-normal">Please log in</h1>

        <div class="form-floating">
          <input type="email" class="form-control" id="email" required autofocus  v-model="email">
          <label for="email">Email address</label>
        </div>

        <div class="form-floating">
          <input type="password" class="form-control" id="password" required v-model="password">
          <label for="password">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
      </form>
    </main>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';
import { useRouter } from 'vue-router'
import axios from 'axios'

export default defineComponent({
  name: 'Register',
  setup() {
    const email = ref('')
    const password = ref('')
    const router = useRouter()

    const submit = async () => {

      await axios.post('login', {
        email: email.value,
        password: password.value,
      })

      await router.push('/')
    }

    return {
      email,
      password,
      submit
    }
  }
});
</script>

<style scoped>
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-floating {
  margin-bottom: 10px;
}

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
