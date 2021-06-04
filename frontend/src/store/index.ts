import { createStore } from 'vuex'
import User from "@/classes/User";

export default createStore({
  state: {
    user: null as any
  },
  mutations: {
    SET_USER: (state, user) => state.user = user
  },
  actions: {
    setUser: ({ commit }, user) => commit('SET_USER', user)
  },
  modules: {
  }
})
