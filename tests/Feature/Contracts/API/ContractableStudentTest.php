<?php

namespace Tests\Feature;

use App\Contracts\API\StudentInterface;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContractableStudentTest extends TestCase
{
    /** @test */
    public function can_create_a_student()
    {
        /** @var User $user */
        $user = (app()->make(StudentInterface::class))
            ->create('me', 'me@devports.de', 'test');

        $this->assertFalse($user->hasAllPermissions(['CreateClass', 'ReadClass', 'DeleteClass']));

        $this->assertTrue($user->hasAllPermissions(['ReadClass', 'ReadSchoolYear', 'ReadCalendar']));
    }
}
