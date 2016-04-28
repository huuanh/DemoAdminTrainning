<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    public $fillable = ['lessonCode','type_id','part_id','pre_lesson_id','lesson','content'];
}
