<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ZkaiServiceProvider extends ServiceProvider {
    public function boot() {}

    public function register() {
        $this->app->bind(\App\Repositories\Interfaces\LessonCsvRepository::class, \App\Repositories\Eloquents\DbLessonCsvRepository::class);
        $this->app->bind(\App\Repositories\Interfaces\LessonRepository::class, \App\Repositories\Eloquents\DbLessonRepository::class);
    }
}