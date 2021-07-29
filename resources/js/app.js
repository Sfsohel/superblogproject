/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import Vuex from 'vuex'

Vue.use(Vuex)

import storeData from './store/index'

const store = new Vuex.Store(
    storeData
)

import {filter} from './filter'

import VueRouter from 'vue-router'

import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form=Form

import swal from 'sweetalert2'
window.swal = swal;

import 'v-markdown-editor/dist/v-markdown-editor.css';

import Editor from 'v-markdown-editor'

// global register
Vue.use(Editor);

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.toast = toast;


Vue.use(VueRouter)

import { routes } from './routes';


const router = new VueRouter({
    routes, // short for `routes: routes`
   // mode:'history'
})

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);
Vue.component('home-main', require('./components/public/PublicMaster.vue').default);


const app = new Vue({
    el: '#app',
    router,
    store
});
