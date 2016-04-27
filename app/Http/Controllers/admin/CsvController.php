<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Repositories\Eloquent\LessonCsvRepository;

class CsvController extends Controller
{
    public function __construct(LessonCsvRepository $csv) {
        $this->csv = $csv;
    }

    public function importExport()
    {
        return view('admin.lessonCsv.importExport');
    }

    public function downloadExcel($type)
    {
        $this->csv->downloadExcel($type);
    }

    public function importExcel()
    {
        $this->csv->importExcel();
    }
}
