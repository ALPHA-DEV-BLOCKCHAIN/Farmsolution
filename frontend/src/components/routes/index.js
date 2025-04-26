import { createRouter, createWebHistory } from 'vue-router'

import Home from '../Home.vue'
import Authentication from '../Authentication.vue'
import Testimonial from '../Testimonial.vue'
import Service from '../Service.vue'
import Features from '../Features.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
  },
  {
    path: '/authentication',
    name: 'authentication',
    component: Authentication,
  },
  {
    path: '/service',
    name: 'service',
    component: Service,
  },
  {
    path: '/testimonial',
    name: 'testimonial',
    component: Testimonial,
  },
  {
    path: '/features',
    name: 'features',
    component: Features,
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes, 
});

export default router;
