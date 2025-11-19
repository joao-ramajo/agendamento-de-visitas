<?php

namespace App\Services;

use App\Dtos\StoreAppointmentDto;
use DateTimeImmutable;
use Domain\Entities\Appointment;
use Domain\Contracts\Repositories\AppointmentRepositoryInterface;
use Domain\Contracts\Repositories\SlotRepositoryInterface;
use Domain\Exceptions\ModelNotFoundException;
use Domain\Exceptions\SlotNotAvailableException;
use Exception;

class AppointmentService
{
    public function __construct(
        protected readonly SlotRepositoryInterface $slotRepository,
        protected readonly AppointmentRepositoryInterface $appointmentRepository,
    ) {}

    public function store(StoreAppointmentDto $data)
    {
        // buscar entidade slot
        $slot = $this->slotRepository->findById($data->slot_id);

        if (!$slot) {
            throw new ModelNotFoundException('Este agendamento não encontrado.');
        }

        // verificar disponibilidade
        if (!$slot->isAvailable()) {
            throw new SlotNotAvailableException('Esta data não está disponível para agendamento.');
        }

        // registrar agendamento
        $id = $this->appointmentRepository->create($data);

        // monta o agendamento criado
        $appointment = new Appointment(
            $id,
            $data->slot_id,
            $data->name,
            $data->email,
            $data->phone,
            new DateTimeImmutable(),
        );

        // atualizar para nao disponivel
        $this->slotRepository->markAsUnavailable($appointment->slot_id);

        return $appointment;
    }
}
