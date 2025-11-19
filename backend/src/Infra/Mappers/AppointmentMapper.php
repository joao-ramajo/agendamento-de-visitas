<?php declare(strict_types=1);

namespace Infra\Mappers;

use DateTimeImmutable;
use Domain\ValueObjects\Email;
use Domain\ValueObjects\Name;
use Domain\ValueObjects\Phone;
use Domain\Entities\Appointment;
use Domain\ValueObjects\SlotId;

class AppointmentMapper
{
    public static function fromArray(array $data): Appointment
    {
        return new Appointment(
            id: (int) $data['id'],
            slot_id: new SlotId($data['slot_id']),
            name: new Name($data['name']),
            email: new Email($data['email']),
            phone: new Phone($data['phone']),
            created_at: new DateTimeImmutable($data['created_at']),
        );
    }

    public static function toArray(Appointment $appoint): array
    {
        return [
            'id' => $appoint->id,
            'slot_id' => $appoint->slot_id->value(),
            'name' => $appoint->name->value(),
            'email' => $appoint->email->value(),
            'phone' => $appoint->phone->value(),
            'created_at' => $appoint->created_at->format('Y-m-d'),
        ];
    }
}
