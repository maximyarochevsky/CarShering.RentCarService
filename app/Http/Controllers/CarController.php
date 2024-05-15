<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Services\CarService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{
    public function __construct(private readonly CarService $carService) {}

    public function getAll(): Collection
    {
        return $this->carService->getAll();
    }

    public function update(CarRequest $request, int $id): JsonResponse
    {
        $result = $this->carService->update($request, $id);

        if (!$result) {
            return response()->json(['error' => 'Ошибка сохранения.'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['success' => 'Успешно сохранено.'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function getItem(int $id): JsonResponse
    {
        $result = $this->carService->getItem($id);
        if (!$result) {
            return response()->json(['error' => 'У этого пользователя эта машина не забронирована.'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['success' => "Айди машины: {$result->id}"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

}
