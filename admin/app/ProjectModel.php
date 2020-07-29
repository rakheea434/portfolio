<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    public $table = 'project';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
