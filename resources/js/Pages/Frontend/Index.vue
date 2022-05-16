<template>
  <FrontendLayout>
    <section class="row">
      <div class="col-12">
        <h1>{{ message }}</h1>
      </div>
    </section>
  </FrontendLayout>
</template>

<script setup>
/* ---------------------------------------------
 * Dependency imports
 * -------------------------------------------- */
import { computed } from 'vue'

/* ---------------------------------------------
 * Computed properties
 * -------------------------------------------- */
const message = computed(() => `Welcome, guest!`)
</script>
