<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LessonServiceProvider extends ServiceProvider {
    public function boot() {}

    public function register() {
        $this->app->bind(\App\Repositories\LessonInterface::class, \App\Repositories\DbLessonRepository::class);
    }
}