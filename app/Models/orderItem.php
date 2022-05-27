<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
    use HasFactory;
    public $table = 'order_items';


    protected $fillable = [
        'orderId',
        'price',
        'itemId',
        'count',
    ];

    public function product(){
        return $this->belongsTo(products::class , 'itemId' , 'id');
    }
}
