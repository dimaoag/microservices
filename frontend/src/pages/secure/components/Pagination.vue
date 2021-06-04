<template>
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
</template>

<script lang="ts">
import {defineComponent, ref} from 'vue';

export default defineComponent({
  name: 'Pagination',
  emits: ['page-changed'],
  props: {
    lastPage: Number
  },
  setup(props, { emit }) {
    const page = ref(1)

    const prev = async () => {
      if (page.value === 1) return;
      page.value--
      emit('page-changed', page.value)
    }

    const next = async () => {
      if (page.value === props.lastPage) return;
      page.value++
      emit('page-changed', page.value)
    }

    return {
      prev,
      next,
    }
  }
});
</script>
