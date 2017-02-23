@extends('control.settings')
@section('content')
    <div class="col-xs-6">
        <div class="panel-group" id="siteSettingAccordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-info">
                <div class="panel-heading" role="tab" id="headingSiteInfo">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSiteInfo" aria-expanded="true"
                           aria-controls="collapseSiteInfo">
                            站点信息
                        </a>
                    </h4>
                </div>
                <div id="collapseSiteInfo" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="headingSiteInfo">
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">站点标题</span>
                            {{ Form::input('text', 'siteTitle', '', ['class' => 'form-control', 'id' => 'siteTitle', 'placeholder' => isset($config->SITE_TITLE) ? $config->SITE_TITLE : '站点标题']) }}
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" id="siteTitleBtn">确定</button>
                            </span>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">站点副标题</span>
                            {{ Form::input('text', 'siteSubTitle', '', ['class' => 'form-control', 'id' => 'siteSubTitle', 'placeholder' => isset($config->SITE_SUB_TITLE) ? $config->SITE_SUB_TITLE : '站点副标题']) }}
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" id="siteSubTitleBtn">确定</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading" role="tab" id="headingSiteImageQ">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSiteImageQ"
                           aria-expanded="true" aria-controls="collapseSiteImageQ">
                            站点图片质量管理
                        </a>
                    </h4>
                </div>
                <div id="collapseSiteImageQ" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="headingSiteImageQ">
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-xs-6">

    </div>
@stop