<template>
    <div class="input">
        <label class="input_label" v-if="!!label">{{ label }}</label>
        <input type="text" :placeholder="placeholder" v-model="value" @input="$emit('input', value)">
        <span class="input_error" v-if="error">{{ error }}</span>
    </div>
</template>
<script>
export default {
    name: 'InputText',
    emits: ['input'],
    props: {
        label: {
            required: false,
            type: String,
            default: ''
        },
        placeholder: {
            required: false,
            type: String,
            default: ''
        },
        error: {
            required: false,
            type: String,
            default: ''
        },
        inputValue: {
            required: false,
            default: null
        }
    },
    data() {
        return {
            value: null
        }
    },
    created() {
        this.value = this.inputValue;
    }
}
</script>
<style lang="scss" scoped>
.input {
    display: flex;
    flex-direction: column;
    gap: 5px;

    &_label {
        font-size: 14px;
        font-weight: 400;
        font-style: italic;
    }

    input {
        padding: 10px 20px;
        border: 1px solid grey;
        border-radius: 5px;
        height: 46px;
    }

    &_error {
        color: red;
    }
}
</style>
