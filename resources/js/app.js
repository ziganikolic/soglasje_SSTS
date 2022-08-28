/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import ExampleComponent from "./components/ExampleComponent.vue";
import ContractComponent from "./components/ContractComponent.vue";
import HomeComponent from "./components/HomeComponent.vue";
import DashboardComponent from "./components/DashboardComponent.vue";
import UserInfoComponent from "./components/UserInfoComponent";


window.Vue = require('vue').default;

require('./bootstrap');

import { createApp } from 'vue';
// import hello from './components/ExampleComponent.vue';

let app=createApp({})
app.component('example-component' , ExampleComponent);
app.component('contract-component', ContractComponent);
app.component('home-component', HomeComponent);
app.component('dashboard-component', DashboardComponent);
app.component('user-info-component', UserInfoComponent),



app.mount("#app")

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
