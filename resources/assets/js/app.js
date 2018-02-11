
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex'
Vue.use('Vuex')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vuex config

const store = new Vuex.Store({
    state: {
        item: {}
    },
    mutations: {
        setItem(state, obj){
            state.item = obj
        }
    }
})

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('header-main', require('./components/Header.vue'));
Vue.component('panel', require('./components/Panel.vue'));
Vue.component('box', require('./components/Box.vue'));
Vue.component('page', require('./components/Page.vue'));
Vue.component('list-table', require('./components/ListTable.vue'));
Vue.component('bread-crumb', require('./components/BreadCrumb.vue'));
Vue.component('modal', require('./components/modals/Modal.vue'));
Vue.component('modal-link', require('./components/modals/ModalLink.vue'));
Vue.component('form-template', require('./components/form/FormTemplate.vue'));

const app = new Vue({
    el: '#app',
    store,
    mounted () {
        document.getElementById('app').style.display = "block"
    }
});
