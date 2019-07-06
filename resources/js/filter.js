var moment = require('moment');
import Vue from 'vue'
Vue.filter('timeformat',(arg)=>{
  return moment().format("MMM Do YYYY"); 
});
// moment().format();