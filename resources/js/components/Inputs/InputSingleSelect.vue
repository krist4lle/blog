<template>
    <div class="input">
        <label class="input_label" v-if="!!label">{{ label }}</label>
        <select v-model="value" @change="$emit('change', value)">
            <option value="0" v-if="blank">{{ blank }}</option>
            <option v-for="option in options" :value="option.value">{{ option.label }}</option>
        </select>
        <span class="input_error" v-if="error">{{ error }}</span>
    </div>
</template>
<script>
export default {
    name: 'InputSingleSelect',
    emits: ['change'],
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
        blank: {
            required: false,
            type: String,
            default: ''
        },
        options: {
            required: true,
            type: Array
        },
        inputValue: {
            required: false,
            default: 0
        }
    },
    data() {
        return {
            value: null
        }
    },
    created() {
        this.value = this.inputValue;
    },
    watch: {
        inputValue() {
            this.value = this.inputValue;
        }
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

    select {
        padding: 10px 20px;
        border-radius: 5px;
        height: 46px;
    }

    &_error {
        color: red;
    }
}
</style>
