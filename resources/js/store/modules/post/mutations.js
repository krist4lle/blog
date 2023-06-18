export const mutations = {
    setPosts(state, posts) {
        state.posts = posts;
    },

    setPostsMeta(state, meta) {
        state.meta = meta;
    },

    setPost(state, post) {
        state.post = post;
    },

    pushPost(state, post) {
        state.posts.push(post);
    },

    refreshPost(state, post) {
        const postToRefresh = state.posts.find(oldPost => oldPost.id === post.id);
        postToRefresh.name = post.name;
        postToRefresh.content = post.content;
    },

    slicePost(state, id) {
        const postToSliceIndex = state.posts.indexOf(oldPost => oldPost.id === id);
        state.posts.slice(postToSliceIndex, 1);

    }
}
