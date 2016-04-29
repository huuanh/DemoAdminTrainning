<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\LessonRepository;

use App\Models\Lesson;

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
            return $lesson;
        }
        else return null;
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
            return $lesson;
        }
        else return null;
    }

    public function destroy($id) {
        $lesson = Lesson::find($id);
        if($lesson->delete()) {
            return $lesson;
        }
        else return null;
    }
}