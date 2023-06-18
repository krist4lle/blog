<template>
    <div class="navigation">
        <router-link :to="{name: 'posts-index'}" :class="{'selected': $route.name === 'posts-index'}" >
            Posts
        </router-link>
    </div>
</template>
<script>
export default {
    name: 'Navigation',
}
</script>
<style lang="scss" scoped>
.navigation {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10%;
    padding: 20px 10%;
    width: 100%;
    border-bottom: 1px solid grey;

    @media (max-width: 1440px) {
        padding: 20px 5%;
    }
}

.selected {
    text-decoration: underline;
}
</style>
