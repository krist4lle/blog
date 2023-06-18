<template>
    <div class="input">
        <label class="input_label">{{ label }}</label>
        <textarea :placeholder="placeholder" v-model="value" @input="$emit('input', value)"></textarea>
        <span class="input_error" v-if="error">{{ error }}</span>
    </div>
</template>
<script>
export default {
    name: 'InputTextarea',
    emits: ['input'],
    props: {
        label: {
            required: false,
            type: String,
            default:''
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
    width: 100%;

    &_label {
        font-size: 14px;
        font-weight: 400;
        font-style: italic;
    }

    textarea {
        padding: 10px 20px;
        border: 1px solid grey;
        border-radius: 5px;
    }

    &_error {
        color: red;
    }
}
</style>
