<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, "Order")->withTimestamps()->withPivot(["domain_name", "username", "password", "ip_address", "payment_image", "purchased_date", "expire_date", "status"]);
    }
}
