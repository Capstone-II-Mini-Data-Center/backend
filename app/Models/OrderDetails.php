<?php

namespace App\Models;

use App\Models\Orders;
use App\Models\Package;
use App\Models\ServerCred;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_name',
        'unit_price',
        'discount_amount',
        'total_amount',
        'plan',
        'expired_date',
        "orders_id",
        "package_id",
        "os",
        "status"
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class, 'orders_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function serverCred()
    {
        return $this->hasOne(ServerCred::class);
    }
}
