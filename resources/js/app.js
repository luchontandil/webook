window.Vue = require('vue');
import Vue from 'vue';
import Bootstrap from 'bootstrap';
import BootstrapVue from 'bootstrap-vue';
window.axios = require('axios');

Vue.prototype.$http = window.axios;

import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap-vue/dist/bootstrap-vue.css"
import "./components/CommentFormCss.css"

Vue.use(BootstrapVue)

Vue.component('feed-component', require('./components/FeedComponent.vue').default);
Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);
Vue.component('searchbar-component', require('./components/SearchbarComponent.vue').default);
Vue.component('search-page-component', require('./components/SearchPageComponent.vue').default);
Vue.component('search-item-component', require('./components/SearchPageItemComponent.vue').default);

Vue.component('post-form', require('./components/PostFormComponent.vue').default);
Vue.component('post', require('./components/PostComponent.vue').default);
Vue.component('coment-form', require('./components/ComentFormComponent.vue').default);

Vue.component('main-avatar', require('./components/MainAvatarComponent.vue').default);
Vue.component('followers', require('./components/FollowersComponent.vue').default);
Vue.component('follower', require('./components/FollowersAvatarItemComponent.vue').default);
Vue.component('followingItem', require('./components/FollowingAvatarItemComponent.vue').default);
Vue.component('following', require('./components/FollowingComponent.vue').default);

const app = new Vue({
  el: '#app'
});
