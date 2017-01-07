@extends('control.settings')
@section('content')
    <div class="col-xs-6">
        <div class="panel-group" id="siteSettingAccordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-info">
                <div class="panel-heading" role="tab" id="headingSiteInfo">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSiteInfo" aria-expanded="true" aria-controls="collapseSiteInfo">
                            Site Info
                        </a>
                    </h4>
                </div>
                <div id="collapseSiteInfo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSiteInfo">
                    <div class="panel-body">

                    </div>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading" role="tab" id="headingSiteImageQ">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSiteImageQ" aria-expanded="true" aria-controls="collapseSiteImageQ">
                            Site Images Quality Setting
                        </a>
                    </h4>
                </div>
                <div id="collapseSiteImageQ" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSiteImageQ">
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-xs-6">

    </div>
@stop