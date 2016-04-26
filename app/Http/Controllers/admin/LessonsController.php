<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\LessonInterface;
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
}
