<template>
  <div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Create role</h4>
    <form class="needs-validation" @submit.prevent="submit">
      <div class="row g-3">

        <div class="col-md-12">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" required v-model="name">
        </div>

        <div class="col-md-12">
          <span class="form-label">Permissions</span>
          <br class="my-4">
          <div class="form-check" v-for="permission in permissions" :key="permission.id">
            <input
              :id="'permission_'+permission.id"
              name="permissions"
              type="checkbox"
              class="form-check-input"
              v-model="selectedPermissions"
              :value="permission.id"
            >
            <label class="form-check-label" :for="'permission_'+permission.id">{{ permission.name }}</label>
          </div>
        </div>
      </div>

      <br class="my-4">

      <button class="w-100 btn btn-primary btn-lg" type="submit">Create</button>
    </form>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'


export default defineComponent({
  name: 'CreateRole',
  setup() {
    const name = ref('')
    const selectedPermissions = ref([])
    const permissions = ref([])
    const router = useRouter()

    onMounted(async () => {
      const response = await axios.get('permissions')
      permissions.value = response.data.data
    })

    const submit = async () => {
      await axios.post('roles', {
        name: name.value,
        permissions: selectedPermissions.value
      })

      await router.push('/roles')
    }

    return {
      name,
      selectedPermissions,
      permissions,
      submit
    }
  }
});
</script>
