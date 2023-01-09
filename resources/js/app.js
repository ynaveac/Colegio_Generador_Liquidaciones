require('./bootstrap');
   
window.Vue = require('vue');

import VueRouter from 'vue-router'

import swal from 'sweetalert'



Vue.use(VueRouter)

   
const routes = [
  // Inicio y Login ------------------------
  { path: '/', component: require('./components/Login.vue').default },
  { path: '/home', component: require('./components/Home.vue').default },
  { path: '/logout', component: require('./components/users/logout.vue').default },
  // mantenedores ------------------------
  { path: '/genero', component: require('./components/mantenedor/genero.vue').default },
  { path: '/cargo', component: require('./components/mantenedor/cargo.vue').default },
  { path: '/depto', component: require('./components/mantenedor/depto.vue').default },  
  { path: '/uf', component: require('./components/mantenedor/uf.vue').default },  
  { path: '/gratificacion', component: require('./components/mantenedor/gratificacion.vue').default }, 
  { path: '/impuesto_unico', component: require('./components/mantenedor/impuesto.vue').default }, 
  { path: '/afp', component: require('./components/mantenedor/afp.vue').default }, 
  { path: '/salud', component: require('./components/mantenedor/salud.vue').default }, 
  { path: '/plazocontrato', component: require('./components/mantenedor/plazocontrato.vue').default }, 
  { path: '/cajacomp', component: require('./components/mantenedor/cajacompensacion.vue').default },   
  { path: '/nacionalidad', component: require('./components/mantenedor/nacionalidad.vue').default },      
  { path: '/horarios', component: require('./components/mantenedor/horarios.vue').default },   
  { path: '/empresas', component: require('./components/empresas.vue').default },  
  { path: '/cesantia', component: require('./components/mantenedor/cesantia.vue').default },    
  { path: '/modopago', component: require('./components/mantenedor/modopago.vue').default },    
  { path: '/banco', component: require('./components/mantenedor/banco.vue').default },    
  { path: '/tipocuenta', component: require('./components/mantenedor/tipocuenta.vue').default },      
  { path: '/per_liq', component: require('./components/mantenedor/per_liq.vue').default },  
  { path: '/asistencia', component: require('./components/mantenedor/asistencia.vue').default },    
  { path: '/haberes', component: require('./components/mantenedor/haberes.vue').default },  
  { path: '/haberes_dinamicos', component: require('./components/mantenedor/haberes_dinamicos.vue').default },            
  //---------------------------------------
  // Fichas -------------------------------
  { path: '/empleados', component: require('./components/mantenedor/empleados.vue').default },
  { path: '/contrato', component: require('./components/mantenedor/contrato.vue').default }
]

const router = new VueRouter({
    mode: "history",
  routes 
})
  
const app = new Vue({
  router
}).$mount('#app')
