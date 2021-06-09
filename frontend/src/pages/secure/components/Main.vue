<template>
  <main>
    <div class="container-fluid">
      <router-view v-if="user"></router-view>
    </div>
  </main>
</template>

<script lang="ts">
import {computed, defineComponent} from 'vue';
import {useStore} from "vuex";

export default defineComponent({
  name: 'Main',
  setup() {
    const store = useStore()
    const user = computed(() => store.state.User.user)

    return {
      user
    }
  }
});
</script>
