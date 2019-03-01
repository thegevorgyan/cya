
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
//or window.Vue = Vue;

import Vue from 'vue'
import Vuetify from 'vuetify'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import router from './routes'

//import axios from 'axios'
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(Vuetify)
Vue.use(VueRouter)
Vue.use(VueResource)

Vue.config.productionTip = false;

Vue.component('home', require('./components/Home.vue'));
Vue.component('websiteadd', require('./components/WebsiteAdd.vue'));
Vue.component('websiteedit', require('./components/WebsiteEdit.vue'));
Vue.component('popupview', require('./components/subcomponents/PopupView.vue'));
Vue.component('toolbar', require('./components/subcomponents/Toolbar.vue'));
Vue.component('stat', require('./components/AdminStat.vue'));
Vue.component('stor', require('./components/AdminStor.vue'));
Vue.component('cache', require('./components/AdminCache.vue'));

Vue.filter('lowercase', function (value) {
	return value.toLowerCase()
})

const app = new Vue({
    el: '#app',
    router,
   // template: '<router-view></router-view>'
});