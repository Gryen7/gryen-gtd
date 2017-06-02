@extends('layouts._default', [
    'module' => 'handicraft-list',
    'noJsLoad' => true,
    'vue' => true
])
@section('content')
    <div id="handicraftApp">
        <handicraft-list></handicraft-list>
    </div>
@endsection