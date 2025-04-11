<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarsType extends Model
{
    use HasFactory;

    protected $table = 'cars_types';

    protected $fillable = [
        'name',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class, 'type_id');
    }
}
