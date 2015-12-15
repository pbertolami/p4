@extends('pages.layout')


@section('content')
    <fieldset>
        <div class="row"></div>
        <div class="col-md-3">

            <h1>{!! ($profile->description)!!}</h1>
            <h2>{!! ($profile->last_name )!!}</h2>
            {!!( $profile->aria_one_link )!!}

            <hr>

            <div class="description">{!! nl2br($profile->description) !!}</div>
        </div>
    </fieldset>
