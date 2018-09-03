<?php

namespace Tests\Feature;

use App\Contracts\API\SchoolClassInterface;
use App\SchoolClass;
use App\User;
use App\UserSchoolClasses;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContractableSchoolClassTest extends TestCase
{
    public function test_create_a_class()
    {
        $schoolClass = app()->make(SchoolClassInterface::class)->create([
            'name' => '5c'
        ]);

        $this->assertInstanceOf(SchoolClass::class, $schoolClass);
    }

    public function test_ad_students_to_a_class()
    {
        $students = factory(User::class, 50)->create()->each(function($u) {
            $u->assignRole('Student');
        });

        $repo = app()->make(SchoolClassInterface::class);

        $schoolClass = $repo->create([
            'name' => '5c'
        ]);

        $schoolClass = $repo->adStudents($schoolClass, $students, Carbon::now(), Carbon::now()->addMonths(12));

        $this->assertEquals(50, $schoolClass->users->count());

        $this->assertEquals(50, UserSchoolClasses::count());

        $this->assertEquals(50, $schoolClass->getStudents()->count());
    }
}
