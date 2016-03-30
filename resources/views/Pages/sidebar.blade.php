<div class="col-md-4">
    {!! Form::open(['action'=>'SearchesController@search','class'=>'form-inline','method'=>'GET']) !!}
    <div class="form-group">
        {!! Form::submit('Search',['class'=>'btn btn-primary form-control']) !!}
        <div class="input-group">
            {!! Form::input('text','search','',['class' => 'form-control','placeholder'=>'Search...']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>