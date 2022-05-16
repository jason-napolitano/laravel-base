/* Dependency imports */
import { usePage } from '@inertiajs/inertia-vue3'

/**
 *
 * @param {string} value
 * @param {boolean} isRole
 *
 * @returns {boolean}
 */
export const can = (value, isRole = true) =>
  isRole === true
    ? usePage().props.value.auth.roles.some((role) => role.name === value)
    : usePage().props.value.auth.permissions.some(
        (permission) => permission.name === value
      )
