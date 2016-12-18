@extends('common._modal')
@section('rich-content')
    <div class="form-group">
        <div class="tar-cps-upfile">
            <span class="glyphicon glyphicon-cloud-upload"></span>
            {!! Form::input('file', 'upload_file', '', ['multiple' => 'multiple', 'accept' => 'image/*']) !!}
            {!! Form::hidden('article_title') !!}
            {!! Form::hidden('article_id') !!}
        </div>
        <div class="progress tar-cps-bnrprgrs">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                <span class="sr-only">45% Complete</span>
            </div>
        </div>
    </div>
@endsection