# README

gryen-gtd 是一个界面简洁的 web 端个人 gtd app。基于 [Laravel](https://laravel.com/) 开发，提供博客发布、任务列表等功能。

## 目录
* [功能列表](https://gitee.com/targaryen/gryen-gtd/blob/develop/readme.md#%E5%8A%9F%E8%83%BD%E5%88%97%E8%A1%A8)
* [运行环境要求](https://gitee.com/targaryen/gryen-gtd/blob/develop/readme.md#%E8%BF%90%E8%A1%8C%E7%8E%AF%E5%A2%83%E8%A6%81%E6%B1%82)
* [安装说明](https://gitee.com/targaryen/gryen-gtd/blob/develop/readme.md#%E5%AE%89%E8%A3%85%E8%AF%B4%E6%98%8E)
* [版本更新](https://gitee.com/targaryen/gryen-gtd/blob/develop/readme.md#%E7%89%88%E6%9C%AC%E6%9B%B4%E6%96%B0)
* [授权协议](https://gitee.com/targaryen/gryen-gtd/blob/develop/readme.md#%E6%8E%88%E6%9D%83%E5%8D%8F%E8%AE%AE)
* [免责声明](https://gitee.com/targaryen/gryen-gtd/blob/develop/readme.md#%E5%85%8D%E8%B4%A3%E5%A3%B0%E6%98%8E)

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
3. 执行 `npm install` 或 `yarn` 安装 JS 依赖；
4. 复制 `.env.example` 到 `.env` 并修改其内容；
5. 执行 `php artisan key:generate` 生成应用密钥；
6. 开始使用。

### 版本更新

#### v0.9

* 支持 MetaWeblogApi

[x] 新建文章
[x] 编辑文章
[x] Tags
[x] 发布时间
[ ] 删除文章
[x] 获取文章信息
[ ] 获取最近文章
[ ] 获取目录
[ ] 创建目录
[ ] 文章描述
[ ] 缩略图

#### v0.8

* 添加相关文章功能

#### v0.7

* 升级到 laravel 5.6
* 编辑器整合 markdown
* 优化静态资源打包，减少体积
* 标签显示优化
* 整站文字 weight 调整

#### v0.5

* 简化首页
* 内容页添加标签

#### v0.4

* 前端资源打包工具更新到 laravel-mix
* 引入 vue
* 文章标签分类
* 文章中的图片懒加载
* 新加手作展示模块

#### v0.3

* 使用 tar-simditor 替代 simditor(原作者不再维护此项目)
* JS 打包优化，自动获取模块名，简化开发过程中新建模块的步骤
* 前端统一提示框
* 新建编辑文章使用 Ajax 提交表单
* 文章封面图单独上传
* 文章中图片点击查看大图

#### v0.2

* 首页推荐轮播图更换图片、置顶、移除
* 去除首页多余板块

#### v0.1

* 首页板块优化
* 文章中的图片处理
* 文章列表翻页控件样式
* 后台文章管理里列表添加状态指示
* 后台 Banner 设置支持直接输入资源地址
* 导航文案调整

### 授权协议

gryen-gtd 是根据 [MIT(麻省理工学院许可证)](https://opensource.org/licenses/MIT) 开发的开源软件。

### 免责声明

在任何状况下，对于使用软件所带来的各种损害均不负赔偿责任。
