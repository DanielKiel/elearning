<?php

namespace App\Providers;

use App\Contracts\API\HeadteacherInterface;
use App\Contracts\API\SchoolClassInterface;
use App\Contracts\API\StudentInterface;
use App\Contracts\API\TeacherInterface;
use App\Repositories\API\HeadteacherRepository;
use App\Repositories\API\SchoolClassRepository;
use App\Repositories\API\StudenRepository;
use App\Repositories\API\TeacherRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->makeBindings();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function makeBindings()
    {
        $this->app->bind(HeadteacherInterface::class, HeadteacherRepository::class);

        $this->app->bind(TeacherInterface::class, TeacherRepository::class);

        $this->app->bind(StudentInterface::class, StudenRepository::class);

        $this->app->bind(SchoolClassInterface::class, SchoolClassRepository::class);
    }
}
