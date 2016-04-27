<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LessonCsvServiceProvider extends ServiceProvider {
    public function boot() {}

    public function register() {
        $this->app->bind(\App\Repositories\LessonCsv\LessonCsvInterface::class, \App\Repositories\LessonCsv\LessonCsvRepository::class);
    }
}