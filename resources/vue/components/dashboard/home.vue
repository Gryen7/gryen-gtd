<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="https://statics.gryen.com/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            仪表盘
        </a>
    </nav>
</template>

<script>
export default {
    data: function () {
        return {
            articleList: []
        };
    },
    created: async function() {
        this.csrfCookie();
        this.renderArticleList();
    },
    methods: {
        renderArticleList: async function() {
            const res = await axios.get('/api/articles/list');

            console.log(res);
        },
        csrfCookie: async function() {
            const res = await axios.get('/sanctum/csrf-cookie');

            console.log(res);
        }
    }

}
</script>

<style scoped>

</style>
