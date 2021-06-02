import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import axios from 'axios'

// bootstrap 5
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import { BootstrapIconsPlugin } from 'bootstrap-icons-vue';

axios.defaults.baseURL = 'http://localhost:8071/api/'
axios.defaults.headers['Authorization'] = `Bearer ${localStorage.getItem('token')}`

createApp(App)
  .use(store)
  .use(router)
  .use(BootstrapIconsPlugin)
  .mount('#app')
