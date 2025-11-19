<?php

declare(strict_types=1);

namespace Infra\Mappers;

use Domain\Entities\Slot;
use Domain\ValueObjects\SlotHour;
use Domain\ValueObjects\SlotId;

class SlotMapper
{
    public static function fromArray(array $data): Slot
    {
        return new Slot(
            id: new SlotId($data['id']),
            vehicle_id: (int) $data['vehicle_id'],
            date: new \DateTimeImmutable($data['date']),
            hour: new SlotHour($data['hour']),
            available: (bool) $data['available'],
        );
    }
}
