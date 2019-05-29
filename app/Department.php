<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable =['name'];

    public function officers()
    {
        return $this->morphMany('App\ClearanceOfficer', 'officeable');
    }
    
    public function clearances()
    {
        return $this->morphMany('App\Clearance', 'departmentable');
    }
}
