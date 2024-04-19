<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Services\CarService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct(private readonly CarService $carService) {}

    public function getAll(): Collection
    {
        return $this->carService->getAll();
    }

    public function update(CarRequest $request, Car $car): JsonResponse
    {
        $result = $this->carService->update($request, $car);
        if (!$result) {
            return response()->json(['error' => 'Ошибка сохранения.'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['success' => 'Успешно сохранено.'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

}
