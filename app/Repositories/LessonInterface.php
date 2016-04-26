<?php

namespace App\Repositories;

interface LessonInterface {
    public function getAllLesson();

    public function findById($id);

    public function create($request);

    public function update($request);

    public function destroy($id);
}