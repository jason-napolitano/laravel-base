<template>
  <Head title="Member Registration" />
  <AuthLayout>
    <RegisterForm :errors="errors" />
    <Link class="no-underline" :href="route('login.index')"
      >Access your account</Link
    >
  </AuthLayout>
</template>

<script setup>
/* ---------------------------------------------
 * Dependency imports
 * -------------------------------------------- */
import RegisterForm from '../../Shared/Auth/RegisterForm'

/* ---------------------------------------------
 * Component props
 * -------------------------------------------- */
defineProps({
  errors: Object,
})
</script>
