<template>
  <ElContainer>
    <ElHeader>
      <ElRow>
        <ElCol>
          <nav
            class="navbar navbar-expand-lg navbar-dark bg-marina bg-gradient fixed-top">
            <div class="container-fluid">
              <Link class="navbar-brand" :href="route('dashboard.index')">Brand Text</Link>
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
                    <Link class="nav-link" :href="route('dashboard.index')">
                      Home
                    </Link>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </ElCol>
      </ElRow>
    </ElHeader>
    <ElContainer>
      <ElAside v-if="largeScreen" class="bg-tin sidebar">
        <LogoutButton
          classes="logout-btn bg-pomegranate bg-gradient"
        >
          <icon :icon="faLock" />
        </LogoutButton>
      </ElAside>
      <ElMain>
        <ElRow>
          <ElCol>
            <slot />
          </ElCol>
        </ElRow>
      </ElMain>
    </ElContainer>
  </ElContainer>
</template>

<script setup>
/* ---------------------------------------------
 * Dependency imports
 * -------------------------------------------- */
import { breakpointsTailwind, useBreakpoints } from '@vueuse/core'
import { faLock } from '@fortawesome/free-solid-svg-icons'
import LogoutButton from '../Shared/Auth/Buttons/Logout'
import { Inertia } from '@inertiajs/inertia'
import { onMounted } from 'vue'
import {
  ElAside,
  ElNotification,
  ElContainer,
  ElHeader,
  ElMain,
  ElRow,
  ElCol,
} from 'element-plus'

/* ---------------------------------------------
 * Computed properties
 * -------------------------------------------- */
const breakpoints = useBreakpoints(breakpointsTailwind)
const largeScreen = breakpoints.greater('md')
/* ---------------------------------------------
 * Component mounting
 * -------------------------------------------- */
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

<style scoped>
.sidebar {
  height: calc(100vh - 5rem);
  margin-top: -0.25rem;
}
.logout-btn {
  text-align: right;
  border-radius: 0;
  position: fixed;
  padding: 0.5rem 0.75rem 0.25rem 0.25rem;
  color: #ffffff;
  width: inherit;
  bottom: 0;
  left: 0;
}
</style>
