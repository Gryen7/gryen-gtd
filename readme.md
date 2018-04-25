# README

gryen-gtd 是一个界面简洁的 web 端个人 gtd app。基于 Laravel 开发，提供博客发布、任务列表等功能。

## 目录
* 功能列表
* 技术一览
* 安装说明
* 版本更新
* 版本预览
* 授权协议
* 免责声明

### 功能一览
* [x] 博客发布
    使用优雅的 simditor 编辑文章，支持 markdown。
    
<center>![-w600](http://7xrgso.com1.z0.glb.clouddn.com/2018-04-25-15087530267780.jpg)
</center>
<center>文章便捷页面</center>
支持添加文章封面图，描述和关键词。
    
<center>![-w600](http://7xrgso.com1.z0.glb.clouddn.com/2018-04-25-15087538382652.jpg)
</center>
<center>文章列表页面</center>

<center>![-w600](http://7xrgso.com1.z0.glb.clouddn.com/2018-04-25-15087539469788.jpg)
</center>
<center>站点首页页面</center>

* [x] 待办列表
<center>![-w600](http://7xrgso.com1.z0.glb.clouddn.com/2018-04-25-15087544092838.jpg)
</center>
<center>待办列表页面</center>
* [ ] 收藏网络文章
* [ ] 发送文章到 Kindle
* [ ] 个人资料整理展示

### 技术一览
* 基于 Laravel 5.6，需要 php 7.1.3 以上版本
* 推荐使用 MariaDB 数据库
* 推荐使用 Redis 缓存数据库

### 安装说明
### 授权协议
gryen-gtd 是根据 [MIT(麻省理工学院许可证)](https://opensource.org/licenses/MIT) 开发的开源软件。

### 版本更新
#### v0.7

- 升级到 laravel 5.6
- 编辑器整合 markdown
- 优化静态资源打包，减少体积
- 标签显示优化
- 整站文字 weight 调整

#### v0.5

- 简化首页
- 内容页添加标签

#### v0.4

- 前端资源打包工具更新到 laravel-mix
- 引入 vue
- 文章标签分类
- 文章中的图片懒加载
- 新加手作展示模块

#### v0.3

- 使用 tar-simditor 替代 simditor(原作者不再维护此项目)
- JS 打包优化，自动获取模块名，简化开发过程中新建模块的步骤
- 前端统一提示框
- 新建编辑文章使用 Ajax 提交表单
- 文章封面图单独上传
- 文章中图片点击查看大图

#### v0.2

- 首页推荐轮播图更换图片、置顶、移除
- 去除首页多余板块

#### v0.1

- 首页板块优化
- 文章中的图片处理
- 文章列表翻页控件样式
- 后台文章管理里列表添加状态指示
- 后台 Banner 设置支持直接输入资源地址
- 导航文案调整

### 版本预览
#### v0.8
暂未安排
### 免责声明
在任何状况下，对于使用软件所带来的各种损害均不负赔偿责任。
