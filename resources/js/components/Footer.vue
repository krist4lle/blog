<template>
    <div class="footer">
        Made by Krist4lle.
    </div>
</template>
<script>
export default {
    name: 'Footer'
}
</script>
<style  lang="scss" scoped>
.footer {
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 20px 10%;
    border-top: 1px solid grey;

    @media (max-width: 1440px) {
        padding: 20px 5%;
    }
}
</style>
