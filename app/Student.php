<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded =[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    public function department(){
        return $this->belongsTo(AcademicDepartment::class);
    }
}
