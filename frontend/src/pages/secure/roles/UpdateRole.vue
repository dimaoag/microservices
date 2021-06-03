<template>
  <div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Update role</h4>
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

      <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>
    </form>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted } from 'vue'
import axios from 'axios'
import {useRoute, useRouter} from 'vue-router'
import Role from '@/classes/Role'
import Entity from '@/interfaces/Entity'


export default defineComponent({
  name: 'UpdateRole',
  setup() {
    const name = ref('')
    const selectedPermissions = ref([] as number[])
    const permissions = ref([])
    const router = useRouter()
    const { params } = useRoute()

    onMounted(async () => {
      const permissionsResponse = await axios.get('permissions')
      permissions.value = permissionsResponse.data.data

      const roleResponse = await axios.get('roles/'+params.id)
      const role: Role = roleResponse.data.data

      name.value = role.name
      selectedPermissions.value = role.permissions.map((p: Entity) => p.id)
    })

    const submit = async () => {
      await axios.put('roles/'+params.id, {
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
