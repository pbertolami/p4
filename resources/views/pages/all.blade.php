@extends('pages.layout')

@section('all profiles')
    All Profiles Show only profiles to authorized user
@stop

@section('content')

    <h1>Congratulations you have entered the competition review your profile below and edit or delete it.</h1>
    <div class="row"></div>
        <fieldset>
            <div class="col-md-12">
                @if(sizeof($profiles) == 0)
                    <p>You have not added any Profile.</p>
                @else
                    @foreach($profiles as $profile)
                        <h3>{{$profile->first_name}} {{$profile->last_name}}</h3>
                        <h3>{{$profile->street}} {{$profile->city}},{{$profile->state}} {{$profile->zip}}</h3>
                        <h3>{{$profile->country}}</h3>

                        <h3>School: {{$profile->school}}</h3>
                        </div>

                        <div class ="col-md-5">
                            <h2>Music selection aria one: {{$profile->aria_one_name}}</h2>
                            {!!($profile->aria_one_link)!!}
                        </div>

                        <div class="col-md-6">
                            <h2>Music selection showcase piece: {{$profile->aria_two_name}}</h2>
                            {!!($profile->aria_two_link)!!}
                        </div>

                        <div class="col-md-12">
                            <p><a class="btn btn-primary btn-lg btn-block" href='/profiles/edit/{{$profile->id}}' role="button">Edit</a></p>
                            <p><a class="btn btn-primary btn-lg btn-block" href='/profiles/delete/{{$profile->id}}' role="button">Delete</a></p>
                            <p><a class="btn btn-primary btn-lg btn-block" href='/profiles/show/{{$profile->first_name}}/{{$profile->last_name}}' role="button">Add Photos</a></p>
                        </div>
                    @endforeach
                @endif

        </fieldset>

    <fieldset>
        <div class="col-md-8" gallery>
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
    </div>
    <hr>


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


