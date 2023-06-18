import { createStore } from 'vuex'
import {postModule} from "./modules/post/module.js";

export const store = createStore({
    modules: {
        post: postModule
    }
});
