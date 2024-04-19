<?php

namespace App\Repositories;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;

class CarRepository
{
    public function getAll(): Collection
    {
        return Car::get();
    }

}
