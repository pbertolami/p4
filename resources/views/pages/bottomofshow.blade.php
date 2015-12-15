
<fieldset>
    <div class="col-md-9" gallery>
        @foreach($profile->photos->chunk(4)as $set)
            <div class="row">
                @foreach($set as $photo)
                    <div class="col-md-3" gallery_image>
                        <img src ="/{{$photo->thumbnail_path}}" alt="">
                    </div>
                @endforeach

            </div>

        @endforeach
    </div>
</fieldset>



<hr>

<h2>Add Your Photos</h2>
<form id="addPhotosForm" action="{{route('store_photo_path', [$profile->zip, $profile->street])}}"
      method="POST"
      class="dropzone">
    {{ csrf_field() }}
</form>


@stop

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            maxFilesize: 8,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp, .mp3'
        };
    </script>
