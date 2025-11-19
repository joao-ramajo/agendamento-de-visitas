<?php

declare(strict_types=1);

namespace Domain\Entities;

use DateTimeImmutable;
use Domain\ValueObjects\Email;
use Domain\ValueObjects\Name;
use Domain\ValueObjects\Phone;
use Domain\ValueObjects\SlotId;

class Appointment
{
    public function __construct(
        public readonly int $id,
        public readonly SlotId $slot_id,
        public readonly Name $name,
        public readonly Email $email,
        public readonly Phone $phone,
        public readonly DateTimeImmutable $created_at,
    )   
    {}
}