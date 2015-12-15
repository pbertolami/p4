<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

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
}
