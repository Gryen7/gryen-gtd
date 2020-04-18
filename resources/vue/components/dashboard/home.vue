<template>
    <div>
        home
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            articleList: []
        };
    },
    created: async function() {
        this.renderArticleList();
    },
    methods: {
        renderArticleList: async function() {
            const res = await axios.get(`/api/articles/list`);

            console.log(res);
        }
    }

}
</script>

<style scoped>

</style>
