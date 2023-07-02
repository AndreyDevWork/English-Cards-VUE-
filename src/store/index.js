import {createStore} from 'vuex'
import {registrationModule} from '@/store/registrationModule'

export default createStore({
  modules: {
    registration: registrationModule,
  }
})