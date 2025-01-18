<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false; // Отключить автоматическое управление временными метками

    protected $fillable = [
        'name',
        'price',
        'brand_id',
        'qty',
        'description',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
