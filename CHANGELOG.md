# 更新日志

## v1.2

### Features

* [ ] 封面页设计美化
* [ ] 升级到 Laravel 5.8

## v1.1

### Features

* [x] 评估试用使用 `php artisan db:seed` 快速填充数据
* [x] 提升功能点测试覆盖率，提升系统稳定性
* [x] 伪静态页面
* [x] 文章列表页文章数量参数化
* [x] Travis jwt 初始化
* [x] 添加获取文章列表、删除文章、恢复删除文章、彻底删除文章等 Api
* [x] 去掉冗余代码
* [x] 其他问题修复


### BREAKING CHANGES

* [x] 图片懒加载由 `jquery-lazyload` 换到 `lazysizes`
* [x] 去掉通过站点直接彻底删除文章的功能

## v1.0

### Features

* 升级到 laravel 5.7
* 升级到 bootstrap 4
* 新的笔记页
* 优化 JS、CSS，进一步提升页面加载速度
* 标签列表页 URL 优化

### BREAKING CHANGES

* [x] 新的封面页
* [x] 删除后台，使用 [gryen-dashboard](https://github.com/itargaryen/gryen-dashboard)
* [x] 删除手作展示模块

## v0.9

### Features

* 新建文章：`metaWeblog.newPost`
* 编辑文章：`metaWeblog.editPost`
* 获取文章：`metaWeblog.getPost`
* 标签支持
* 文章描述

## v0.8

### Features

* 添加相关文章功能

## v0.7

### Features

* 升级到 laravel 5.6
* 编辑器整合 markdown
* 优化静态资源打包，减少体积
* 标签显示优化
* 整站文字 weight 调整

## v0.5

### Features

* 简化首页
* 内容页添加标签

## v0.4

### Features

* 前端资源打包工具更新到 laravel-mix
* 引入 vue
* 文章标签分类
* 文章中的图片懒加载
* 新加手作展示模块

## v0.3

### Features

* 使用 tar-simditor 替代 simditor(原作者不再维护此项目)
* JS 打包优化，自动获取模块名，简化开发过程中新建模块的步骤
* 前端统一提示框
* 新建编辑文章使用 Ajax 提交表单
* 文章封面图单独上传
* 文章中图片点击查看大图

## v0.2

### Features

* 首页推荐轮播图更换图片、置顶、移除

### BREAKING CHANGES

* 去除首页多余板块

## v0.1

### Features

* 首页板块优化
* 文章中的图片处理
* 文章列表翻页控件样式
* 后台文章管理里列表添加状态指示
* 后台 Banner 设置支持直接输入资源地址
* 导航文案调整
