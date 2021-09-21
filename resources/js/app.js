/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// create SPA application Vue 3 + Vue Router

import { createApp } from 'vue';
import { createWebHistory, createRouter } from 'vue-router';
import routes from './routes';

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = createRouter({
    history: createWebHistory(), // 4. Provide the history implementation to use.
    routes, // short for `routes: routes`
});

// import App.vue root component
import App from './views/App';

// 5. Create and mount the root instance.
const app = createApp(App);

// Make sure to _use_ the router instance to make the
// whole app router-aware.
app.use(router);

// mount the app to the DOM
app.mount('#app');
