<?php
/**
 * Created by PhpStorm.
 * User: danielkoch
 * Date: 01.09.18
 * Time: 11:28
 */

namespace App\Contracts\API;


use App\SchoolClass;
use Carbon\Carbon;
use Illuminate\Support\Collection;

interface SchoolClassInterface
{
    public function create(array $attributes): SchoolClass;

    public function adStudents(SchoolClass $schoolClass, Collection $students, Carbon $from, Carbon $to): SchoolClass;
}