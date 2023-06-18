<template>
    <div class="modal" v-if="modal">
        <div class="modal_container">
            <h2 class="modal_container_title">
                {{ title }}
            </h2>
            <div class="modal_container_actions">
                <ButtonCommon text="Cancel" @click="$emit('close')" />
                <ButtonDanger text="Delete" @click="$emit('delete')" />
            </div>
        </div>
    </div>
</template>
<script>
import ButtonCommon from "../../Buttons/ButtonCommon.vue";
import ButtonDanger from "../../Buttons/ButtonDanger.vue";

export default {
    name: 'DeletePostModal',
    components: {ButtonDanger, ButtonCommon},
    emits: ['close', 'delete'],
    props: {
        modal: {
            required: true,
            type: Boolean
        },
        title: {
            required: true,
            type: String
        }
    }
}
</script>
<style scoped lang="scss">
.modal {
    width: 100% !important;
    height: 100% !important;
    background-color: rgba(0, 0, 0, .7);
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;

    &_container {
        background-color: #FFF;
        border-radius: 20px;
        border: 1px solid black;
        width: 30%;
        height: 30%;
        padding: 1%;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        justify-content: space-between;

        @media (max-width: 1800px) {
            width: 50%;
            height: 20%;
        }

        @media (max-width: 1000px) {
            width: 75%;
            height: 15%;
        }

        @media (max-width: 650px) {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 0;
            justify-content: center;
        }

        &_title {
            font-size: 24px;
            font-weight: 600;
            text-align: center;
        }

        &_actions {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
        }
    }
}
</style>
