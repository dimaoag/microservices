<template>
  <div class="users">
    <h2>Users</h2>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
      <div class="btn-toolbar">
        <router-link to="/users/create" class="btn btn-sm btn-outline-success">Add</router-link>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.id }}</td>
            <td>{{ user.first_name + ' ' + user.last_name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.role.name }}</td>
            <td>
              <div class="btn-group">
                <router-link :to="'/users/' + user.id" class="btn btn-sm btn-outline-warning">Edit</router-link>
                <button class="btn btn-sm btn-outline-danger" @click="remove(user.id)">Remove</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <Pagination :last-page="lastPage" @page-changed="load($event)"/>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted } from 'vue'
import axios from 'axios'
import Entity from '@/interfaces/Entity'
import Pagination from "@/pages/secure/components/Pagination.vue";
import User from '@/classes/User'

export default defineComponent({
  name: 'Users',
  components: { Pagination },
  setup() {
    const users = ref([] as User[])
    const lastPage = ref(0)

    const load = async (page: number) => {
      const response = await axios.get(`users?page=${page}`)
      users.value = response.data.data
      lastPage.value = response.data.meta.last_page
    }

    onMounted(() => {
      load(lastPage.value)
    })

    const remove = async (id: number) => {
      if (confirm('Are you sure?')) {
        await axios.delete(`users/${id}`)

        users.value = users.value.filter((e: Entity) => e.id !== id)
      }
    }

    return {
      users,
      lastPage,
      remove,
      load
    }
  }
});
</script>
