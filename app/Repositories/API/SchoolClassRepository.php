<?php
/**
 * Created by PhpStorm.
 * User: danielkoch
 * Date: 01.09.18
 * Time: 11:30
 */

namespace App\Repositories\API;


use App\Contracts\API\SchoolClassInterface;
use App\Exceptions\HasNoValidRole;
use App\SchoolClass;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class SchoolClassRepository implements SchoolClassInterface
{
    public function create(array $attributes): SchoolClass
    {
       return SchoolClass::create($attributes);
    }

    public function adStudents(SchoolClass $schoolClass, Collection $students, Carbon $from, Carbon $to): SchoolClass
    {
        /** @var User $student */
        foreach ($students as $student) {
            if (! $student instanceof User) {
                throw new HasNoValidRole('only user instances are allowed when adding students to a class');
            }

            if (! $student->hasRole('Student')) {
                throw new HasNoValidRole('user must be a student when adding students to a class');
            }
        }

        $assignment = [];

        $students->each(function($student) use(&$assignment, $from, $to){
            array_set($assignment, $student->id,['from' => $from, 'to' => $to]);
        });

        $schoolClass->users()->attach($assignment);

        return $schoolClass->fresh();
    }

    public function removeStudents(SchoolClass $schoolClass, Collection $students): SchoolClass
    {

    }

    public function syncStudents(SchoolClass $schoolClass, Collection $students): SchoolClass
    {

    }
}