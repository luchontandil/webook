window.Vue = require('vue');
import Vue from 'vue';
import Bootstrap from 'bootstrap';
import BootstrapVue from 'bootstrap-vue';

import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap-vue/dist/bootstrap-vue.css"

Vue.use(BootstrapVue)

Vue.component('feed-component', require('./components/FeedComponent.vue').default);
Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);
Vue.component('searchbar-component', require('./components/SearchbarComponent.vue').default);
Vue.component('search-page-component', require('./components/SearchPageComponent.vue').default);
Vue.component('search-item-component', require('./components/SearchPageItemComponent.vue').default);

Vue.component('main-avatar', require('./components/MainAvatarComponent.vue').default);


const app = new Vue({
  el: '#app'
});
