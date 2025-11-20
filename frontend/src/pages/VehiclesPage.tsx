import Layout from "../components/layout/Layout";
import { useVehicles } from "../hooks/useVehicles";
import { Box } from "@mui/material";
import { VehicleCard } from "../components/vehicle/VehicleCard";
import VehicleCardSkeleton from "../components/skeletons/VehicleCardSkeleton";
import { useApiOffline } from "../hooks/useApiOffline";
import { useNavigate } from "react-router-dom";
import { useEffect } from "react";

export default function VehiclesPage() {
  const { data, isLoading, error } = useVehicles();

  const skeletons = Array.from({ length: 6 });

  const isBackendOffline = useApiOffline(error);
  const navigate = useNavigate();

  useEffect(() => {
    if (isBackendOffline) {
      navigate("/ops");
    }
  }, [isBackendOffline, navigate]);

  return (
    <Layout>
      <Box
        sx={{
          display: "grid",
          gridTemplateColumns: "repeat(auto-fill, minmax(280px, 1fr))",
          gap: 3,
          justifyItems: "center",
        }}
      >
        {isLoading
          ? skeletons.map((_, i) => <VehicleCardSkeleton key={i} />)
          : data?.map((v) => <VehicleCard key={v.id} vehicle={v} />)}
      </Box>
    </Layout>
  );
}
