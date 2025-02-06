import {createApp} from 'vue';
import {createPinia} from 'pinia';
import piniaPersist from 'pinia-plugin-persist'
import router from './router';
import axios from 'axios';
import App from './App.vue';

const app = createApp(App);

window.axios = axios;
const pinia = createPinia();
pinia.use(piniaPersist);

app.use(router);
app.use(pinia);

app.mount('#app');
