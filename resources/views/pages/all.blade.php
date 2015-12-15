@extends('pages.layout')

@section('all profiles')
    All Profiles Show only profiles to authorized user
@stop

@section('content')

    <h1>Congratulations you have entered the competition review your profile below and edit or delete it.</h1>

    @if(sizeof($profiles) == 0)
        You have not added any Profile.
    @else
        @foreach($profiles as $profile)
            <p>{{$profile->first_name}} {{$profile->last_name}}</p>
            <p>{{$profile->street}}</p>
            <p>{{$profile->city}}</p>
            <p>{{$profile->zip}}</p>
            <p>{{$profile->country}}</p>
            <p>{{$profile->state}}</p>
            <p>{{$profile->school}}</p>


            <div>
                <h2>Music selection aria one: {{$profile->aria_one_name}}</h2>
                {!!($profile->aria_one_link)!!}
                <h2>Music selection showcase piece: {{$profile->aria_two_name}}</h2>
                {!!($profile->aria_two_link)!!}
                <a href='/profiles/edit/{{$profile->id}}'>Edit </a>
                <a href='/profiles/delete/{{$profile->id}}'>Delete</a><br>

            </div>
        @endforeach
    @endif

@stop