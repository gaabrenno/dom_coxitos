<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function produtos(){
        return $this->hasMany(Produto::class, 'category_id', 'id');
    }
}
