<template>
    <button class="button-danger" @click="$emit('click')">
        {{ text }}
    </button>
</template>
<script>
export default {
    name: 'ButtonDanger',
    props: {
        text: {
            required: true,
            type: String
        }
    }
}
</script>
<style lang="scss" scoped>
.button-danger {
    border: 1px solid darkred;
    color: #FFF;
    background: orangered;
    border-radius: 5px;
    text-align: center;
    padding: 10px 20px;
    height: 46px;


    &:hover {
        background: darkred;
    }
}
</style>
