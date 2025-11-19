<?php declare(strict_types=1);

namespace Domain\Entities;

use Domain\ValueObjects\SlotHour;
use Domain\ValueObjects\SlotId;
use DateTimeImmutable;

class Slot
{
    public function __construct(
        public readonly SlotId $id,
        public readonly int $vehicle_id,
        public readonly DateTimeImmutable $date,
        public readonly SlotHour $hour,
        public readonly bool $available,
    ) {}

    public function isAvailable(): bool
    {
        return $this->available;
    }
}