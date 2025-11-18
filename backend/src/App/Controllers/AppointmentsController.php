<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Dtos\StoreAppointmentDto;
use App\Http\Request;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Response;

class AppointmentsController
{
    public function __construct(

    )
    {
        throw new \Exception('Not implemented');
    }

    public function store(Request $request)
    {
        $dto = StoreAppointmentDto::fromRequest($request);

        return Response::json([
            'data' => $dto,
        ]);
    }
}