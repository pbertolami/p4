@extends('pages.layout')



@section('content')

    <h1>Enter The Contest</h1>
    <hr>

    <form method="POST" action="/profiles/create" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                {{csrf_field()}}

                <div class="form-group">

                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{old('first_name')}}">

                </div>

                <div class="form-group">

                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{old('last_name')}}">

                </div>

                <div class="form-group">

                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" value="{{old('street')}}">

                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{old('city')}}">

                </div>

                <div class="form-group">
                    <label for="zip">Zip/Postal Code:</label>
                    <input type="text" name="zip" id="zip" class="form-control" value="{{old('zip')}}">

                </div>
                <div class="form-group">
                    <label for="country">Country:</label>

                    <input type="text" name="country" id="country" class="form-control" value="{{old('country')}}">
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" name="state" id="state" class="form-control" value="{{old('state')}}">
                </div>

                <div class="form-group">
                    <label for="school">Name of School/University or NA:</label>
                    <input type="text" name="school" id="school" class="form-control" value="{{old('school')}}">
                </div>

                <hr>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="aria_one_name">First Aria Name:</label>
                    <input type="text" name="aria_one_name" id="aria_one_name" class="form-control" value="{{old('aria_one_name')}}">
                </div>

                <div class="form-group">
                    <label for="aria_one_link">First Aria: Youtube Clip:(note: Click share under your youtube clip and then click embeded. Highlight and copy entire line of code for the clip and paste into the form below. It should look something like this:
                        &lt;iframe width="560" height="315" src="https://www.youtube.com/embed/83Rq0QujOw0" frameborder="0" allowfullscreen&gt;&lt/iframe&gt</label>"
                    <input type="text" name="aria_one_link" id="aria_one_link" class="form-control" value=" {{old('aria_one_link')}}">
                </div>

                <div class="form-group">
                    <label for="aria_two_name">Showcase Piece Name(Aria, Musical Theater, Jazz, Pop, or Other):</label>
                    <input type="text" name="aria_two_name" id="aria_two_name" class="form-control" value="{{old('aria_two_name')}}">
                 </div>

                <div class="form-group">
                    <label for="aria_two_link">Showcase URL: Youtube Clip:(note: Click share under your youtube clip and then click embeded. Highlight and copy entire line of code for the clip and paste into the form below. It should look something like this:
                        &lt;iframe width="560" height="315" src="https://www.youtube.com/embed/83Rq0QujOw0" frameborder="0" allowfullscreen&gt;&lt/iframe&gt</label>
                    <input type="text" name="aria_two_link" id="aria_two_link" class="form-control" value=" {{old('aria_two_link')}}">
                </div>

            <div class="form-group">
                <label for="description">Give us a short description of who you are and what your all about</label>
                            <textarea type="text" name="description" id="description" class="form-control" rows="10"></textarea>

                </div>

                <div class="form-group">
                    <label for="mp3">Music File mp3 Only:</label>
                    <input type="file" name="mp3" id="mp3" class="form-control" value="{{old('mp3')}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create Flyer</button>
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
