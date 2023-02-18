require('./bootstrap');
//require('./livewire');

import Vue from 'vue'
import VueToastify from 'vue-toastify'

Vue.use(VueToastify) 

Vue.component('posts-component', require('./components/posts/Posts.vue').default)

const app = new Vue({
    el: '#app',
})

