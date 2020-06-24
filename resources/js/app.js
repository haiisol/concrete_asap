/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('order-table-component', require('./components/table/OrderTableComponent.vue').default);
Vue.component('order-completed-table-component', require('./components/table/OrderCompletedTableComponent.vue').default);
Vue.component('contractor-table-component', require('./components/table/ContractorTableComponent.vue').default);
Vue.component('rep-table-component', require('./components/table/RepTableComponent.vue').default);
Vue.component('contractor-details-table-component', require('./components/table/ContractorDetailsTableComponent.vue').default);
Vue.component('rep-details-table-component', require('./components/table/RepDetailsTableComponent.vue').default);
Vue.component('bids-table-component', require('./components/table/BidsTableComponent.vue').default);
Vue.component('bids-details-table-component', require('./components/table/BidsDetailsTableComponent.vue').default);

// Vue.component(
//     'passport-clients',
//     require('./components/passport/Clients.vue').default
// );

// Vue.component(
//     'passport-authorized-clients',
//     require('./components/passport/AuthorizedClients.vue').default
// );

// Vue.component(
//     'passport-personal-access-tokens',
//     require('./components/passport/PersonalAccessTokens.vue').default
// );

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
    	a: 1
  	},
    // template: '<example-component></example-component>',
    mounted(){
    	
    },
 	created: function () {
 		// console.log('ok');
	    // `this` points to the vm instance
	    // console.log('a is: ' + this.a);
  	}
});
