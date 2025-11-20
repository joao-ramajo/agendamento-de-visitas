import type { AxiosError } from "axios";

export function useApiOffline(error: unknown): boolean {
  if (!error) return false;

  const err = error as AxiosError;

  const isOffline =
    err.code === "ERR_NETWORK" ||
    err.response === undefined ||
    (err.response?.status ?? 0) >= 500;

  return isOffline;
}
