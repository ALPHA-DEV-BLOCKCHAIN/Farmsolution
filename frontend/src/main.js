
import { createApp } from 'vue'
import App from './App.vue'

// Import Vuetify
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import './components/plugins'

// Import Router
import router from './components/routes/index' // Ensure this is correctly pointing to your router file

// Create Vuetify Instance
const vuetify = createVuetify({
    components,
    directives,
})

// Create App Instance
createApp(App)
    .use(vuetify)
    .use(router)
    .mount('#app')
