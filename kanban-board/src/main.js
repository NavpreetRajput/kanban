import Vue from 'vue'
import App from './App.vue'
import "bootstrap/dist/css/bootstrap.min.css";
import "font-awesome/css/font-awesome.css";
import VModal from 'vue-js-modal'



Vue.config.productionTip = false
Vue.use(VModal, { dialog: true })


export const eventBus = new Vue();

new Vue({
  render: h => h(App),
}).$mount('#app')
