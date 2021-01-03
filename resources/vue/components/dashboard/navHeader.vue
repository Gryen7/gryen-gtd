<template>
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
    <button
      type="button"
      class="navbar-toggler"
      data-toggle="collapse"
      data-target="#tdbNavbarCollapse"
      aria-expanded="false"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="tdbNavbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <router-link to="/pub_analytics" class="nav-link">仪表盘</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/article_manager" class="nav-link"
            >文章管理</router-link
          >
        </li>
        <li class="nav-item">
          <router-link to="/site_manager" class="nav-link"
            >站点设置</router-link
          >
        </li>
      </ul>
    </div>
  </nav>
</template>
