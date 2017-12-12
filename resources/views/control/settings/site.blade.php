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
                            <span class="input-group-addon">主标题</span>
                            {{ Form::text('siteTitle', '', ['class' => 'form-control', 'id' => 'siteTitle', 'placeholder' => isset($CONFIG->SITE_TITLE) ? $CONFIG->SITE_TITLE : '默认标题']) }}
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" id="siteTitleBtn">设置</button>
                            </span>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">副标题</span>
                            {{ Form::text('siteSubTitle', '', ['class' => 'form-control', 'id' => 'siteSubTitle', 'placeholder' => isset($CONFIG->SITE_SUB_TITLE) ? $CONFIG->SITE_SUB_TITLE : '默认副标题']) }}
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" id="siteSubTitleBtn">设置</button>
                            </span>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">关键字</span>
                            {{ Form::text('siteKeywords', '', ['class' => 'form-control', 'id' => 'siteKeywords', 'placeholder' => isset($CONFIG->SITE_KEYWORDS) ? $CONFIG->SITE_KEYWORDS : '默认关键字']) }}
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" id="siteKeywordsBtn">设置</button>
                            </span>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">描&nbsp;&nbsp;&nbsp;述</span>
                            {{ Form::text('siteDescription', '', ['class' => 'form-control', 'id' => 'siteDescription', 'placeholder' => isset($CONFIG->SITE_DESCRIPTION) ? $CONFIG->SITE_DESCRIPTION : '默认描述']) }}
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" id="siteDescriptionBtn">设置</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingDetaultImage">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseDefaultImage" aria-expanded="true" aria-controls="collapseDefaultImage">
                            站点默认图片
                        </a>
                    </h4>
                </div>
                <div id="collapseDefaultImage" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingDetaultImage">
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-addon">默认图</span>
                            {{ Form::text('siteDefaultImage', '', ['class' => 'form-control', 'id' => 'siteDefaultImage', 'placeholder' => isset($CONFIG->SITE_DEFAULT_IMAGE) ? $CONFIG->SITE_DEFAULT_IMAGE : '默认图']) }}
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" id="siteDefaultImageBtn">设置</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingAnalyticsCode">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseAnalyticsCode" aria-expanded="true" aria-controls="collapseAnalyticsCode">
                        统计代码
                    </a>
                </h4>
            </div>
            <div id="collapseAnalyticsCode" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAnalyticsCode">
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($analyticsCodes as $code)
                            <li class="list-group-item">
                                <div class="input-group">
                                    <span class="input-group-addon">{{ $code->config_name }}</span>
                                    {{ Form::text('', $code->config_value, ['class' => 'form-control', 'disabled']) }}
                                    <span class="input-group-btn">
                                <button class="btn btn-danger" type="button">删除</button>
                                </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{ Form::open(['action' => 'Control\SiteController@addAnalyticsCode', 'id' => 'addAnalyticsCodeForm', 'autocomplete' => 'off']) }}
                    <div class="form-group">
                    {{ Form::text('config_name', null, ['class' => 'form-control', 'placeholder' => '统计代码名称']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('config', null, ['class' => 'form-control', 'placeholder' => '统计代码代号']) }}
                    </div>
                    <div class="form-group">
                    {{ Form::textarea('config_value', null, ['class' => 'form-control', 'id' => 'analyticsCode', 'placeholder' => '统计代码...']) }}
                    </div>
                    <div class="form-group">
                    {{ Form::button('添加', ['class' => 'btn btn-success form-control', 'id' => 'addAnalyticsCodeBtn']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@stop
