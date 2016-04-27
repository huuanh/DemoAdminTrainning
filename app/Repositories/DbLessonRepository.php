<?php

namespace App\Repositories;

use App\Tb_lesson;

class DbLessonRepository implements LessonInterface {
    public function getAllLesson() {
        return Tb_lesson::all();
    }

    public function findById($id) {
        return Tb_lesson::find($id);
    }

    public function newLesson() {
        return new Tb_lesson;
    }

    public function create($request) {
        $lesson = new Tb_lesson;
        $lesson->type_id = $request['type_id'];
        $lesson->part_id = $request['part_id'];
        $lesson->lesson = $request['lesson'];
        if($request['preview'] == 'true') {
            $lesson->pre_lesson_id = $request['pre_lesson_id'];
        } else {
            $lesson->pre_lesson_id = null;
        }
        $lesson->content = $request['content'];
        $lesson->lessonCode = $request['lessonCode'];
        if ($lesson->save()) {
            return $lesson;
        }
        else return null;
    }

    public function edit($id) {
        return Tb_lesson::find($id);
    }

    public function update($request, $id) {
        $lesson = Tb_lesson::find($id);
        $lesson->type_id = $request['type_id'];
        $lesson->part_id = $request['part_id'];
        $lesson->lesson = $request['lesson'];
        if($request['preview'] == 'true') {
            $lesson->pre_lesson_id = $request['pre_lesson_id'];
        } else {
            $lesson->pre_lesson_id = null;
        }
        $lesson->content = $request['content'];
        $lesson->lessonCode = $request['lessonCode'];
        if ($lesson->save()) {
            return $lesson;
        }
        else return null;
    }

    public function destroy($id) {
        $lesson = Tb_lesson::find($id);
        if($lesson->delete()) {
            return $lesson;
        }
        else return null;
    }
}