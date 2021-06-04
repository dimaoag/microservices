<template>
  <div class="col-md-12">
    <h4 class="mb-3">Order #{{ order.id }}</h4>
    <hr class="my-4">
    <h2>Items</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Price</th>
          <th>Quantity</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in order.items" :key="item.id">
          <td>{{ item.id }}</td>
          <td>{{ item.title }}</td>
          <td>{{ item.price }}</td>
          <td>{{ item.quantity }}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script lang="ts">
import {defineComponent, onMounted, ref} from 'vue'
import axios from 'axios'
import {useRoute} from 'vue-router'
import Order from '@/classes/Order'


export default defineComponent({
  name: 'Order',
  setup() {
    const order = ref({} as Order)
    const { params } = useRoute()

    onMounted(async () => {
      const response = await axios.get('orders/'+params.id)
      order.value = response.data.data
    })

    return {
      order
    }
  }
});
</script>
