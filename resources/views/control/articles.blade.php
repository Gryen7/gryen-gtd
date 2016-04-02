@extends('layouts._control')
@section('subNavigation')
    <div class="collapse navbar-collapse">
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="">New Article</a>
            </li>
            <li>
                <a href=""><span class="glyphicon glyphicon-object-align-bottom"></span></a>
            </li>
        </ul>
    </div>
    @stop
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
            <tr>
                <td>1</td>
                <td>这是一篇文章</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            已发布<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">已发布</a></li>
                            <li><a href="#">未发布</a></li>
                            <li><a href="#">草稿</a></li>
                        </ul>
                    </div>
                </td>
                <td>
                    <ul class="list-group">
                        <li class="list-group-item pull-left"><a href="">浏览</a></li>
                        <li class="list-group-item pull-left"><a href="">编辑</a></li>
                        <li class="list-group-item pull-left"><a href="">删除</a></li>
                        <li class="list-group-item pull-left"><a href="javascript:;" data-toggle="modal" data-target="#myModal">加入待办</a></li>
                    </ul></td>
            </tr>
            <tr>
                <td>2</td>
                <td>这是一篇文章</td>
                <td><div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            已发布<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">已发布</a></li>
                            <li><a href="#">未发布</a></li>
                            <li><a href="#">草稿</a></li>
                        </ul>
                    </div></td>
                <td>
                    <ul class="list-group">
                        <li class="list-group-item pull-left"><a href="">浏览</a></li>
                        <li class="list-group-item pull-left"><a href="">编辑</a></li>
                        <li class="list-group-item pull-left"><a href="">删除</a></li>
                        <li class="list-group-item pull-left"><a href="javascript:;" data-toggle="modal" data-target="#myModal">加入待办</a></li>
                    </ul></td>
            </tr>
            <tr>
                <td>3</td>
                <td>这是一篇文章</td>
                <td><div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            已发布<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">已发布</a></li>
                            <li><a href="#">未发布</a></li>
                            <li><a href="#">草稿</a></li>
                        </ul>
                    </div></td>
                <td>
                    <ul class="list-group">
                        <li class="list-group-item pull-left"><a href="">浏览</a></li>
                        <li class="list-group-item pull-left"><a href="">编辑</a></li>
                        <li class="list-group-item pull-left"><a href="">删除</a></li>
                       <li class="list-group-item pull-left"><a href="javascript:;" data-toggle="modal" data-target="#myModal">加入待办</a></li>
                    </ul></td>
            </tr>
        </table>
    </div>
    <nav>
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    {{--模态框开始--}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop