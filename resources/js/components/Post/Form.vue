<template>
    <div class="posts-form">
        <h2 class="posts-form_title">{{ title }}</h2>
        <InputText
            label="Title"
            placeholder="Input title"
            :input-value="post.title"
            @input="setData('title', $event)"
            :error="errorHandler.getError('title')"
        />
        <InputTextarea
            class="posts-form_textarea"
            label="Content"
            placeholder="Input content"
            :input-value="post.content"
            @input="setData('content', $event)"
            :error="errorHandler.getError('content')"
        />
        <div class="posts-form_actions">
            <ButtonBack/>
            <ButtonSubmit text="Save" @click="submit"/>
        </div>
    </div>
</template>
<script>
import {mapActions, mapGetters} from "vuex";
import {emptyPost} from "../../store/models/post.js";
import ButtonBack from "../Buttons/ButtonBack.vue";
import ButtonSubmit from "../Buttons/ButtonSubmit.vue";
import InputText from "../Inputs/InputText.vue";
import InputTextarea from "../Inputs/InputTextarea.vue";
import {errorHandler} from "../../services/errorHandler.js";

export default {
    name: 'Form',
    components: {InputTextarea, InputText, ButtonSubmit, ButtonBack},
    data() {
        return {
            isUpdate: false,
            errorHandler: errorHandler
        }
    },
    async created() {
        if (!!this.$route.params.id) {
            this.isUpdate = true;
            await this.fetchPost(this.$route.params.id);
        } else {
            this.$store.commit('setPost', {...emptyPost});
        }

        this.errorHandler.dropAllErrors();
    },
    computed: {
        ...mapGetters({
            post: 'getPost'
        }),
        title() {
            return this.$route.params.id ? this.post.title :'Create post';
        }
    },
    methods: {
        ...mapActions({
            fetchPost: 'fetchPost',
            updatePost: 'updatePost',
            storePost: 'storePost'
        }),
        setData(key, value) {
            this.post[key] = value;
            this.errorHandler.dropError(key);
        },
        submit() {
            const action = this.isUpdate ? this.updatePost : this.storePost;

            action(this.post)
                .then(() => {
                    if (this.isUpdate) {
                        this.$router.push({name: 'posts-view', params: {id: this.post.id}});
                    } else {
                        this.$router.push({name: 'posts-index'});
                    }
                })
                .catch(
                    error => {
                        this.errorHandler.setErrors(error.response.data.errors);
                    }
                );
        }
    }
}
</script>
<style lang="scss" scoped>
.posts-form {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    border-radius: 20px;
    border: 1px solid grey;
    margin: 2%;
    padding: 2%;
    max-width: 100%;

    &_title {
        font-size: 20px;
        font-weight: 600;
    }

    &_actions {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-end;
        gap: 5%;
    }

    &_textarea {
        width: 80% !important;
    }
}
</style>
