<template>
  <div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Update user</h4>
    <form class="needs-validation" @submit.prevent="submit">
      <div class="row g-3">

        <div class="col-md-12">
          <label for="firstName" class="form-label">First name</label>
          <input type="text" class="form-control" id="firstName" required v-model="firstName">
        </div>

        <div class="col-md-12">
          <label for="lastName" class="form-label">Last name</label>
          <input type="text" class="form-control" id="lastName" required v-model="lastName">
        </div>

        <div class="col-md-12">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" placeholder="you@example.com" required v-model="email">
        </div>

        <div class="col-md-12">
          <label for="role" class="form-label">Role</label>
          <select class="form-select" id="role" required v-model="role">
            <option value="">Choose...</option>
            <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.name }}</option>
          </select>
        </div>
      </div>

      <br class="my-4">

      <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>
    </form>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted } from 'vue'
import axios from 'axios'
import { useRouter, useRoute } from 'vue-router'
import User from '@/classes/User'

export default defineComponent({
  name: 'UpdateUser',
  setup() {
    const firstName = ref('')
    const lastName = ref('')
    const email = ref('')
    const role = ref(0)
    const roles = ref([])
    const router = useRouter()
    const { params } = useRoute()

    onMounted(async () => {
      const response = await axios.get('roles')
      roles.value = response.data.data

      const fetchUser = await axios.get(`users/${params.id}`)
      const user: User = fetchUser.data.data

      firstName.value = user.first_name
      lastName.value = user.last_name
      email.value = user.email
      role.value = user.role.id
    })

    const submit = async () => {
      await axios.put(`users/${params.id}`, {
        first_name: firstName.value,
        last_name: lastName.value,
        email: email.value,
        role_id: role.value,
      })

      await router.push('/users')
    }

    return {
      firstName,
      lastName,
      email,
      role,
      roles,
      submit
    }
  }
});
</script>
