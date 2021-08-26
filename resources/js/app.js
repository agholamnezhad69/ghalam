import Vue from 'vue'
window.Vue = require('vue').default;

/**********************start router */


import VueRouter from 'vue-router'

Vue.use(VueRouter)


let routes = [
    { path: '/branch', component: require('./components/admin/branch.vue').default },
    { path: '/dashboard', component: require('./components/admin/dashboard.vue').default },
    { path: '/user', component: require('./components/admin/user.vue').default },
    { path: '/base', component: require('./components/admin/base.vue').default },
    { path: '/lesson', component: require('./components/admin/lesson.vue').default },
    { path: '/teacher', component: require('./components/admin/teacher.vue').default },
    { path: '/major', component: require('./components/admin/major.vue').default },
    { path: '/amozeshghah_branch', component: require('./components/amozeshghah/branch.vue').default },
    { path: '/amozeshghah_user', component: require('./components/amozeshghah/user.vue').default },

]


const router = new VueRouter({
    routes // short for `routes: routes`
})




/**********************end router */

require('./bootstrap');


import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(faUserSecret)

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false



const app = new Vue({
    el: '#app',
    router,

});
