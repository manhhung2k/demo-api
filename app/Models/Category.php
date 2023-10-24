<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'category';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'code',
        'description',
    ];
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}
