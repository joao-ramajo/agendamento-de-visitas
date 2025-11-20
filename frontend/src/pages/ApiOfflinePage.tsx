import { Box, Typography, Button } from "@mui/material";
import ReportProblemIcon from "@mui/icons-material/ReportProblem";
import { useNavigate } from "react-router-dom";
import Layout from "../components/layout/Layout";

export default function ApiOfflinePage() {
    const navigate = useNavigate();

    return (
        <Layout>
            <Box
                sx={{
                    height: "80vh",
                    display: "flex",
                    flexDirection: "column",
                    justifyContent: "center",
                    alignItems: "center",
                    textAlign: "center",
                    px: 3,
                }}
            >
                <ReportProblemIcon
                    sx={{ fontSize: 90, color: "#ff123c", mb: 2 }}
                />

                <Typography variant="h4" fontWeight={700} sx={{ mb: 1 }}>
                    Sistema fora do ar
                </Typography>

                <Typography variant="body1" sx={{ color: "#666", maxWidth: 400, mb: 3 }}>
                    No momento não foi possível estabelecer conexão com a API.
                    Por favor, tente novamente em alguns instantes.
                </Typography>

                <Button
                    variant="contained"
                    onClick={() => navigate("/")}
                    sx={{
                        background: "#ff123c",
                        "&:hover": { background: "#e01030" },
                        px: 4,
                        py: 1.5,
                        fontWeight: 600,
                    }}
                >
                    Tentar novamente
                </Button>
            </Box>
        </Layout>
    );
}
