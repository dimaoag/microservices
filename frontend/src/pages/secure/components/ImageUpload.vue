<template>
  <label class="btn btn-primary">
    Upload
    <input type="file" hidden @change="changeFile($event.target.files)">
  </label>
</template>

<script lang="ts">
import {defineComponent} from 'vue';
import axios from 'axios'

export default defineComponent({
  name: 'ImageUpload',
  emits: ['file-uploaded'],
  props: {
    lastPage: Number
  },
  setup(_, { emit }) {
    const changeFile = async (files: FileList) => {
      const file: any = files.item(0)
      const data = new FormData
      data.append('file', file)
      const response = await axios.post('upload', data)
      emit('file-uploaded', response.data.url)
    }

    return {
      changeFile
    }
  }
});
</script>
