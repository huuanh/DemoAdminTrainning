<?php

namespace App\Repositories\Eloquent;
use App\Model\Lesson;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class DbLessonCsvRepository implements LessonCsvRepository {
    public function downloadExcel($type) {
        $data = Lesson::get()->toArray();
        return Excel::create('CSVLesson', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function importExcel() {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = ['lessonCode' => $value->lessoncode, 'type_id' => $value->type_id,
                        'part_id' => $value->part_id, 'pre_lesson_id' => $value->pre_lesson_id,
                        'lesson' => $value->lesson, 'content' => $value->content, ];
                }
                if(!empty($insert)){
                    DB::table('lessons')->insert($insert);
                    return redirect()
                        ->route('admin.lessons.index');
                }
            }
        }
        return back();
    }
}