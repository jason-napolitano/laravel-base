<template>
  <table class="table table-borderless table-sm">
    <tr v-for="item of [1, 2, 3, 4, 5, 6]">
      <td class="w-2rem">
        <ElSkeleton :count="1">
          <template #template>
            <ElSkeletonItem variant="text" />
          </template>
        </ElSkeleton>
      </td>
      <td v-for="item of [1, 2, 3, 4]">
        <ElSkeleton>
          <template #template>
            <ElSkeletonItem variant="text" />
          </template>
        </ElSkeleton>
      </td>
    </tr>
  </table>
</template>

<script setup>
/* ---------------------------------------------
 * Dependency imports
 * -------------------------------------------- */
import { ElSkeleton, ElSkeletonItem } from 'element-plus'
</script>
