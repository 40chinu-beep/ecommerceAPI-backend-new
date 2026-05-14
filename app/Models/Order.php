<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'rec_address',
        'phone',
        'user_id',
        'product_id',
    ];
}
