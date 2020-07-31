<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testimonialModel extends Model
{
    public $table = 'testimonial';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
