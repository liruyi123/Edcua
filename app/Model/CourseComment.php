<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseComment extends Model
{
    protected $table = 'course_comment';
    protected $primaryKey='c_id';
    public $timestamps=false;
}
