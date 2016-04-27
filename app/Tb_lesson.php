<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tb_lesson extends Model
{
    //
    public $fillable = ['lessonCode','type_id','part_id','pre_lesson_id','lesson','content'];
}
