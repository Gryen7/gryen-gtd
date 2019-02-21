<h1 align="center">
Gryen-GTD
</h1>
<p align="center">
gryen-gtd 是一个界面简洁的 web 端个人 gtd app。基于 [Laravel](https://laravel.com/) 开发，提供博客发布、任务列表等功能。
</p>
<p align="center">
<a href="https://travis-ci.org/itargaryen/gryen-gtd"><img src="https://travis-ci.org/itargaryen/gryen-gtd.svg?branch=develop" alt="Build Status" /></a>
<a href="https://github.styleci.io/repos/164370918"><img src="https://github.styleci.io/repos/164370918/shield?branch=develop" alt="StyleCI" /></a>
</p>

## 目录
* [功能列表](https://gitee.com/targaryen/gryen-gtd/blob/master/readme.md#%E5%8A%9F%E8%83%BD%E5%88%97%E8%A1%A8)
* [运行环境要求](https://gitee.com/targaryen/gryen-gtd/blob/develop/readme.md#%E8%BF%90%E8%A1%8C%E7%8E%AF%E5%A2%83%E8%A6%81%E6%B1%82)
* [安装说明](https://gitee.com/targaryen/gryen-gtd/blob/develop/readme.md#%E5%AE%89%E8%A3%85%E8%AF%B4%E6%98%8E)
* [版本更新](https://gitee.com/targaryen/gryen-gtd/blob/develop/CHANGELOG.md)

### 功能列表

* [x] 博客发布
    使用优雅的 [simditor](https://simditor.tower.im/) 编辑文章，支持 markdown 语法。

![-w600](http://markdown.gryen.com/2018-04-25-15087530267780-1.jpg)
文章编辑页面
支持添加文章封面图，描述和关键词。

![-w600](http://markdown.gryen.com/2018-04-25-15087538382652-1.jpg)
文章列表页面

![-w600](http://markdown.gryen.com/2018-04-25-15087539469788-1.jpg)
站点首页页面

* [x] 待办列表
![-w600](http://markdown.gryen.com/2018-04-25-15087544092838-1.jpg)
待办列表页面

* [ ] 收藏网络文章
* [ ] 发送文章到 Kindle
* [ ] 个人资料整理展示

### 运行环境要求

* 正确搭建 PHP 站点运行环境（PHP 7.1.3 及以上版本），推荐 OpenResty（Nginx） + PHP + MariaDB；
* 安装 NodeJS 以支持前端构建；
* 推荐安装启用 Redis 以提高性能。

### 安装说明

1. 克隆或下载代码；
2. 执行 `composer install` 安装 PHP 依赖；
3. 执行 `yarn` 安装 JS 依赖；
4. 复制 `.env.example` 到 `.env` 并修改其内容；
5. 执行 `php artisan key:generate` 生成应用密钥；
6. 开始使用。
