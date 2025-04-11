<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_rental',
        'end_rental',
        'status',
        'type_id',
    ];

    public function type()
    {
        return $this->belongsTo(CarsType::class, 'type_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'car_id');
    }
}
