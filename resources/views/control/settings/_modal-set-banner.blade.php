@extends('common._modal')
@section('rich-content')
    <div class="form-group">
        <a href="javascript:void(0)" class="tar-cps-upfile">
        <span>Upload</span>
        {!! Form::input('file', 'Upload', '', ['multiple' => 'multiple', 'accept' => 'image/*']) !!}
        </a>
    </div>
@endsection