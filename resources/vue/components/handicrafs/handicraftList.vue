<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Vue 组件示例</div>

                    <div class="panel-body">
                        Vue 组件
                    </div>
                </div>
            </div>
        </div>
        <scroll-to-top></scroll-to-top>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.get('api/handicrafts/list').then(result => {
                console.log(result);
            }).catch(error => {
                console.error(error);
            });
        }
    }
</script>