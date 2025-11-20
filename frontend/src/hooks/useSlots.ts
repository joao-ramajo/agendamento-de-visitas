import { useQuery } from "@tanstack/react-query";
import { api } from "../api/axios";
import type { Slot } from "../types/Slot";
import type { AxiosError } from "axios";

export function useSlots(vehicleId: number) {
  return useQuery<Slot[], AxiosError>({
    queryKey: ["slots", vehicleId],
    queryFn: async () => {
      const response = await api.get(`/vehicles/${vehicleId}/slots`);
      return response.data.data;
    },
    enabled: !!vehicleId,
    retry: false,
  });
}
