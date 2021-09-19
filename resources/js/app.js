
require('./bootstrap');

window.Vue = require('vue');

Vue.component('todos-list', require('./components/TodoListComponent.vue').default);
Vue.component('chat-form', require('./components/ChatFormComponent.vue').default);
Vue.component('chat-component', require('./components/ChatComponent.vue').default);

const app = new Vue({
    el: '#app',
});
