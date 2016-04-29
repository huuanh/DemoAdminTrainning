<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {
    public function boot() {}

    public function register() {
        $this->app->bind(\App\Repositories\Interfaces\LessonRepository::class, \App\Repositories\Eloquents\DbLessonRepository::class);
    }
}