@extends('layouts._default', [
    'module' => 'article-list',
    'noJsLoad' => true
])
@section('content')
   @include('articles._list')
@stop