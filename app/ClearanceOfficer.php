<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClearanceOfficer extends Model
{
    //
    protected $guarded =[];

    public function officeable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function inchargeOf()
    {
        return $this->morphedByMany('App\Post', 'taggable');
    }
}
