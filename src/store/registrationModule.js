
export const registrationModule = {
  state: () => ({
    signup: false
  }),
  getters: {

  },
  mutations: {
    signupTrue(state) {
      return state.signup = true
  
    },
    signupFalse(state) {
      return state.signup = false
    }
  },
  actions: {
  },
}