<template>
  <ElTooltip
    :class="classes"
    :effect="effect"
    :content="content"
    :placement="placement"
    :raw-content="html"
  >
    <slot></slot>
  </ElTooltip>
</template>

<script setup>
/* ---------------------------------------------
 * Dependency imports
 * -------------------------------------------- */
import { ElTooltip } from 'element-plus'

/* ---------------------------------------------
 * Component props
 * -------------------------------------------- */
defineProps({
  placement: {
    type: String,
    default: 'right',
    required: false,
    validator: (value) =>
      [
        'bottom-start',
        'right-start',
        'left-start',
        'bottom-end',
        'top-start',
        'right-end',
        'left-end',
        'top-end',
        'bottom',
        'right',
        'left',
        'top',
      ].includes(value),
  },
  classes: {
    type: String,
    default: 'box-item',
    required: false,
  },
  effect: {
    type: String,
    default: 'dark',
    required: false,
    validator: (value) => ['dark', 'light'].includes(value),
  },
  content: {
    type: String,
    required: true,
  },
  html: {
    type: Boolean,
    required: false,
  },
})
</script>

<style scoped></style>
