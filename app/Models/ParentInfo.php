<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentInfo extends Model
{
    protected $fillable = ['title_uz', 'title_ru', 'body_uz', 'body_ru'];
}
