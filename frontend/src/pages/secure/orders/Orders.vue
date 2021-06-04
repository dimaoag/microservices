<template>
  <div class="users">
    <h2>Orders</h2>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
      <div class="btn-toolbar">
        <button class="btn btn-sm btn-outline-success" @click="exportOrders">Export</button >
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Total</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="order in orders" :key="order.id">
            <td>{{ order.id }}</td>
            <td>{{ order.first_name +' '+ order.last_name }}</td>
            <td>{{ order.email }}</td>
            <td>{{ order.total }}</td>
            <td>
              <div class="btn-group">
                <router-link :to="'/orders/' + order.id" class="btn btn-sm btn-outline-primary">Show</router-link>
<!--                <button class="btn btn-sm btn-outline-danger" @click="remove(order.id)">Remove</button>-->
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
import Pagination from '@/pages/secure/components/Pagination.vue'
import Order from '@/classes/Order'

export default defineComponent({
  name: 'Orders',
  components: { Pagination },
  setup() {
    const orders = ref([] as Order[])
    const lastPage = ref(0)

    const load = async (page: number) => {
      const response = await axios.get(`orders?page=${page}`)
      orders.value = response.data.data
      lastPage.value = response.data.meta.last_page
    }

    onMounted(() => {
      load(lastPage.value)
    })

    const remove = async (id: number) => {
      if (confirm('Are you sure?')) {
        await axios.delete(`orders/${id}`)

        orders.value = orders.value.filter((e: Entity) => e.id !== id)
      }
    }

    const exportOrders = async () => {
      const response = await axios.get('orders/export', {responseType: 'blob'})
      const blob = new Blob([response.data], {type: 'text/csv'})
      const downloadLink = window.URL.createObjectURL(response.data)
      const link = document.createElement('a')
      link.href = downloadLink
      link.download = 'orders.csv'
      link.click()
    }

    return {
      orders,
      lastPage,
      remove,
      load,
      exportOrders,
    }
  }
});
</script>
