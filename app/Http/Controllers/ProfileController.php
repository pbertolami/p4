<?php

namespace P4\Http\Controllers;
use P4\Profile;
use P4\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use P4\Photo;
use P4\Http\Requests;
use P4\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProfileController extends Controller
{
    //Responds to requests to GET /books
    public function getIndex()
    {
        //this will return the home page
        return view('pages.home');

    }
    public function getAll(Request $request){
        //this will return all the profiles
        $profiles = \P4\Profile::where('user_id','=',\Auth::id())->orderBy('id','DESC')->get();
        //$profiles = \P4\Profile::findOrfail($request->all());

        //possibly create index view with all profiles
        return view('pages.all')->with('profiles', $profiles);
    }
    public function getCreate()
    {
        return view('pages.profile');
    }
    public function getAbout()
    {
        return view('pages.about');
    }
    public function postCreate(Requests\ProfileRequest $request){

        //validates the form using a profile request! see App/Requests/ProfileRequest

        //create the profile
        $profile = Profile::create($request->all());
        //Associate profile with the logged in user
        $profile->user_id = \Auth::id();
        $profile->save();
        //show a flash message
        \Session::flash('flash_message', "You have successfully created a Profile");
        //currently I redirect to the landing page (I wish to update this to redirect to their own page so they can see their profile and either update of add a photo)
        return redirect('profiles/all');

        }

    /**
     * Responds to requests to Get /profiles/edit/{$id}
     */
    public function getEdit($id = null){
        #Get this profile
        $profile = \P4\Profile::findOrFail($id);

        if(is_null($profile)){
            \Session::flash('flash_message','Profile not found');
            return redirect('\profiles');
        }
        else
            return view('pages.edit')->with(['profile'=>$profile]);
    }

    public function postEdit(Requests\ProfileRequest $request){

        //validates the form using a profile request! see App/Requests/ProfileRequest

        $profile =\P4\Profile::findOrfail($request->id);

        $input = $request->all();

        $profile->fill($input)->save();

        \Session::flash('flash_message', 'Successful Edit Good Job Buddy');

        return redirect('profiles/all');
    }


    //This is the delete function that I use when the button is pushed
    public function getDoDelete($profile_id) {

        $profile = \P4\Profile::findOrfail($profile_id);


        if(is_null($profile)){
            \Session::flash('flash_message','We could not find your profile associated with that id');
            return redirect('/profiles');
        }
            $profile->delete();
            \Session::flash('flash_message','The profile was deleted successfully');
            return redirect('/');
    }

    /*
     * this getShow shows the result of the static method who($last_name)
     * which shows the profile of a person by $last_name
     */
    public function getShow($first_name,$last_name)
    {
            $profile = Profile::who($first_name,$last_name);

            return view('pages.show')->with('profile', $profile);
    }
    public function addPhoto($first_name, $last_name, Request $request){

        $this->validate($request,[
            'photo'=> 'required|mimes:jpg,jpeg,png,bmp'
        ]);
        $photo = $this->makePhoto($request->file('photo'));
        //find the current profile and link to photo
        #Profile::where('user_id','=',\Auth::id())->addPhoto($photo);
        Profile::who($first_name, $last_name)->addPhoto($photo);
    }
    //this creates a photo named with the name of the person who uploaded it
    protected function makePhoto(UploadedFile $file){
        return Photo::named($file->getClientOriginalName())
            ->move($file);
    }


}
