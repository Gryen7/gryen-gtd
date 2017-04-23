@foreach($files as $file)
    <div class="t-ctl-flbx"
         data-container="body"
         data-placement="top"
         data-content="{{ $file }}">
        <img class="btn img-thumbnail lazy"
             data-original="{{ imageView2($file, ['w' => 248]) }}" src="" alt="..."
             >
        <div class="t-ctl-floprtn text-right hidden">
            <button class="btn btn-danger">删除</button>
        </div>
    </div>
@endforeach