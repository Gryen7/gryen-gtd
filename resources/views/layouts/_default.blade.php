@include('pages._head')
@include('pages._nav')
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>
@include('errors._list')
@include('pages._foot')