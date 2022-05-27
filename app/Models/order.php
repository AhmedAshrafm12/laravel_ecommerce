<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public $table = 'orders';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'Userid',
        'firstName',
        'lastName',
        'city',
        'country',
        'address',
        'mobile',
        'status',
        'total',
        'payment_id',
        'payment_mood',
    ];
}
