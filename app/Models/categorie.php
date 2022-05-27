<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;
    public $table ='categories';
    protected $fillable = [
        'id',
        'name',
        'description',
        'popular',
        'status',
        'slug',
        'file',
    ];
}
