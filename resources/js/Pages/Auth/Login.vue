<template>
  <Head title="Member Login" />
  <AuthLayout>
    <LoginForm :errors="errors" />
    <Link class="no-underline" :href="route('register.index')"
      >Create free account</Link
    >
  </AuthLayout>
</template>

<script setup>
/* ---------------------------------------------
 * Dependency imports
 * -------------------------------------------- */
import LoginForm from '../../Shared/Auth/LoginForm'
import FrontendLayout from '../../Layouts/FrontendLayout'

/* ---------------------------------------------
 * Component props
 * -------------------------------------------- */
defineProps({
  errors: Object,
})
</script>
