<template>
  <Link :class="classes" :href="route('logout')" method="post">
    <slot>Logout</slot>
  </Link>
</template>

<script setup>
/* ---------------------------------------------
 * Component props
 * -------------------------------------------- */
defineProps({
  classes: String,
})
</script>
