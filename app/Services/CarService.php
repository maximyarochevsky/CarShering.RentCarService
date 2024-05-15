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

    public function update(CarRequest $request, int $id): ?Car
    {
        $request->merge(['user_id' => Auth::id()]);

        return $this->carRepository->update($request, $id);
    }

    public function getItem(int $id): ?Car
    {
        return $this->carRepository->getItem($id);
    }

}
