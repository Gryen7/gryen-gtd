@foreach($files as $file)
    <div class="t-ctl-flbx">
        <img class="btn img-thumbnail lazy"
             data-container="body"
             data-toggle="popover"
             data-placement="top"
             data-content="{{ $file }}"
             data-original="{{ imageView2($file, ['w' => 248]) }}" src="" alt="..."
             >
        <div class="t-ctl-floprtn text-right">
            <button class="btn btn-danger">删除</button>
        </div>
    </div>
@endforeach