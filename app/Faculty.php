<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $guarded =[];

    public function departments()
    {
        return $this->hasMany(AcademicDepartment::class);
    }
}
