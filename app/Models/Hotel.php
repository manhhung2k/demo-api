<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public $table = 'hotel';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'code',
        'price_max',
        'price_min',
        'category_id',
        'sale_day',
        'image',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
