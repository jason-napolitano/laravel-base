<template>
  <ElContainer>
    <ElHeader>
      <ElRow>
        <ElCol>
          <nav
            class="navbar navbar-expand-lg navbar-dark bg-marina bg-gradient fixed-top"
          >
            <div class="container-fluid">
              <Link class="navbar-brand" :href="route('frontend.index')">Brand Text</Link>
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <Link
                      class="nav-link active"
                      aria-current="page"
                      :href="route('login.index')"
                      >Authenticate</Link
                    >
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </ElCol>
      </ElRow>
    </ElHeader>
    <ElMain>
      <ElRow>
        <ElCol>
          <slot></slot>
        </ElCol>
      </ElRow>
    </ElMain>
  </ElContainer>
</template>

<script setup>
/* ---------------------------------------------
 * Component mounting
 * -------------------------------------------- */
import { Inertia } from '@inertiajs/inertia'
import { onMounted } from 'vue'
import {
  ElNotification,
  ElContainer,
  ElHeader,
  ElMain,
  ElRow,
  ElCol,
} from 'element-plus'

onMounted(() => {
  if (Inertia.page.props.flash.message) {
    ElNotification({
      message: Inertia.page.props.flash.message ?? 'Action Completed',
      type: Inertia.page.props.flash.context ?? 'info',
      // position: 'bottom-right',
      showClose: false,
      duration: 2000,
    })
  }
})
</script>
