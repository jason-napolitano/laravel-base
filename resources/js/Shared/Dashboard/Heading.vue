<template>
  <section class="row">
    <div class="col">
      <h1 class="lead"><icon :icon="icon" /> {{ text }}</h1>
    </div>
    <div class="col" v-if="showButton">
      <div class="text-right">
        <Link
          v-if="buttonPermission ?? true"
          :class="`el-button el-button--${buttonType}`"
          :href="route(to)"
        >
          <icon v-if="iconPosition === 'left'" :icon="buttonIcon" size="sm" />
          <span :class="`${iconPosition === 'left' ? 'ml-2' : 'mr-2'}`">
            {{ buttonText }}
          </span>
          <icon v-if="iconPosition === 'right'" :icon="buttonIcon" size="sm" />
        </Link>
      </div>
    </div>
  </section>
  <section class="row">
    <div class="col">
      <div class="border-top-1 border-tin"></div>
    </div>
  </section>
</template>

<script setup>
/* ---------------------------------------------
 * Component props
 * -------------------------------------------- */
defineProps({
  to: {
    type: String,
    default: 'dashboard.index',
  },
  buttonIcon: {
    type: String,
    default: '',
  },
  buttonType: {
    type: String,
    default: '',
  },
  buttonPermission: {
    type: Boolean,
    default: true,
  },
  buttonText: String,
  showButton: {
    type: Boolean,
    default: true,
  },
  icon: {
    type: String,
    default: '',
  },
  iconPosition: {
    type: String,
    default: 'left',
  },
  text: {
    type: String,
    default: '',
  },
})
</script>

<style scoped></style>
