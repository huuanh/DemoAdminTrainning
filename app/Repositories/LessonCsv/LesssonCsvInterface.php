<?php

namespace App\Repositories\LessonCsv;

interface LessonCsvInterface {
    public function downloadExcel($type);

    public function importExcel();
}