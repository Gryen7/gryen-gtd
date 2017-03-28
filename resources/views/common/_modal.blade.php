<!-- Modal -->
<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog {{ $exClass or '' }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $modalTitle or ''}}</h4>
            </div>
            <div class="modal-body">
                {!! $modalContent or '' !!}
                @section('rich-content')
                @show
                {!! Form::hidden('tar-modal-ensure') !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ $esc or '取消'}}</button>
                <button type="button" class="tar-modal-ensurebtn btn btn-success">{{ $ok or '确定'}}</button>
            </div>
        </div>
    </div>
</div>