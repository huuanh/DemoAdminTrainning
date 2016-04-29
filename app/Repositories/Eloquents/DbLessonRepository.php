<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\LessonRepository;

use App\Models\Lesson;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class DbLessonRepository implements LessonRepository {
    public function getAllLesson() {
        return Lesson::all();
    }

    public function findById($id) {
        return Lesson::find($id);
    }

    public function newLesson() {
        return new Lesson;
    }

    public function create($request) {
        $lesson = new Lesson;
        $lesson->type_id = $request['type_id'];
        $lesson->part_id = $request['part_id'];
        $lesson->lesson = $request['lesson'];
        if($request['preview'] == 'true') {
            $lesson->pre_lesson_id = $request['pre_lesson_id'];
        } else {
            $lesson->pre_lesson_id = 0;
        }
        $lesson->content = $request['content'];
        $lesson->lessonCode = $request['lessonCode'];
        if ($lesson->save()) {
            Session::flash('flash_message','Successfully created lesson.');
            return $lesson;
        }
        else {
            Session::flash('flash_danger','Sorry, please config something and try again :D');
            return null;
        }
    }

    public function edit($id) {
        return Lesson::find($id);
    }

    public function update($request, $id) {
        $lesson = Lesson::find($id);
        $lesson->type_id = $request['type_id'];
        $lesson->part_id = $request['part_id'];
        $lesson->lesson = $request['lesson'];
        if($request['preview'] == 'true') {
            $lesson->pre_lesson_id = $request['pre_lesson_id'];
        } else {
            $lesson->pre_lesson_id = 0;
        }
        $lesson->content = $request['content'];
        $lesson->lessonCode = $request['lessonCode'];
        if ($lesson->save()) {
            Session::flash('flash_message','Successfully edited lesson.');
            return $lesson;
        }
        else {
            Session::flash('flash_danger','Sorry, please config something and try again :D');
            return null;
        }
    }

    public function destroy($id) {
        $lesson = Lesson::find($id);
        if($lesson->delete()) {
            Session::flash('flash_warning','Lesson has been destroy!!!');
            return $lesson;
        }
        else {
            Session::flash('flash_danger','Sorry, but something went wrong!! :D');
            return null;
        }
    }

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
                    Session::flash('flash_message','Csv successfully import to Db.');
                    return redirect()
                        ->route('admin.lessons.index');
                } else Session::flash('flash_danger','Please recheck format Csv file!!');
            }
        }
        return back();
    }
}