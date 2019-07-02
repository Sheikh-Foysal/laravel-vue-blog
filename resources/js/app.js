

require('./bootstrap');
window.Vue = require('vue');





// Vuex Support
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"
const store = new Vuex.Store(
    storeData
  )




// Vue Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes';





//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);




// V-form
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)




// Sweet alert
import swal from 'sweetalert2'
window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
window.toast = toast;




const router = new VueRouter({
    routes,
    mode: 'hash'
})




const app = new Vue({
    el: '#app',
    router,
    store,
});


