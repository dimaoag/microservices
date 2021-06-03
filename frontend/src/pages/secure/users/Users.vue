<template>
  <div class="users">
    <h2>Users</h2>
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
                <button class="btn btn-sm btn-outline-warning">Edit</button>
                <button class="btn btn-sm btn-outline-danger" @click="remove(user.id)">Remove</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <nav>
      <ul class="pagination">
        <li class="page-item">
          <a href="javascript:void(0)" class="page-link" @click="prev">Prev</a>
        </li>
        <li class="page-item">
          <a href="javascript:void(0)" class="page-link" @click="next">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted } from 'vue'
import axios from 'axios'

export default defineComponent({
  name: 'Users',
  setup() {
    const users = ref([])
    const page = ref(1)
    const lastPage = ref(0)

    const load = async () => {
      const response = await axios.get(`users?page=${page.value}`)
      users.value = response.data.data
      lastPage.value = response.data.meta.last_page
    }

    onMounted(load)

    const prev = async () => {
      if (page.value === 1) return;
      page.value--
      await load()
    }

    const next = async () => {
      if (page.value === lastPage.value) return;
      page.value++
      await load()
    }

    const remove = async (id: number) => {
      if (confirm('Are you sure?')) {
        await axios.delete(`users/${id}`)

        users.value = users.value.filter((u: {id: number}) => u.id !== id)
      }
    }

    return {
      users,
      prev,
      next,
      remove
    }
  }
});
</script>
