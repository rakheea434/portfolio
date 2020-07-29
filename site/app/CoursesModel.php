<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursesModel extends Model {
    public $table = 'courses';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
