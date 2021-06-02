import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Register from '@/pages/public/auth/Register.vue'
import Login from '@/pages/public/auth/Login.vue'
import Dashboard from '@/pages/secure/dashboard/Dashboard.vue'
import Secure from '@/pages/secure/Secure.vue'

const routes: Array<RouteRecordRaw> = [
  { path: '/register', component: Register },
  { path: '/login', component: Login},
  {
    path: '/',
    component: Secure,
    children: [
      { path: '', component: Dashboard }
    ]
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
