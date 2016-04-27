<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LessonServiceProvider extends ServiceProvider {
    public function boot() {}

    public function register() {
        $this->app->bind(\App\Repositories\Lessons\LessonInterface::class, \App\Repositories\Lessons\DbLessonRepository::class);
    }
}