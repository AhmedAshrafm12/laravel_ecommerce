<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    public $table = "products";
    protected $guarded =[];
    public function category(){
        return $this->belongsTo(categorie::class , 'category_id' , 'id');
    }
}
