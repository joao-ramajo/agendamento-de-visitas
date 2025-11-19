<?php declare(strict_types=1);

namespace App\Controllers;

use App\Dtos\StoreAppointmentDto;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Request;
use App\Http\Response;
use App\Services\AppointmentService;
use Domain\Exceptions\ModelNotFoundException;
use Domain\Exceptions\SlotNotAvailableException;
use Infra\Mappers\AppointmentMapper;
use InvalidArgumentException;

class AppointmentsController
{
    public function __construct(
        protected readonly AppointmentService $appointmentService
    ) {}

    public function store(Request $request)
    {
        try {
            $dto = StoreAppointmentDto::fromRequest($request);

            $appointment = $this->appointmentService->store($dto);

            return Response::json([
                'data' => AppointmentMapper::toArray($appointment),
            ], 201);
        } catch (InvalidArgumentException $e) {
            return Response::error($e->getMessage(), 422);
        } catch (SlotNotAvailableException $e) {
            return Response::error($e->getMessage(), 422);
        } catch (ModelNotFoundException $e) {
            return Response::error($e->getMessage(), 404);
        }
    }
}
