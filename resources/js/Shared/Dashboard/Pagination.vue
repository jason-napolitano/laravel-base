<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1">
      <template v-for="(link, k) in links" :key="k">
        <div
          v-if="link.url === null"
          class="no-underline mr-1 mb-1 px-2 py-1 text-sm text-charcoal border rounded"
          v-html="link.label"
        />
        <Link
          v-else
          class="no-underline mr-1 mb-1 px-2 py-1 text-sm text-charcoal border rounded"
          :class="{ 'bg-marina text-white': link.active }"
          :href="link.url"
          v-html="link.label"
        />
      </template>
    </div>
  </div>
</template>

<script setup>
/* ---------------------------------------------
 * Component props
 * -------------------------------------------- */
defineProps({
  links: Array,
})
</script>
