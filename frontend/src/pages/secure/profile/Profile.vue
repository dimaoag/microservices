<template>
  <div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Change profile data</h4>
    <form class="needs-validation" @submit.prevent="submitProfileData">
      <div class="row g-3">
        <div class="col-md-12">
          <label for="first_name" class="form-label">First name</label>
          <input type="text" class="form-control" id="first_name" required v-model="firstName">
        </div>
        <div class="col-md-12">
          <label for="last_name" class="form-label">Last name</label>
          <input type="text" class="form-control" id="last_name" required v-model="lastName">
        </div>
      </div>
      <br class="my-4">
      <button class="w-100 btn btn-primary btn-lg" type="submit">Update user data</button>
    </form>
    <hr class="my-4">
    <h4 class="mb-3">Change password</h4>
    <form class="needs-validation" @submit.prevent="submitChangePassword">
      <div class="row g-3">
        <div class="col-md-12">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" required v-model="password">
        </div>
        <div class="col-md-12">
          <label for="password_confirm" class="form-label">Password confirm</label>
          <input type="password" class="form-control" id="password_confirm" required v-model="passwordConfirm">
        </div>
      </div>

      <br class="my-4">

      <button class="w-100 btn btn-primary btn-lg" type="submit">Change password</button>
    </form>
  </div>
</template>

<script lang="ts">
import {defineComponent, ref, onMounted, computed} from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'
import User from '@/classes/User'
import {useStore} from 'vuex'


export default defineComponent({
  name: 'Profile',
  setup() {
    const user = ref({} as User)
    const firstName = ref('')
    const lastName = ref('')
    const password = ref('')
    const passwordConfirm = ref('')
    const router = useRouter()
    const store = useStore()

    onMounted(async () => {
      user.value = computed(() => store.state.User.user).value

      firstName.value = user.value.first_name
      lastName.value = user.value.last_name
    })

    const submitProfileData = async () => {
      const response = await axios.put('users/'+user.value.id+'/change-info', {
        first_name: firstName.value,
        last_name: lastName.value
      })

      await store.dispatch('User/setUser', response.data)

      await router.push('/profile')
    }

    const submitChangePassword = async () => {
      await axios.put('users/'+user.value.id+'/change-password', {
        password: password.value,
        password_confirm: passwordConfirm.value
      })

      await router.push('/profile')
    }

    return {
      firstName,
      lastName,
      password,
      passwordConfirm,
      submitProfileData,
      submitChangePassword,
    }
  }
});
</script>
