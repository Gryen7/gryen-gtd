@extends('common._modal')
@section('rich-content')
    <div class="form-group">
        <button class="btn btn-default tar-cps-upfile">
        <span>Upload</span>
        {!! Form::input('file', 'upload_file', '', ['multiple' => 'multiple', 'accept' => 'image/*']) !!}
        {!! Form::hidden('article_title') !!}
        {!! Form::hidden('article_id') !!}
        </button>
    </div>
@endsection