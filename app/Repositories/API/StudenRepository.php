<?php
/**
 * Created by PhpStorm.
 * User: danielkoch
 * Date: 20.08.18
 * Time: 08:59
 */

namespace App\Repositories\API;


use App\Contracts\API\StudentInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

class StudenRepository implements StudentInterface
{
    public function create(string $name, string $email, string $password): User
    {
        /** @var User $user */
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $user->assignRole('Student');

        return $user;
    }
}