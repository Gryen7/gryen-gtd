<template>
    <div class="scroll-to-top" @click="scrollToTop()">
        <span class="glyphicon glyphicon-triangle-top"></span>
    </div>
</template>
<style lang="scss" type="text/scss">
    .scroll-to-top {
        width: 50px;
        height: 50px;
        background-color: #fff;
        border-radius: 50px;
        position: fixed;
        right: 30px;
        bottom: 30px;
        z-index: 31;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;

        .glyphicon-triangle-top {
            top: 0;
            font-size: 16px;
        }
    }
</style>
<script>
    export default {
        methods: {
            scrollToTop() {
                console.log('a!');
            }
        }
    }
</script>