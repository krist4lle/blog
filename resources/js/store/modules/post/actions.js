import {http} from "../../../services/http.js";
import {store} from "../../store.js";

const prefix = '/api/posts';

export const actions = {
    async fetchPosts({ commit }, payload) {
        const response = await http.get(prefix + '/', {
            params: payload
        });

        store.commit('setPosts', response.data.data);
        store.commit('setPostsMeta', response.data.meta);
    },

    async fetchPost({ commit }, id) {
        const response = await http.get(prefix + '/' + id);

        store.commit('setPost', response.data.data);
    },

    async storePost({ commit }, payload) {
        const response = await http.post(prefix + '/', payload);

        store.commit('pushPost', response.data.data);
    },

    async updatePost({ commit }, payload) {
        const response = await http.put(prefix + '/' + payload.id, payload);

        store.commit('refreshPost', response.data.data);
    },

    async deletePost({ commit }, id) {
        const response = await http.delete(prefix + '/' + id);

        if (response.data.status === true) {
            store.commit('slicePost', id);
        }
    }
}
