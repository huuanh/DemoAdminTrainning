<?php

namespace App\Repositories\Interfaces;

interface LessonCsvRepository {
    public function downloadExcel($type);

    public function importExcel();
}