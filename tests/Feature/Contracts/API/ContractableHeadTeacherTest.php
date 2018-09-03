<?php

namespace Tests\Feature;

use App\Contracts\API\HeadteacherInterface;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContractableHeadTeacherTest extends TestCase
{
    /** @test */
    public function can_create_a_headteacher()
    {
        /** @var User $user */
        $user = (app()->make(HeadteacherInterface::class))
            ->create('me', 'me@devports.de', 'test');

        $this->assertTrue($user->hasAllPermissions(['CreateClass', 'ReadClass', 'DeleteClass']));


    }
}
