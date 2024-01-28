<?php

namespace App\Models;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'banner_image',
        "published",
        "package_id"
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
