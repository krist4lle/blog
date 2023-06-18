<template>
    <div v-if="!!meta" class="pagination">
        <ButtonCommon text="<" @click="prevPage"/>
        <ButtonCommon
            class="hide"
            :class="{'selected': meta.current_page === 1}"
            text="1"
            @click="$emit('paginate', {page: 1})"
        />

        <span class="hide" v-if="meta.current_page > 2">...</span>

        <ButtonCommon
            class="hide"
            :class="{'selected': meta.current_page === page}"
            :text="page" v-for="page in pages"
            @click="$emit('paginate', {page: page})"
        />

        <InputSingleSelect
            class="mobile"
            :options="allPages"
            :input-value="meta.current_page"
            @change="$emit('paginate', {page: $event})"
        />

        <span class="hide" v-if="meta.current_page < meta.last_page - 2">...</span>

        <ButtonCommon
            v-if="meta.current_page !== meta.last_page"
            class="hide"
            :class="{'selected': meta.current_page === meta.last_page}"
            :text="meta.last_page"
            @click="$emit('paginate', {page: meta.last_page})"
        />
        <ButtonCommon text=">" @click="nextPage"/>
    </div>
</template>
<script>

import ButtonCommon from "./Buttons/ButtonCommon.vue";
import InputSingleSelect from "./Inputs/InputSingleSelect.vue";

export default {
    name: 'Pagination',
    components: {InputSingleSelect, ButtonCommon},
    emits: ['paginate'],
    props: {
        meta: {
            required: true
        }
    },
    computed: {
        allPages() {
            return Array.from({length: this.meta.last_page}, (_, i) => ({
                value: i + 1,
                label: i + 1,
            }));
        },
        pages() {
            let result = [];

            let entities = this.meta.from + this.meta.per_page;

            if (this.meta.current_page > 0 && this.meta.current_page < 4) {
                for (let i = 2; i < 5; i++) {
                    if (entities < this.meta.total && i !== this.meta.last_page) {
                        result.push(i);
                    }

                    entities = entities + this.meta.per_page;
                }
            } else if (this.meta.current_page <= this.meta.last_page && this.meta.current_page >= this.meta.last_page - 2) {
                for (let i = this.meta.last_page - 3; i < this.meta.last_page; i++) {
                    if (i !== 1) {
                        result.push(i);
                    }
                }
            } else {
                for (let i = -1; i < 2; i++) {
                    if (entities < this.meta.total && i + this.meta.current_page !== this.meta.last_page) {
                        result.push(i + this.meta.current_page);
                    }

                    entities = entities + this.meta.per_page;
                }
            }

            return result;
        }
    },
    methods: {
        prevPage() {
            if (this.meta.current_page > 1) {
                const page = this.meta.current_page - 1;
                this.$emit('paginate', {page: page});
            }
        },
        nextPage() {
            if (this.meta.current_page < this.meta.last_page) {
                const page = this.meta.current_page + 1;
                this.$emit('paginate', {page: page});
            }
        }
    }
}
</script>
<style lang="scss" scoped>
.pagination {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px;
}

.selected {
    background-color: grey !important;
}

.hide {
    @media (max-width: 550px) {
        display: none;
    }
}

.mobile {
    display: none !important;

    @media (max-width: 550px) {
        display: block !important;
    }
}
</style>
