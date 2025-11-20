// src/hooks/useVehicles.ts
import { useQuery } from "@tanstack/react-query";
import { api } from "../api/axios";
import type { Vehicle } from "../types/Vehicle";
import type { AxiosError } from "axios";

export function useVehicles() {
  return useQuery<Vehicle[], AxiosError>({
    queryKey: ["vehicles"],

    queryFn: async () => {
      const response = await api.get("/vehicles");
      return response.data.data;
    },

    retry: false,
  });
}
