@extends('common._modal')
@section('rich-content')
    <div class="form-group">
        <button class="btn btn-default tar-cps-upfile">
        <span>Upload</span>
        {!! Form::input('file', 'upload_file', '', ['multiple' => 'multiple', 'accept' => 'image/*']) !!}
        </button>
    </div>
@endsection