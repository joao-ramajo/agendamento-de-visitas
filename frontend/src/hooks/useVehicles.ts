// src/hooks/useVehicles.ts
import { useQuery } from "@tanstack/react-query";
import { api } from "../api/axios";
import type { Vehicle } from "../types/Vehicle";

export function useVehicles() {
  return useQuery<Vehicle[]>({
    queryKey: ["vehicles"],

    queryFn: async () => {
      try {
        const response = await api.get("/vehicles");
        return response.data.data;
      } catch (error) {
        throw error;
      }
    },

    retry: false,
  });
}
