import { useQuery } from "@tanstack/react-query";
import { api } from "../api/axios";
import type { Slot } from "../types/Slot";

export function useSlots(vehicleId: number) {
  return useQuery<Slot[]>({
    queryKey: ["slots", vehicleId],
    queryFn: async () => {
      const response = await api.get(`/vehicles/${vehicleId}/slots`);
      return response.data.data;
    },
    enabled: !!vehicleId,
  });
}
