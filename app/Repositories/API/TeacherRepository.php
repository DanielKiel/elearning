<?php
/**
 * Created by PhpStorm.
 * User: danielkoch
 * Date: 20.08.18
 * Time: 08:58
 */

namespace App\Repositories\API;


use App\Contracts\API\TeacherInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherInterface
{
    public function create(string $name, string $email, string $password): User
    {
        /** @var User $user */
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $user->assignRole('Teacher');

        return $user;
    }
}