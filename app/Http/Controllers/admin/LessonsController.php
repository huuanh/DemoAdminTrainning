<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Lessons\LessonInterface;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    public function __construct(LessonInterface $lesson) {
        $this->lesson = $lesson;
    }

    //
    public function index() {
        $lessons = $this->lesson->getAllLesson();
        return view('admin.lessons.index', compact('lessons'));
    }

    public function show($id) {
        $lesson = $this->lesson->findById($id);
        return view('admin.lessons.show', compact('lesson'));
    }

    public function create() {
        $lesson = $this->lesson->newLesson();
        return view('admin.lessons.create', compact('lesson'));
    }

    public function store(Request $request) {
        $this->lesson->create($request);
        return redirect()
        ->route('admin.lessons.index');
    }

    public function edit($id) {
        $lesson = $this->lesson->edit($id);
        return view('admin.lessons.edit', compact('lesson'));
    }

    public function update(Request $request, $id) {
        $this->lesson->update($request, $id);
        return redirect()
            ->route('admin.lessons.index');
    }

    public function destroy($id) {
        $this->lesson->destroy($id);
        return redirect()
            ->route('admin.lessons.index');
    }
}
