<?php declare(strict_types=1);

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use Domain\Contracts\Repositories\SlotRepositoryInterface;
use Domain\Contracts\Repositories\VehicleRepositoryInterface;
use Domain\Entities\Vehicle;
use Domain\ValueObjects\Id;
use Domain\ValueObjects\Location;
use Domain\ValueObjects\Price;

class VehicleController
{
    public function __construct(
        protected readonly VehicleRepositoryInterface $vehicleRepository,
        protected readonly SlotRepositoryInterface $slotRepository,
    ) {}

    public function index()
    {
        $vehicles = $this->vehicleRepository->index();

        return Response::json([
            'message' => 'Listagem realizada com sucesso',
            'vehicles' => $vehicles,
        ]);
    }

    public function dates(Request $request, int $vehicle_id)
    {
        $dates = $this->slotRepository->findDatesByVehicleId($vehicle_id);

        return Response::json([
            'message' => 'Datas disponiveis',
            'data' => $dates,
        ]);
    }
}
