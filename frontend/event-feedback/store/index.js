export const state = () => ({
  showAlert: false
})

export const mutations = {
  showAlert (state, payload) { state.showAlert = payload }
}

export const getters = {
  showAlert (state) {
    return {
      showAlert: state.showAlert,
      type: state.type,
      message: state.message
    }
  }
}
