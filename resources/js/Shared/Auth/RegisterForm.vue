<template>
  <form @submit.prevent="formData.post(route('register.store'))">
    <div class="my-1">
      <ElInput
        v-model="formData.name"
        placeholder="Name"
        type="text"
        class="my-2"
      />
      <div class="text-pomegranate">
        {{ errors.name }}
      </div>
    </div>
    <div class="my-1">
      <ElInput
        v-model="formData.email"
        placeholder="Email Address"
        type="text"
        class="my-2"
      />
      <div class="text-pomegranate">
        {{ errors.email }}
      </div>
    </div>
    <div class="my-1">
      <ElInput
        v-model="formData.password"
        placeholder="Client Password"
        type="password"
        class="my-2"
        show-password
      />
      <div class="text-pomegranate">
        {{ errors.password }}
      </div>
    </div>
    <div class="my-1">
      <ElInput
        v-model="formData.password_confirmation"
        placeholder="Confirm Password"
        type="password"
        class="my-2"
        show-password
      />
      <div class="text-pomegranate">
        {{ errors.password_confirmation }}
      </div>
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
import { useForm } from '@inertiajs/inertia-vue3'
import Button from '../Common/Buttons/Submit'
import { ElInput } from 'element-plus'

/* ---------------------------------------------
 * Form data
 * -------------------------------------------- */
const formData = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  address: '',
  phone: '',
  insurance_provider: '',
})

/* ---------------------------------------------
 * Component props
 * -------------------------------------------- */
defineProps({
  errors: Object,
})
</script>
