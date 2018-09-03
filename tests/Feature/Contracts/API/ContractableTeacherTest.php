<?php

namespace Tests\Feature;

use App\Contracts\API\TeacherInterface;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContractableTeacherTest extends TestCase
{
    /** @test */
    public function can_create_a_teacher()
    {
        /** @var User $user */
        $user = (app()->make(TeacherInterface::class))
            ->create('me', 'me@devports.de', 'test');

        $this->assertFalse($user->hasAllPermissions(['CreateClass', 'ReadClass', 'DeleteClass']));

        $this->assertTrue($user->hasAllPermissions(['ReadClass', 'ReadSchoolYear', 'ReadCalendar']));

        $this->assertTrue($user->hasRole('Teacher'));
    }
}
