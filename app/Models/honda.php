<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class honda extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'image'
    ];


    // Relation
    public function product(){
        return $this->hasMany(product::class);
    }
    public function image() : Attribute{
        return Attribute::make(
            get: fn($value) => asset('/storage/honda/' . $value)
        );
    }
}