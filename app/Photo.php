<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;
use Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    //create the table 'profile_photos'
    //set up the fillable fields in the table
    protected $table = 'profile_photos';

    protected $fillable = ['photo_name','photo_path','thumbnail_path'];

    protected $baseDir = 'images/photos';

    public function profile()
    {
        return $this->belongsTo('P4\Profile');
    }

    public static function named($name){
        $photo = new static;
        return $photo->saveAs($name);

    }
    /*
     * saveAs function saves the name of the original photo file plus the time;
     * the path which is the baseDir and the newly created name;
     * and the thumbnail_path which is the baseDir/thumb plus the newley created name and saves all these properties into a variable $name
     * when the saveAs method is called from the public static function fileName($name) above.
     */
    public function saveAs($name){
        $this->photo_name = sprintf('%s-%s', time(), $name);
        $this->photo_path = sprintf('%s/%s', $this->baseDir, $this->photo_name);
        $this->thumbnail_path = sprintf('%s/tn-%s', $this->baseDir, $this->photo_name);

        return $this;
    }
    public function move(UploadedFile $file){
        $file->move($this->baseDir, $this->photo_name);
        $this->makeThumbnail();
        return $this;
    }
    /*
     * Note this funciton uses the intervention
     */
    public function makeThumbnail(){
        Image::make($this->photo_path)
            ->fit(200)
            ->save($this->thumbnail_path);
    }

}
