<?php

namespace App\Repositories\Interfaces;

interface LessonRepository {
    public function getAllLesson();

    public function findById($id);

    public function newLesson();

    public function create($request);

    public function edit($id);

    public function update($request, $id);

    public function destroy($id);
}