<template>
    <button class="button-back" @click="$emit('click')">
        {{ text }}
    </button>
</template>
<script>
export default {
    name: 'ButtonCommon',
    emits: ['click'],
    props: {
        text: {
            required:true,
            type: String
        }
    }
}
</script>
<style lang="scss" scoped>
.button-back {
    border: 1px solid grey;
    color: black;
    background: #FFF;
    border-radius: 5px;
    text-align: center;
    padding: 10px 20px;
    height: 46px;

    &:hover {
        background: grey;
    }
}
</style>
