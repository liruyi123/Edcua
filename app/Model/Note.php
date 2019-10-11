<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
    protected $table = 'note';
    protected $primaryKey='note_id';
    public $timestamps=false;
}
