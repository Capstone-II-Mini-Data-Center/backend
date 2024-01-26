<?php

namespace App\Models;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServerCred extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'domain_name',
        'username',
        'password'
    ];

    public function order_detail()
    {
        return $this->belongsTo(OrderDetails::class);
    }
}
