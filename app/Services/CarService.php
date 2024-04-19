<?php

namespace App\Services;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Repositories\CarRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class CarService
{
    public function __construct(private readonly CarRepository $carRepository) {}

    public function getAll(): Collection
    {
        return $this->carRepository->getAll();
    }

}
