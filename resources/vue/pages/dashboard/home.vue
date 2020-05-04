<template>
    <div class="g-dashboard">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
            <a class="navbar-brand" href="/">
                <img
                    src="https://statics.gryen.com/logo.png"
                    width="30"
                    height="30"
                    class="d-inline-block align-top"
                    alt
                />
                格安
            </a>
        </nav>
        <div class="container g-container">
            <div class="alert alert-primary mb-3">每 {{ analytics.aveDist }} 天发布一篇文章，平均间隔：{{ analytics.aveRage }} 天</div>
            <div class="d-flex justify-content-between mb-3">
                <div class="btn-group" role="group">
                    <button
                        type="button"
                        class="btn btn-primary"
                        @click="filter('status', 0)"
                        :disabled="listQueryParams.status === 0 && listQueryParams.onlyTrashed !== 'yes'"
                    >待发布
                    </button>
                    <button
                        type="button"
                        class="btn btn-success"
                        @click="filter('status', 1)"
                        :disabled="listQueryParams.status === 1 && listQueryParams.onlyTrashed !== 'yes'"
                    >已发布
                    </button>
                    <button
                        type="button"
                        class="btn btn-secondary"
                        @click="filter('onlyTrashed', 'yes')"
                        :disabled="listQueryParams.onlyTrashed === 'yes'"
                    >已删除
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button
                        type="button"
                        class="btn btn-outline-primary"
                        :class="{'active': listQueryParams.sorter.indexOf('created_at') > -1}"
                        @click="order('created_at')"
                    >新建时间
                    </button>
                    <button
                        type="button"
                        class="btn btn-outline-primary"
                        :class="{'active': listQueryParams.sorter.indexOf('updated_at') > -1}"
                        @click="order('updated_at')"
                    >更新时间
                    </button>
                    <button
                        type="button"
                        class="btn btn-outline-primary"
                        :class="{'active': listQueryParams.sorter.indexOf('views') > -1}"
                        @click="order('views')"
                    >浏览量
                    </button>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item disabled">
                    <div class="row">
                        <div class="col-sm-1">ID</div>
                        <div class="col-sm-4 text-truncate">文章标题</div>
                        <div class="col-sm-3 text-truncate">
                            <span>新建时间</span>
                        </div>
                        <div class="col-sm-3 text-truncate">
                            <span>更新时间</span>
                        </div>
                        <div class="col-sm-1 text-right text-truncate">
                            <span>浏览量</span>
                        </div>
                    </div>
                </li>
                <li
                    v-for="article in articleRes.data"
                    :key="article.id"
                    class="list-group-item list-group-item-action"
                >
                    <div class="row">
                        <div class="col-sm-1">{{article.id}}</div>
                        <h5 class="col-sm-4 text-truncate" :title="article.title">
                            <a :href="article.href" target="_blank">{{article.title}}</a>
                        </h5>
                        <div class="col-sm-3 text-truncate">
                            <span>{{article.createdAt}}</span>
                        </div>
                        <div class="col-sm-3 text-truncate">
                            <span>{{article.updatedAt}}</span>
                        </div>
                        <div class="col-sm-1 text-right text-truncate">
                            <span class="badge badge-primary badge-pill">{{article.views}}</span>
                        </div>
                    </div>
                </li>
            </ul>
            <nav aria-label="Page navigation" class="g-pagination">
                <ul class="pagination">
                    <li class="page-item" :class="{'disabled': articleRes.current_page === 1}">
                        <span v-if="articleRes.current_page === 1" class="page-link">第一页</span>
                        <a v-else class="page-link" @click="firstPage">第一页</a>
                    </li>
                    <li class="page-item" :class="{'disabled': !articleRes.prev_page_url}">
                        <a v-if="articleRes.prev_page_url" class="page-link" @click="prevPage">上一页</a>
                        <span v-else class="page-link">上一页</span>
                    </li>
                    <li class="page-item" :class="{'disabled': !articleRes.next_page_url}">
                        <a v-if="articleRes.next_page_url" class="page-link" @click="nextPage">下一页</a>
                        <span v-else class="page-link">下一页</span>
                    </li>
                    <li
                        class="page-item"
                        :class="{'disabled': articleRes.current_page === articleRes.last_page}"
                    >
                        <span v-if="articleRes.current_page === articleRes.last_page" class="page-link">最后一页</span>
                        <a v-else class="page-link" @click="lastPage">最后一页</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                listQueryParams: {
                    pageSize: 15,
                    page: 1,
                    sorter: 'created_at_desc',
                    status: 0,
                    onlyTrashed: 'no'
                },
                articleRes: {},
                analytics: {
                    aveRage: 0,
                    aveDist: 0
                }
            };
        },
        created: async function () {
            this.csrfCookie();
            this.renderArticleList();
            this.renderAnalytics();
        },
        methods: {
            renderAnalytics: async function () {
                const res = await axios.get('/api/analytics');

                this.analytics = res.data;
            },
            renderArticleList: async function () {
                const res = await axios.get('/api/articles/list', {
                    params: {
                        ...this.listQueryParams
                    }
                });

                this.articleRes = res.data;
                this.listQueryParams.page = this.articleRes.current_page;
            },
            csrfCookie: async function () {
                const res = await axios.get('/sanctum/csrf-cookie');
            },
            filter: function (type, value) {
                this.listQueryParams[type] = value;

                if (type === 'status') {
                    this.listQueryParams.onlyTrashed = 'no';
                }
                this.renderArticleList();
            },
            order: function (type) {
                const sorterArr = this.listQueryParams.sorter.split('_');
                const oldValue = sorterArr[sorterArr.length - 1];
                const oldType = this.listQueryParams.sorter.replace(`_${oldValue}`, '');

                if (oldType === type) {
                    if (oldValue === 'desc') {
                        this.listQueryParams.sorter = `${type}_asc`;
                    }

                    if (oldValue === 'asc') {
                        this.listQueryParams.sorter = `${type}_desc`;
                    }
                } else {
                    this.listQueryParams.sorter = `${type}_desc`;
                }

                this.renderArticleList();
            },
            firstPage: function () {
                if (this.listQueryParams.page < 1) {
                    return;
                }

                this.listQueryParams.page = 1;

                this.renderArticleList();
            },
            prevPage: function () {
                if (this.listQueryParams.page < 1) {
                    return;
                }

                this.listQueryParams.page = this.listQueryParams.page - 1;

                this.renderArticleList();
            },
            nextPage: function () {
                if (this.listQueryParams.page >= this.articleRes.last_page) {
                    return;
                }

                this.listQueryParams.page = this.listQueryParams.page + 1;

                this.renderArticleList();
            },
            lastPage: function () {
                if (this.listQueryParams.page < 1) {
                    return;
                }

                this.listQueryParams.page = this.articleRes.last_page;

                this.renderArticleList();
            }
        }
    };
</script>

<style lang="scss" scoped>
    a {
        cursor: pointer;
        color: var(--primary);
    }

    .g-dashboard {
        height: 100%;
    }

    .g-container {
        padding-bottom: 5rem;
        min-height: calc(100% - 30px - 2.625rem);
        position: relative;

        h5 {
            margin-bottom: 0;
        }
    }

    .g-pagination {
        position: absolute;
        bottom: 1rem;
        left: 15px;
    }
</style>
