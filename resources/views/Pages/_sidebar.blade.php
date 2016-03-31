<div class="col-md-4">
    {!! Form::open(['action'=>'SearchesController@search','class'=>'form-inline','method'=>'GET']) !!}
    <div class="form-group">
        {!! Form::submit('Search',['class'=>'btn btn-primary form-control']) !!}
        <div class="input-group">
            {!! Form::input('text','search','',['class' => 'form-control','placeholder'=>'Search...']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    <div class="panel panel-default tar-sidebar-panel">
        <div class="panel-heading">标签云</div>
        <div class="panel-body tar-tags-box">
            <ul class="list-group">
                <li class="list-group-item pull-left"><a href="">标签</a></li>
                <li class="list-group-item pull-left"><a href="">标签</a></li>
                <li class="list-group-item pull-left"><a href="">标签</a></li>
                <li class="list-group-item pull-left"><a href="">标签</a></li>
                <li class="list-group-item pull-left"><a href="">大的标签</a></li>
                <li class="list-group-item pull-left"><a href="">大的标签</a></li>
                <li class="list-group-item pull-left"><a href="">大的标签</a></li>
                <li class="list-group-item pull-left"><a href="">大的标签</a></li>
                <li class="list-group-item pull-left"><a href="">小的</a></li>
                <li class="list-group-item pull-left"><a href="">超级大的的</a></li>
            </ul>
        </div>
    </div>

    <div class="panel panel-default tar-sidebar-panel">
        <div class="panel-heading">站点信息</div>
        <div class="panel-body">
            <ul class="list-group">
                <li class="list-group-item">鲁ICP备 1234567</li>
                <li class="list-group-item">Powered by Targaryen</li>
            </ul>
        </div>
    </div>
</div>