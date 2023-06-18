<template>
    <button class="button-save" @click="$emit('click')">
        {{ text }}
    </button>
</template>
<script>
export default {
    name: 'ButtonSubmit',
    emits: ['click'],
    props: {
        text: {
            required: true,
            type: String
        }
    }
}
</script>
<style lang="scss" scoped>
.button-save {
    border: 1px solid darkblue;
    color: #FFF;
    background: cornflowerblue;
    border-radius: 5px;
    text-align: center;
    padding: 10px 20px;
    height: 46px;

    &:hover {
        background: darkblue;
    }
}
</style>
