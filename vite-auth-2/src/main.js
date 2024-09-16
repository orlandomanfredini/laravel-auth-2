import { createApp } from 'vue'
import './style.css'
import { createRouter, createWebHistory } from 'vue-router'
import App from './App.vue'
import AppHome from './components/AppHome.vue'
import AppBlog from './components/AppBlog.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {path: '/', component: AppHome},
        {path: '/blog', component: AppBlog}
    ]
})

createApp(App).use(router).mount('#app')
