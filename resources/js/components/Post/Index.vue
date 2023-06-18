<template>
    <div class="posts-index">
        <div class="posts-index_actions">
            <InputText placeholder="Search..." @input="search($event)" />
            <InputSingleSelect :options="sort" blank="Sort by" @change="sortPosts($event)"/>
            <ButtonSubmit text="Create post" @click="$router.push({name: 'posts-create'})" />
        </div>
        <div class="posts-index_grid">
            <PostPreview v-for="post in posts" :post="post" />
        </div>
        <Pagination :meta="postsMeta" @paginate="paginate($event)" />
    </div>
</template>
<script>
import {mapActions, mapGetters} from "vuex";
import PostPreview from "./components/PostPreview.vue";
import Pagination from "../Pagination.vue";
import {meta} from "../../store/models/meta.js";
import ButtonSubmit from "../Buttons/ButtonSubmit.vue";
import InputSingleSelect from "../Inputs/InputSingleSelect.vue";
import InputText from "../Inputs/InputText.vue";

export default {
    name: 'Index',
    components: {InputText, InputSingleSelect, ButtonSubmit, Pagination, PostPreview},
    data() {
        return {
            meta: {...meta},
            sort: [
                {
                    value: {
                        column: 'created_at',
                        direction: 'asc'
                    },
                    label: 'Date old to new'
                },
                {
                    value: {
                        column: 'created_at',
                        direction: 'desc'
                    },
                    label: 'Date new to old'
                },
                {
                    value: {
                        column: 'title',
                        direction: 'asc'
                    },
                    label: 'Title from A to Z'
                },
                {
                    value: {
                        column: 'title',
                        direction: 'desc'
                    },
                    label: 'Title from Z to A'
                },
            ]
        }
    },
    async created() {
        await this.fetchPosts(this.meta);
    },
    computed: {
        ...mapGetters({
            posts: 'getPosts',
            postsMeta: 'getPostsMeta'
        })
    },
    methods: {
        ...mapActions({
            fetchPosts: 'fetchPosts'
        }),
        async sortPosts(sort) {
            this.meta.column = sort.column;
            this.meta.direction = sort.direction;

            await this.fetchPosts(this.meta);
        },
        async paginate(meta) {
            this.meta.page = meta.page;

            await this.fetchPosts(this.meta);
        },
        async search(search) {
            this.meta.search = search;

            await this.fetchPosts(this.meta);
        }
    }
}
</script>
<style lang="scss" scoped>
.posts-index {
    display: flex;
    flex-direction: column;
    gap: 10%;
    width: 100%;
    align-items: center;
    padding: 20px;

    @media (max-width: 1440px) {
        padding: 20px 10px;
    }

    &_actions {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        width: 80%;

        @media (max-width: 450px) {
            flex-direction: column-reverse;
            align-items: flex-end;
            width: 90%;
        }
    }

    &_grid {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-evenly;
        max-width: 80%;
        padding: 10px;
        grid-gap: 10px;

        @media (max-width: 1440px) {
            max-width: 90%;
        }
    }
}
</style>
