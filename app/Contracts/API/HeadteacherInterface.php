<?php
/**
 * Created by PhpStorm.
 * User: danielkoch
 * Date: 20.08.18
 * Time: 08:45
 */

namespace App\Contracts\API;


use App\User;

interface HeadteacherInterface
{
    public function create(string $name, string $email, string $password): User;
}