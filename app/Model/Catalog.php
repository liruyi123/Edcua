<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    //
    protected $table = 'catalog';
    protected $primaryKey='cata_id';
    public $timestamps=false;
}
