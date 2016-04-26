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

    public function create($request) {}

    public function update($request) {}

    public function destroy($id) {}
}