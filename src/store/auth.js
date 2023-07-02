
export const auth = {
  state: () => ({
    auth: false
  }),
  getters: {

  },
  mutations: {
    authTrue(state) {
      return state.auth = true
  
    },
    authFalse(state) {
      return state.auth = false
    }
  },
  actions: {
  },
}