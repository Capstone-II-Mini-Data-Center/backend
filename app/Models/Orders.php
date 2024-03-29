<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_amount',
        'payment_image',
        "status",
        "user_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function order_details()
    // {
    //     return $this->hasMany(OrderDetails::class);
    // }

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class, 'orders_id', 'id');
    }
}
