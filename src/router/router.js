import { createRouter, createWebHistory } from "vue-router";

import Main from '@/pages/Main'
import Login from '@/pages/Login'
import MyProfile from '@/pages/MyProfile'


const routes = [
  {
    path: '/',
    component: Main
  },
  {
    path: '/login',
    component: Login
  },
  {
    path: '/MyProfile',
    component: MyProfile,
  }
]

const router = createRouter({
  routes,
  history: createWebHistory()
})


export default router;