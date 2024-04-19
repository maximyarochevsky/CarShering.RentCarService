<?php

namespace App\Services;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Repositories\CarRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarService
{
    public function __construct(private readonly CarRepository $carRepository) {}

    public function getAll(): Collection
    {
        return $this->carRepository->getAll();
    }

    public function update(CarRequest $request, Car $car): ?Car
    {
        $request->merge(['id_user' => Auth::id()]);

        return $this->carRepository->update($request, $car);
    }

    public function getItem(int $id): ?Car
    {
        return $this->carRepository->getItem($id);
    }

}
