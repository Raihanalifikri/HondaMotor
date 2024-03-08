<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'color',
        'honda_id',
        'image',
        'price'
    ];


    // relation
    public function honda(){
        return $this->belongsTo(Honda::class);
    }
    public function image() : Attribute{
        return Attribute::make(
            get: fn($value) => asset('/storage/product/' . $value)
        );
    }
}
