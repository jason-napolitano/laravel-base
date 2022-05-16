/* Dependency imports */
import createPersistedState from 'vuex-persistedstate'
import { createStore } from 'vuex'

/* store instance */
const store = createStore({
  // ==========================================================================
  // PLUGINS
  plugins: [
    createPersistedState({
      /* How do we want to handle our storage? */
      storage: {
        /* We're going to use native sessionStorage() */
        setItem: (key, value) => sessionStorage.setItem(key, value),
        getItem: (key) => sessionStorage.getItem(key),
        removeItem: (key) => sessionStorage.removeItem(key),
      },
    }),
  ],
  // ==========================================================================
  // STATE
  state: {
    // ...
  },
  // ==========================================================================
  // ACTIONS
  actions: {
    // ...
  },
  // ==========================================================================
  // MUTATIONS
  mutations: {
    // ...
  },
  // ==========================================================================
  // GETTERS
  getters: {
    // ...
  },
})

export default store
