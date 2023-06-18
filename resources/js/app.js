import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue';
import App from './components/App.vue';
import Footer from "./components/Footer.vue";
import Navigation from "./components/Navigation.vue";
import Pagination from "./components/Pagination.vue";
import {store} from "./store/store.js";
import {router} from "./router/router.js";

const app = createApp(App);

app.component('Footer', Footer);
app.component('Navigation', Navigation);
app.component('Pagination', Pagination);

app.use(router);
app.use(store);

app.mount('#app')
