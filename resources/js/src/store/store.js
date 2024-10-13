import { createStore } from 'vuex';
//import module

const store = createStore({

    modules: {
        //object: module
    },

	state() {
		return {
			message: '',
            errors: null
		};
	},
    getters: {
        /*doubleCount(state) {
            return state.count*2
        }*/
    },
    mutations: {
        defaultDataParamsMsgErrs(state, newParamMsg, newParamErrs) {
            state.message = newParamMsg
            state.errors = newParamErrs
        }
    },
    actions: {
        getNewParamsMsgErrs({ state, commit, getters }) {
            commit('defaultDataParamsMsgErrs', '', null)
        }
    },
});

export default store;