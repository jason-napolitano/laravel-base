/* -----------------------------------------------------------------------------
 * Inertia & Vue
 * -------------------------------------------------------------------------- */
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { createApp, h } from 'vue'
import store from './Utils/store'

/* -----------------------------------------------------------------------------
 * Layouts
 * -------------------------------------------------------------------------- */
import Authentication from './Layouts/Authentication'
import FrontendLayout from './Layouts/FrontendLayout'
import BackendLayout from './Layouts/BackendLayout'

/* -----------------------------------------------------------------------------
 * Global components
 * -------------------------------------------------------------------------- */
import Pagination from './Shared/Dashboard/Pagination'
import Heading from './Shared/Dashboard/Heading'
import Tooltip from './Shared/Common/Tooltip'

/* -----------------------------------------------------------------------------
 * Icon Library
 * -------------------------------------------------------------------------- */
import { FontAwesomeIcon as Icon } from '@fortawesome/vue-fontawesome'

/* -----------------------------------------------------------------------------
 * UI & UX
 * -------------------------------------------------------------------------- */
import 'bootstrap/dist/js/bootstrap.bundle'

/* -----------------------------------------------------------------------------
 * App instance
 * -------------------------------------------------------------------------- */
createInertiaApp({
  resolve: (name) => require(`./Pages/${name}`),
  title: (title) => `${process.env.MIX_APP_TITLE} - ${title}`,
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      // Layouts ------------------------------------
      .component('FrontendLayout', FrontendLayout)
      .component('BackendLayout', BackendLayout)
      .component('AuthLayout', Authentication)
      // Components -------------------------------
      .component('Pagination', Pagination)
      .component('Heading', Heading)
      .component('Tooltip', Tooltip)
      .component('Icon', Icon)
      .component('Link', Link)
      .component('Head', Head)
      // Plugins ------------------------------------
      .use(plugin)
      .use(store)
      // Routing ------------------------------------
      .mixin({
        methods: { route },
      })
      // Mount --------------------------------------
      .mount(el)
  },
})

/* -----------------------------------------------------------------------------
 * Progress Bar
 * NOTE: For Progress bar styling, go to resources/sass/_progress.scss
 * -------------------------------------------------------------------------- */
InertiaProgress.init({
  // The delay after which the progress bar will
  // appear during navigation, in milliseconds.
  delay: 50,

  // Whether to include the default NProgress styles.
  includeCSS: false,

  // Whether the NProgress spinner will be shown.
  showSpinner: false,
})
