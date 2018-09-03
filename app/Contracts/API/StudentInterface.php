<?php
/**
 * Created by PhpStorm.
 * User: danielkoch
 * Date: 20.08.18
 * Time: 08:58
 */

namespace App\Contracts\API;


use App\User;

interface StudentInterface
{
    public function create(string $name, string $email, string $password): User;
}