<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NavbarModel extends Model
{
    protected $table="navbar";
    protected $primaryKey="nav_id";
     public $timestamps = false;
}
