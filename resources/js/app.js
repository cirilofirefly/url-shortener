import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import UrlShortener from '@/pages/UrlShortener.vue'

const app = createApp(App);
app.component('url-shortener', UrlShortener);
app.mount('#app');