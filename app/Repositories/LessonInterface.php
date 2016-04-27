<?php

namespace App\Repositories;

interface LessonInterface {
    public function getAllLesson();

    public function findById($id);

    public function newLesson();

    public function create($request);

    public function edit($id);

    public function update($request, $id);

    public function destroy($id);
}