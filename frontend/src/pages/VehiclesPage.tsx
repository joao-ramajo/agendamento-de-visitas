import Layout from "../components/layout/Layout";
import { useVehicles } from "../hooks/useVehicles";
import { Box } from "@mui/material";
import { VehicleCard } from "../components/vehicle/VehicleCard";
import VehicleCardSkeleton from "../components/skeletons/VehicleCardSkeleton";

export default function VehiclesPage() {
  const { data, isLoading } = useVehicles();

  // Quantidade de skeletons desejada
  const skeletons = Array.from({ length: 6 });

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
