<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserSchoolClasses extends Pivot
{
    protected $table = 'user_school_classes';

    protected $fillable = ['schoolClassId','userId', 'from', 'to'];
}
