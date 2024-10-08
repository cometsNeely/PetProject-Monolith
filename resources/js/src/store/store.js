import { createStore } from 'vuex';
//import module

const store = createStore({

    modules: {
        //object: module
    },

	state() {
		return {
			count: 1,
		};
	},
    getters: {
        doubleCount(state) {
            return state.count*2
        }
    },
    mutations: {
        incrementCount(state, newCount) {
            state.count = newCount;
        }
    },
    actions: {
        getCount({ state, commit, getters }) {
            commit('incrementCount', 5)
        }
    },
});

export default store;