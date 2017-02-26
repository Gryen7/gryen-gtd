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
                            <span class="input-group-addon" id="basic-addon1">主标题</span>
                            {{ Form::input('text', 'siteTitle', '', ['class' => 'form-control', 'id' => 'siteTitle', 'placeholder' => isset($CONFIG->SITE_TITLE) ? $CONFIG->SITE_TITLE : '默认标题']) }}
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" id="siteTitleBtn">设置</button>
                            </span>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">副标题</span>
                            {{ Form::input('text', 'siteSubTitle', '', ['class' => 'form-control', 'id' => 'siteSubTitle', 'placeholder' => isset($CONFIG->SITE_SUB_TITLE) ? $CONFIG->SITE_SUB_TITLE : '默认副标题']) }}
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" id="siteSubTitleBtn">设置</button>
                            </span>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">关键字</span>
                            {{ Form::input('text', 'siteKeywords', '', ['class' => 'form-control', 'id' => 'siteKeywords', 'placeholder' => isset($CONFIG->SITE_KEYWORDS) ? $CONFIG->SITE_KEYWORDS : '默认关键字']) }}
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" id="siteKeywordsBtn">设置</button>
                            </span>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">描&nbsp;&nbsp;&nbsp;述</span>
                            {{ Form::input('text', 'siteDescription', '', ['class' => 'form-control', 'id' => 'siteDescription', 'placeholder' => isset($CONFIG->SITE_DESCRIPTION) ? $CONFIG->SITE_DESCRIPTION : '默认描述']) }}
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" id="siteDescriptionBtn">设置</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-6">

    </div>
@stop