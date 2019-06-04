<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clearance extends Model
{
    protected $guarded =[];

    public function departmentable()
    {
        return $this->morphTo();
    }

    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }

    public function clearedBy()
    {
        return $this->belongsTo('App\ClearanceOfficer', 'clearance_officer_id');
    }
}
