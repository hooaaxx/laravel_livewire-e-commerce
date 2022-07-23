<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'name',
        'email',
        'address',
        'city',
        'state',
        'status',
        'tracking_no'
    ];

    public function userid()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function order_product(){
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
