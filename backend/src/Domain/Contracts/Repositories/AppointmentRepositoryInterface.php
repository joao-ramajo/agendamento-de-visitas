<?php declare(strict_types=1);

namespace Domain\Contracts\Repositories;

use App\Dtos\StoreAppointmentDto;
interface AppointmentRepositoryInterface
{
    /**
     * @return int
     */
    public function create(StoreAppointmentDto $data): int;
}
