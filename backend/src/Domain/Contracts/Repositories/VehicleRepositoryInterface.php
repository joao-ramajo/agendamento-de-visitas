<?php

declare(strict_types=1);

namespace Domain\Contracts\Repositories;

use Domain\Entities\Vehicle;
interface VehicleRepositoryInterface
{
    /**
     * @return Vehicle[]
     */
    public function index(): array;
}