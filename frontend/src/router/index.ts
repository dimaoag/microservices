import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Register from '@/pages/public/auth/Register.vue'
import Login from '@/pages/public/auth/Login.vue'
import Dashboard from '@/pages/secure/dashboard/Dashboard.vue'
import Secure from '@/pages/secure/Secure.vue'
import Users from '@/pages/secure/users/Users.vue'
import CreateUser from '@/pages/secure/users/CreateUser.vue'
import UpdateUser from '@/pages/secure/users/UpdateUser.vue'

const routes: Array<RouteRecordRaw> = [
  { path: '/register', component: Register },
  { path: '/login', component: Login},
  {
    path: '',
    component: Secure,
    children: [
      { path: '', redirect: '/dashboard' },
      { path: '/dashboard', component: Dashboard },
      { path: '/users', component: Users },
      { path: '/users/create', component: CreateUser },
      { path: '/users/:id', component: UpdateUser }
    ]
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
