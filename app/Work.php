<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    protected $fillable = [
        'title', 'image_path', 'body'
    ];

}
