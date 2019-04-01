<h1 align="center">
Gryen-GTD
</h1>
<p align="center">
gryen-gtd 是一个界面简洁的 web 端个人 gtd app。基于 [Laravel](https://laravel.com/) 开发，提供博客发布、任务列表等功能。
</p>

<p align="center">
<a href="https://travis-ci.org/itargaryen/gryen-gtd"><img src="https://travis-ci.org/itargaryen/gryen-gtd.svg" alt="Build Status" /></a>
<a href="https://github.styleci.io/repos/164370918"><img src="https://github.styleci.io/repos/164370918/shield" alt="StyleCI" /></a>
</p>

## 目录
* [页面一览](readme.md#页面一览)
* [运行环境](readme.md#运行环境)
* [安装说明](readme.md#安装说明)
* [更新日志](CHANGELOG.md)

### 页面一览

<p align="center">
<img src="http://markdown.gryen.com/index.jpg" alt="封面" width="600">
</p>
<p align="center">封面</p>

<p align="center">
<img src="http://markdown.gryen.com/articles.jpg" alt="笔记列表" width="600">
</p>
<p align="center">笔记列表</p>

<p align="center">
<img src="http://markdown.gryen.com/article_detail.jpg" alt="笔记详情" width="600">
</p>
<p align="center">笔记详情</p>

<p align="center">
<img src="http://markdown.gryen.com/2018-04-25-15087530267780-1.jpg" alt="笔记编辑" width="600">
</p>
<p align="center">笔记编辑</p>

### 运行环境

* 正确搭建 PHP 站点运行环境（PHP 7.1.3 及以上版本），推荐 OpenResty（Nginx） + PHP + MariaDB；
* 安装 NodeJS 以支持前端构建；
* 推荐安装启用 Redis 以提高性能。

### 安装说明

1. 克隆或下载代码；
2. 执行 `composer install` 安装 PHP 依赖；
3. 执行 `yarn` 安装 JS 依赖；
4. 复制 `.env.example` 到 `.env`，修改数据库连接参数：

    ```
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    ```
  
    亦可进一步修改其他参数，使用 Redis 或者使用[七牛云](https://portal.qiniu.com/signup?code=3loirka20zp76)加速网站。
  
5. 执行 `php artisan key:generate` 生成应用密钥；
6. 执行 `php artisan migrate`，生成数据表；
7. 通过 http(s)://[yourdomain]/register 注册用户；
8. 开始使用。
