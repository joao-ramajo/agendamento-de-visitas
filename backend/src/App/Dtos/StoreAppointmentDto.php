<?php declare(strict_types=1);

namespace App\Dtos;

use App\Http\Request;
use Domain\ValueObjects\Email;
use Domain\ValueObjects\Name;
use Domain\ValueObjects\Phone;
use Domain\ValueObjects\SlotId;

class StoreAppointmentDto
{
    public function __construct(
        public readonly SlotId $slot_id,
        public readonly Name $name,
        public readonly Email $email,
        public readonly Phone $phone,
    ) {}

    public static function fromRequest(Request $request): self
    {
        return new self(
            slot_id: new SlotId($request->input('slot_id')),
            name: new Name($request->input('name')),
            email: new Email($request->input('email')),
            phone: new Phone($request->input('phone')),
        );
    }
}
