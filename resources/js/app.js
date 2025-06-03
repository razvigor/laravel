require('./bootstrap');

window.Vue = require('vue');
//import Vue from 'vue'


//Vue.component('radnici-vue', require('./components/radnici_vue.vue').default);
//Vue.component('proizvodi-vue', require('./components/proizvodi_vue.vue').default);
//Vue.component('proizvrstamodeli', require('./components/proizvrstamodeli.vue').default);
//Vue.component('tehnologija-proizvoda', require('./components/tehnologija_proizvoda.vue').default);
//Vue.component('stavke-naloga', require('./components/stavke_naloga.vue').default);
//Vue.component('materijali', require('./components/materijali.vue').default);
Vue.component('kupci', require('./components/kupci.vue').default);
//Vue.component('mattipoznake', require('./components/mattipoznake.vue').default);

//Vue.component('vrste-materijala', require('./components/vrste_materijala.vue').default);

Vue.component('turbine', require('./components/turbine.vue').default);
Vue.component('turbinadijelovi', require('./components/turbinadijelovi.vue').default);
Vue.component('predracuni', require('./components/predracuni.vue').default);

const app=new Vue({
    el: '#app'

});