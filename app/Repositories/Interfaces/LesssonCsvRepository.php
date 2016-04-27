<?php

namespace App\Repositories\Eloquent;

interface LessonCsvRepository {
    public function downloadExcel($type);

    public function importExcel();
}