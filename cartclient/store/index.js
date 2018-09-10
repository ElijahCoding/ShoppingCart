export const state = () => ({
    categories: []
})

export const getters = {
    categories (state) {
        return state.categories
    }
}

export const mutations = {
    SET_CATEGORIES (state, categories) {
        state.categories = categories
    }
}

export const actions = {
    async nuxtServerInit({ commit }) {
        let response = await this.$axios.$get('categories') // we have the base url

        commit('SET_CATEGORIES', response.data)
    }
}
