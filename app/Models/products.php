<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    public $table = "products";

    public function category(){
        return $this->belongsTo(categorie::class , 'cat_id' , 'id');
    }
}
