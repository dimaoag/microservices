<template>
  <div class="users">
    <h2>Roles</h2>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
      <div class="btn-toolbar">
        <router-link to="/roles/create" class="btn btn-sm btn-outline-success">Add</router-link>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="role in roles" :key="role.id">
            <td>{{ role.id }}</td>
            <td>{{ role.name }}</td>
            <td>
              <div class="btn-group">
                <router-link :to="'/roles/' + role.id" class="btn btn-sm btn-outline-warning">Edit</router-link>
                <button class="btn btn-sm btn-outline-danger" @click="remove(role.id)">Remove</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted } from 'vue'
import axios from 'axios'
import Entity from '@/interfaces/Entity'
import Role from '@/classes/Role'

export default defineComponent({
  name: 'Roles',
  setup() {
    const roles = ref([] as Role[])

    const load = async () => {
      const response = await axios.get('roles')
      roles.value = response.data.data
    }

    onMounted(load)

    const remove = async (id: number) => {
      if (confirm('Are you sure?')) {
        await axios.delete(`roles/${id}`)

        roles.value = roles.value.filter((e: Entity) => e.id !== id)
      }
    }

    return {
      roles,
      remove
    }
  }
});
</script>
