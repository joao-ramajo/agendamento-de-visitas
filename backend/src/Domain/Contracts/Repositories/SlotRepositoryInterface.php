<?php declare(strict_types=1);

namespace Domain\Contracts\Repositories;

use DateTimeImmutable;
use Domain\Entities\Slot;
use Domain\ValueObjects\SlotId;

interface SlotRepositoryInterface
{
    /**
     * @return string[]
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
