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

    public function update(CarRequest $request, int $id): ?Car
    {
        $car = Car::get()->where('id', '=', $id)->last();
        $result = $car->update($request->only($car->getFillable()));

        return $result ? $car : null;
    }

    public function getItem(int $id): ?Car
    {
        return Car::where('user_id', '=', $id)->first();
    }

}
