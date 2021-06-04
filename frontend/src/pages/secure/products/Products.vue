<template>
  <div class="users">
    <h2>Products</h2>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
      <div class="btn-toolbar">
        <router-link to="/products/create" class="btn btn-sm btn-outline-success">Add</router-link>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Title</th>
            <th>Price</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products" :key="product.id">
            <td>{{ product.id }}</td>
            <td><img :src="product.image" width="50"></td>
            <td>{{ product.title }}</td>
            <td>{{ product.price }}</td>
            <td>
              <div class="btn-group">
                <router-link :to="'/products/' + product.id" class="btn btn-sm btn-outline-warning">Edit</router-link>
                <button class="btn btn-sm btn-outline-danger" @click="remove(product.id)">Remove</button>
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
import Product from '@/classes/Product'
import Pagination from "@/pages/secure/components/Pagination.vue";

export default defineComponent({
  name: 'Products',
  components: { Pagination },
  setup() {
    const products = ref([] as Product[])
    const lastPage = ref(0)

    const load = async (page: number) => {
      const response = await axios.get(`products?page=${page}`)
      products.value = response.data.data
      lastPage.value = response.data.meta.last_page
    }

    onMounted(() => {
      load(lastPage.value)
    })

    const remove = async (id: number) => {
      if (confirm('Are you sure?')) {
        await axios.delete(`products/${id}`)

        products.value = products.value.filter((e: Entity) => e.id !== id)
      }
    }

    return {
      products,
      lastPage,
      remove,
      load
    }
  }
});
</script>
