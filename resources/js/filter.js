import moment from 'moment'
import Vue from 'vue'

Vue.filter('timeformat', (arg) => {

    return moment(arg).format('LL')
})

Vue.filter('sortlength',(text,length,sufffix) =>{
     return text.substring(0,length)+sufffix;
})