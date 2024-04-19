<?php

namespace App\Repositories;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CarRepository
{
    public function getAll(): Collection
    {
        return Car::get();
    }

    public function update(Request $request, Car $car): ?Car
    {
        $result = $car->update($request->only($car->getFillable()));

        return $result ? $car : null;
    }

}
