<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class SchoolClass extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, (new UserSchoolClasses())->getTable(), 'schoolClassId','userId')
            ->using(UserSchoolClasses::class);
    }

    public function getStudents(): Collection
    {
        return $this->users->filter(function($user) {
            return $user->hasRole('Student');
        });
    }
}
