<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Profile extends Model
{

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'street',
        'city',
        'zip',
        'state',
        'country',
        'school',
        'aria_one_name',
        'aria_one_link',
        'aria_two_name',
        'aria_two_link',
        'description'
    ];


    /*
     * find a profile of a person by last_name
     * Note: I could also use a scope query like so
     *
     * public function scopeWho($query, $last_name){
     * return $query->where(compact('last_name'))->firstOrFail();
     * }
     * They said in class not to use static methods but I forget why
     *
     * POSSIBLY DELETE THIS
     */
    public static function who($first_name,$last_name){
        return static::where(compact('first_name','last_name'))->firstOrFail();

    }

    public function addPhoto(Photo $photo){

        return $this->photos()->save($photo);
    }
    /**
     * A profile can have more than one (photo/headshot), probably
     * only need one but want to have the flexibility for more than one.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('P4\Photo');
    }
    public function user(){
        return $this->belongsTo('\P4\User');
    }

}
