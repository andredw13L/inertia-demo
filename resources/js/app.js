import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import Layout from './Shared/Layout.vue'

createInertiaApp({
  resolve: async (name) => {
    
    const pages = import.meta.glob('./Pages/**/*.vue', {eager: false})

    let page = await pages[`./Pages/${name}.vue`]()

    page.default.layout = page.default.layout || Layout

    return page;
  },

  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Head", Head)
      .component("Link", Link)
      .mount(el)
  },
     progress: {
    // The delay after which the progress bar will appear, in milliseconds...
    delay: 250,

    // The color of the progress bar...
    color: '#29d',

    // Whether to include the default NProgress styles...
    includeCSS: true,

    // Whether the NProgress spinner will be shown...
    showSpinner: true,
  },

  title: title => `My App - ${title}`

})
