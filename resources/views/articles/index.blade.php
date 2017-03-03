@extends('layouts._default', ['module' => 'article'])
@section('content')
   <div class="row">
       <div class="col-md-1"></div>
       <div class="col-md-10">
           @include('articles._list')
       </div>
       <div class="col-md-1"></div>
   </div>
@stop