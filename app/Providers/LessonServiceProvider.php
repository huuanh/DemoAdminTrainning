<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LessonServiceProvider extends ServiceProvider {
    public function boot() {}

    public function register() {
        $this->app->bind(\App\Repositories\Eloquent\LessonRepository::class, \App\Repositories\Eloquent\DbLessonRepository::class);
    }
}