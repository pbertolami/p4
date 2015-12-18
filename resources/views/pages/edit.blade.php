@extends('pages.layout')



@section('content')

    <h1>Edit Your Entry</h1>
    <hr>

    <form method="POST" action="/profiles/edit" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{ $profile->id }}">
        <div class="row">
            <div class="col-md-6">
                {{csrf_field()}}

                <div class="form-group">

                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{$profile->first_name}}">

                </div>

                <div class="form-group">

                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{$profile->last_name}}">

                </div>

                <div class="form-group">

                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" value="{{$profile->street}}">

                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{$profile->city}}">

                </div>

                <div class="form-group">
                    <label for="zip">Zip/Postal Code:</label>
                    <input type="text" name="zip" id="zip" class="form-control" value="{{$profile->zip}}">

                </div>
                <div class="form-group">
                    <label for="country">Country:</label>

                    <input type="text" name="country" id="country" class="form-control" value="{{$profile->country}}">
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" name="state" id="state" class="form-control" value="{{$profile->state}}">
                </div>

                <div class="form-group">
                    <label for="school">Name of School/University or NA:</label>
                    <input type="text" name="school" id="school" class="form-control" value="{{$profile->school}}">
                </div>

                <hr>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="aria_one_name">First Aria Name:</label>
                    <input type="text" name="aria_one_name" id="aria_one_name" class="form-control" value="{{$profile->aria_one_name}}">
                </div>

                <div class="form-group">
                    <label for="aria_one_link">First Aria Youtube Clip:</label>
                    <input type="text" name="aria_one_link" id="aria_one_link" class="form-control" value=" {{$profile->aria_one_link}}">
                </div>

                <div class="form-group">
                    <label for="aria_two_name">Showcase Piece Name(Aria, Musical Theater, Jazz, Pop, or Other):</label>
                    <input type="text" name="aria_two_name" id="aria_two_name" class="form-control" value="{{$profile->aria_two_name}}">
                </div>

                <div class="form-group">
                    <label for="aria_two_link">Showcase Youtube Clip:</label>
                    <input type="text" name="aria_two_link" id="aria_two_link" class="form-control" value=" {{$profile->aria_two_link}}">
                </div>

                <div class="form-group">
                    <label for="description">Give us a short description of who you are and what your all about</label>
                            <textarea type="text" name="description" id="description" class="form-control" rows="10">
                                {{$profile->description}}
                            </textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Edit Profile</button>
                </div>
            </div>
        </div>
    </form>
    <div>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

@stop
