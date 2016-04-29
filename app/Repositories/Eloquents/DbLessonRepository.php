<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\LessonRepository;

use App\Models\Lesson;
use Illuminate\Support\Facades\Session;

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
}