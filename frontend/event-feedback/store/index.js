export const state = () => ({
  showAlert: false,
  type: '',
  message: ''

})

export const mutations = {
  showAlert (state, payload) {
    state.showAlert = payload.alert
    state.type = payload.type
    state.message = payload.message
  }
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
