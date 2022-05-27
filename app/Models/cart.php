<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'UserId',
        'itemId',
        'count',
    ];


    public function product(){
        return $this->belongsTo(products::class , 'itemId' , 'id');
    }
}
