<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use Illuminate\Database\Eloquent\Collection;

class CarController extends Controller
{
    public function __construct(private readonly CarService $carService) {}

    public function getAll(): Collection
    {
        return $this->carService->getAll();
    }

}
