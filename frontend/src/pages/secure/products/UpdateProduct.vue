<template>
  <div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Update Product</h4>
    <form class="needs-validation" @submit.prevent="submit">
      <div class="row g-3">

        <div class="col-md-12">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" required v-model="title">
        </div>

        <div class="col-md-12">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" rows="3" required v-model="description"></textarea>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" v-model="image">
            <ImageUpload @file-uploaded="image = $event"/>
          </div>
        </div>

        <div class="col-md-12">
          <label for="price" class="form-label">Price</label>
          <input type="number" class="form-control" id="price" required v-model="price">
        </div>

      </div>

      <br class="my-4">

      <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>
    </form>
  </div>
</template>

<script lang="ts">
import {defineComponent, onMounted, ref} from 'vue'
import axios from 'axios'
import {useRoute, useRouter} from 'vue-router'
import ImageUpload from '@/pages/secure/components/ImageUpload.vue'
import Product from '@/classes/Product'


export default defineComponent({
  name: 'UpdateProduct',
  components: {ImageUpload},
  setup() {
    const title = ref('')
    const description = ref('')
    const image = ref('')
    const price = ref(0)
    const router = useRouter()
    const { params } = useRoute()

    onMounted(async () => {
      const response = await axios.get('products/'+params.id)
      const product: Product = response.data.data

      title.value = product.title
      description.value = product.description
      image.value = product.image
      price.value = product.price
    })

    const submit = async () => {
      await axios.post('products', {
        title: title.value,
        description: description.value,
        image: image.value,
        price: price.value,
      })

      await router.push('/products')
    }

    return {
      title,
      description,
      image,
      price,
      submit,
    }
  }
});
</script>
