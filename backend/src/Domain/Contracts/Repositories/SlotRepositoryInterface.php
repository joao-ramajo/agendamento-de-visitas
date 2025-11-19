<?php declare(strict_types=1);

namespace Domain\Contracts\Repositories;

use Domain\Entities\Slot;
use Domain\ValueObjects\SlotId;

interface SlotRepositoryInterface
{
    /**
     * @return Slot[]
     */
    public function findAvailableDatesByVehicleId(int $vehicleId): array;

    /**
     * @return ?Slot
     */
    public function findById(SlotId $id): ?Slot;

    /**
     * @return void
     */
    public function markAsUnavailable(SlotId $id): void;
}
