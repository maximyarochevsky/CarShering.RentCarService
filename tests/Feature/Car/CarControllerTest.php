<?php

namespace Tests\Feature\Car;

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CarControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function testGetAll(): void
    {
        $response = $this->get('api/all');

        $this->assertTrue((bool)$response->getContent());
    }

    public function testUpdate(): void
    {
        $car = Car::factory()->create(['id' => 1, 'booking_status' => false, 'user_id' => 1]);
        $requestData = [
            'booking_status' => true,
            'user_id' => 1,
        ];

        $response = $this->patch(route('update', $car->id), $requestData);

        $response->assertSuccessful();
        $this->assertDatabaseCount(Car::class, 1);
        $this->assertDatabaseHas(Car::class, $requestData);
    }

    public function testGetItem(): void
    {
        Car::factory()->create(['user_id' => 1]);
        $response = $this->get('api/item/1');

        $response->assertSuccessful();

        $responseFromItem = json_decode($response->getContent());
        $this->assertFalse($responseFromItem->response === 'У этого пользователя эта машина не забронирована.');
    }

}
