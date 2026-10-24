<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    // Category.php
    public function children()
{
        return $this->hasMany(Categorychildren::class, 'category_id');
}


}
