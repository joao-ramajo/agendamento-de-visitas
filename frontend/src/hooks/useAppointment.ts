// src/hooks/useAppointment.ts
import { useMutation } from "@tanstack/react-query";
import { api } from "../api/axios";

interface AppointmentPayload {
  slot_id: number;
  name: string;
  email: string;
  phone: string;
}

export function useAppointment() {
  return useMutation({
    mutationFn: async (payload: AppointmentPayload) => {
      const res = await api.post("/appointments", payload);
      return res.data;
    },

    onError: (error: any) => {
      throw error;
    },
  });
}
