<?php

declare(strict_types=1);

namespace Domain\Contracts\Repositories;

use App\Dtos\StoreAppointmentDto;
use Domain\Entities\Appointment;

interface AppointmentRepositoryInterface
{
    public function create(StoreAppointmentDto $data);
}
