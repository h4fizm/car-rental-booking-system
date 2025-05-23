<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'price',
        'description',
        'type_id',
        'status',
        'start_rental',
        'end_rental',
    ];



    protected $casts = [
        'start_rental' => 'datetime',
        'end_rental' => 'datetime',
    ];

    // Relasi dengan CarsType
    public function type()
    {
        return $this->belongsTo(CarsType::class, 'type_id');
    }

    // Relasi dengan Order
    public function orders()
    {
        return $this->hasMany(Order::class, 'car_id');
    }

}
