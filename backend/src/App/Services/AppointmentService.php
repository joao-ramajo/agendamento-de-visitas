<?php

namespace App\Services;

use App\Dtos\StoreAppointmentDto;
use Domain\Contracts\Repositories\AppointmentRepositoryInterface;
use Domain\Contracts\Repositories\SlotRepositoryInterface;
use Domain\Entities\Appointment;
use Domain\Exceptions\ModelNotFoundException;
use Domain\Exceptions\SlotNotAvailableException;
use DateTimeImmutable;

class AppointmentService
{
    public function __construct(
        protected readonly SlotRepositoryInterface $slotRepository,
        protected readonly AppointmentRepositoryInterface $appointmentRepository,
    ) {}

    /**
     * @return Appointment
     */
    public function store(StoreAppointmentDto $data): Appointment
    {
        $slot = $this->slotRepository->findById($data->slot_id);

        if (!$slot) {
            throw new ModelNotFoundException('Slot não encontrado.');
        }

        if (!$slot->isAvailable()) {
            throw new SlotNotAvailableException('Esta data não está disponível para agendamento.');
        }

        $id = $this->appointmentRepository->create($data);

        $appointment = new Appointment(
            $id,
            $data->slot_id,
            $data->name,
            $data->email,
            $data->phone,
            new DateTimeImmutable(),
        );

        $this->slotRepository->markAsUnavailable($appointment->slot_id);

        return $appointment;
    }
}
