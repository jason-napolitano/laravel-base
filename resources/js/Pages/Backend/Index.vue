<template>
  <BackendLayout>
    <section class="row">
      <div class="col-12">
        <h1>{{ message }}</h1>
      </div>
    </section>
  </BackendLayout>
</template>

<script setup>
/* ---------------------------------------------
 * Dependency imports
 * -------------------------------------------- */
import { Inertia } from '@inertiajs/inertia'
import { computed } from 'vue'

/* ---------------------------------------------
 * Computed properties
 * -------------------------------------------- */
const message = computed(() => `Welcome, ${Inertia.page.props.auth.user.name}!`)
</script>
