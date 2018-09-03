<?php

use Illuminate\Database\Seeder;

class StartingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \App\User $theAllknownGod */
        $theAllknownGod = \App\User::create([
            'name' => 'Daniel Koch',
            'email' => 'dk.projects.manager@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make(env('ALL_KNOWN_GOD_PASSWORD'))
        ]);

        $theAllknownGod->assignRole([
            'HeadTeacher', 'Teacher', 'Student'
        ]);
    }
}
