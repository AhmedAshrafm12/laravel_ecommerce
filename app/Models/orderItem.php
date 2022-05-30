<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
    use HasFactory;
    public $table = 'order_items';


    protected $fillable = [
        'order_id',
        'price',
        'product_id',
        'count',
    ];

    public function product(){
        return $this->belongsTo(products::class);
    }
    public function order(){
        return $this->belongsTo(order::class);
    }
}
