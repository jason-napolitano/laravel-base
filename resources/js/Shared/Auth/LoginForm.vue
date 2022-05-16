<template>
  <form @submit.prevent="formData.post(route('login.store'))">
    <div class="my-1">
      <ElInput
        v-model="formData.email"
        placeholder="Email"
        type="text"
        class="my-2"
      />
      <small class="text-pomegranate">
        {{ errors.email }}
      </small>
    </div>
    <div class="my-1">
      <ElInput
        v-model="formData.password"
        placeholder="Password"
        type="password"
        class="my-2"
        show-password
      />
      <small class="text-pomegranate">
        {{ errors.password }}
      </small>
    </div>

    <div class="my-1">
      <label for="remember">
        <ElCheckbox id="remember" v-model="formData.remember" />
        Remember me?
      </label>
    </div>

    <div class="my-1">
      <Button :form-data="formData" />
    </div>
  </form>
</template>

<script setup>
/* ---------------------------------------------
 * Dependency imports
 * -------------------------------------------- */
import { ElCheckbox, ElInput } from 'element-plus'
import { useForm } from '@inertiajs/inertia-vue3'
import Button from '../Common/Buttons/Submit'

/* ---------------------------------------------
 * Form data
 * -------------------------------------------- */
const formData = useForm({
  email: '',
  password: '',
  remember: false,
})

/* ---------------------------------------------
 * Component props
 * -------------------------------------------- */
defineProps({
  errors: Object,
})
</script>
