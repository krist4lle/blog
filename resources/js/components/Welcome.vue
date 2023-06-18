<template>
    <div class="welcome">
        <h1>Welcome!</h1>
        <h2>Please browse test Blog.</h2>
        <h4>Made by Krist4lle</h4>
    </div>
</template>
<script>
export default {
    name: 'Welcome'
}
</script>
<style lang="scss" scoped>
.welcome {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10%;

    h1 {
        text-align: center;
        font-size: 30px;
        font-weight: 600;
    }

    h2 {
        text-align: center;
        font-size: 24px;
    }

    h4 {
        text-align: center;
    }
}
</style>
