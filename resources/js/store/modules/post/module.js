import {actions} from "./actions.js";
import {getters} from "./getters.js";
import {mutations} from "./mutations.js";
import {state} from "./state.js";

export const postModule = {
    actions: actions,
    getters: getters,
    mutations: mutations,
    state: () => (state)
}
