<template>
    <div class="post-view">
        <div class="post-view_actions">
            <ButtonBack/>
            <ButtonSubmit text="Update" @click="$router.push({name: 'posts-update', params: {id: $route.params.id}})"/>
            <ButtonDanger text="Delete" @click="deleteModal = true"/>
        </div>
        <div class="post-view_post">
            <h2 class="post-view_post_title">{{ post.title }}</h2>
            <p class="post-view_post_content">{{ post.content }}</p>
            <p class="post-view_post_content">Date: {{ post.created_at }}</p>
        </div>
        <DeletePostModal
            :modal="deleteModal"
            :title="'Delete post: ' + post.title + '?'"
            @close="deleteModal = false"
            @delete="deletePostFunction"
        />
    </div>
</template>
<script>
import {mapActions, mapGetters} from "vuex";
import ButtonBack from "../Buttons/ButtonBack.vue";
import ButtonSubmit from "../Buttons/ButtonSubmit.vue";
import ButtonDanger from "../Buttons/ButtonDanger.vue";
import DeletePostModal from "./components/DeletepostModal.vue";

export default {
    name: 'View',
    components: {DeletePostModal, ButtonSubmit, ButtonDanger, ButtonBack},
    data() {
        return {
            deleteModal: false
        }
    },
    async created() {
        await this.fetchPost(this.$route.params.id);
    },
    computed: {
        ...mapGetters({
            post: 'getPost'
        })
    },
    methods: {
        ...mapActions({
            fetchPost: 'fetchPost',
            deletePost: 'deletePost'
        }),
        deletePostFunction() {
            this.deletePost(this.post.id)
                .then(() => {
                    this.$router.push({name: 'posts-index'});
                })
                .catch(error => {
                    console.log(error.response);
                });
        }
    }
}
</script>
<style lang="scss" scoped>
.post-view {
    padding: 2%;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;

    &_actions {
        width: 80%;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;

        @media (max-width: 450px) {
            flex-direction: column-reverse;
            align-items: flex-end;
            width: 90%;
        }
    }

    &_post {
        width: 80%;
        display: flex;
        flex-direction: column;
        gap: 20px;

        @media (max-width: 450px) {
            gap: 10px;
            width: 90%;
        }

        &_title {
            font-size: 24px;
            font-weight: 600;
        }
    }
}
</style>
