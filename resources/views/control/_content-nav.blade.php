<div class="navbar navbar-default tar-ctl-navbar">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <div class="navbar-left">
                @yield('subNavigation')
            </div>
            <div class="navbar-right">
                <a class="btn btn-default navbar-btn" href="{{ action('ControlPanelController@settings') }}">
                    <span class="glyphicon glyphicon-cog" data-toggle="tooltip" data-placement="top"
                          title="设置"></span>
                </a>
            </div>
        </div>
    </div>
</div>