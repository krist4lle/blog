<template>
    <div class="post-preview">
        <h2 class="post-preview_title">
            {{ post.title }}
        </h2>
        <p class="post-preview_content">
            {{ content }}
        </p>
        <p class="post-preview_date">
            Date: {{ post.created_at }}
        </p>
        <div class="post-preview_actions">
            <ButtonSubmit text="View" @click="$router.push({name: 'posts-view', params: {id: post.id}})" />
        </div>
    </div>
</template>
<script>
import ButtonSubmit from "../../Buttons/ButtonSubmit.vue";

export default {
    name: 'PostPreview',
    components: {ButtonSubmit},
    props: {
        post: {
            required: true
        }
    },
    computed: {
        content() {
            return this.post.content.substring(0, 300) + '...';
        }
    }
}
</script>
<style lang="scss" scoped>
.post-preview {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    padding: 15px;
    border: 1px solid grey;
    border-radius: 20px;
    width: 30%;
    height: 350px;
    gap: 10px;

    @media (max-width: 1250px) {
        width: 45%;
    }

    @media (max-width: 800px) {
        width: 80%;
    }

    @media (max-width: 500px) {
        width: 90%;
        height: 100%;
    }

    &_title {
        font-size: 24px;
        font-weight: 600;
    }

    &_date {
        display: flex;
        justify-content: flex-start;
        width: 100%;
    }
}
</style>
