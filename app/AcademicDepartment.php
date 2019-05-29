<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicDepartment extends Model
{
    protected $fillable =['name', 'faculty_id'];

    public function faculty()
    {
       return $this->belongsTo(Faculty::class);
    }

    public function officers()
    {
        return $this->morphMany('App\ClearanceOfficer', 'officeable');
    }

    public function clearances()
    {
        return $this->morphMany('App\Clearance', 'departmentable');
    }
}
