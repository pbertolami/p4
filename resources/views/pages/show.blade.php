@extends('pages.layout')


@section('content')
    <div class="row">
    <fieldset>

        <div class="col-md-12">
            <h1>Once you leave this page you can no longer update, delete, or access your profile.  Essentially you are locked into the contest. Good Luck and Thank You for your entry!!</h1>

                    <h3>{{$profile->first_name}} {{$profile->last_name}}</h3>
                    <h3>{{$profile->street}} {{$profile->city}},{{$profile->state}} {{$profile->zip}}</h3>
                    <h3>{{$profile->country}}</h3>

                    <h3>School: {{$profile->school}}</h3>
        </div>

        <div class="col-md-6">
                        <h3>Music selection aria one: {{$profile->aria_one_name}}</h3>
                        {!!($profile->aria_one_link)!!}
        </div>
        <div class="col-md-6">
                        <h3>Music selection showcase piece: {{$profile->aria_two_name}}</h3>
                        {!!($profile->aria_two_link)!!}
        </div>

    </fieldset>

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
        <fieldset>
            <div class="col-md-12">

                <div class="description">{!! nl2br($profile->description) !!}</div>
                <p><a class="btn btn-primary btn-lg btn-block" href='/profiles/edit/{{$profile->id}}' role="button">Edit</a></p>
                <p><a class="btn btn-primary btn-lg btn-block" href='/profiles/delete/{{$profile->id}}' role="button">Delete</a></p><br>
                <hr><br>

            </div>
        </fieldset>
    </div>



    <hr>

    <h2>Add Your Photos</h2>
    <form id="addPhotosForm" action="{{route('store_photo_path', [$profile->first_name, $profile->last_name])}}"
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
            maxFilesize: 15,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp,'
        };
    </script>
