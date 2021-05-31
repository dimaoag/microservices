<template>
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="#" class="nav-link active" aria-current="page">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
            Home
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            <b-icon-speedometer-2 />
            Dashboard
          </a>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'Sidebar'
});
</script>
