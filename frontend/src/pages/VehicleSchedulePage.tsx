import { Box, Typography } from "@mui/material";
import { useLocation, useParams } from "react-router-dom";
import { VehicleCard } from "../components/vehicle/VehicleCard";
import SchedulePanel from "../components/scheduling/SchedulePanel";
import Layout from "../components/layout/Layout";
export default function VehicleSchedulePage() {
    const { state } = useLocation();
    const { vehicle } = state ?? {};
    const { id } = useParams();

    if (!vehicle) {
        return (
            <Typography sx={{ p: 4 }}>
                Veículo não encontrado.
            </Typography>
        );
    }

    return (
        <Layout>
            <Box sx={{ mt: 4, px: 4 }}>
                {/* botão voltar */}
                <Typography
                    variant="body1"
                    sx={{
                        mb: 3,
                        cursor: "pointer",
                        display: "flex",
                        alignItems: "center",
                        gap: 1,
                    }}
                    onClick={() => history.back()}
                >
                    &lt; Voltar
                </Typography>

                {/* layout principal */}
                <Box
                    sx={{
                        display: "flex",
                        gap: 4,
                        alignItems: "flex-start",
                        flexWrap: "wrap",
                    }}
                >
                    {/* Card do veículo */}
                    <Box
                        sx={{
                            flex: "0 0 260px", // largura fixa aproximada
                        }}
                    >
                        <VehicleCard vehicle={vehicle} />
                    </Box>

                    {/* Painel de agendamento */}
                    <Box
                        sx={{
                            flex: "1",
                            minWidth: "320px",
                        }}
                    >
                        <SchedulePanel vehicleId={Number(id)} />
                    </Box>
                </Box>
            </Box>
        </Layout>
    );
}
