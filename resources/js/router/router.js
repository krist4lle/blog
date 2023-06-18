import { createRouter, createWebHistory } from 'vue-router'
import Index from "../components/Post/Index.vue";
import Form from "../components/Post/Form.vue";
import View from "../components/Post/View.vue";
import Welcome from "../components/Welcome.vue";


const routes = [
    {
        name: 'posts-index',
        path: '/posts',
        component: Index
    },
    {
        name: 'posts-view',
        path: '/posts/:id',
        component: View
    },
    {
        name: 'posts-create',
        path: '/posts/create',
        component: Form
    },
    {
        name: 'posts-update',
        path: '/posts/:id/update',
        component: Form
    },
    {
        name: 'welcome',
        path: '/',
        component: Welcome
    }
];

export const router = createRouter({
    history: createWebHistory(),
    routes: routes
});
