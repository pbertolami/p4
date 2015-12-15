<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

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
    /**
     * A profile can have more than one (photo/headshot), probably
     * only need one but want to have the flexability for more than one.
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
