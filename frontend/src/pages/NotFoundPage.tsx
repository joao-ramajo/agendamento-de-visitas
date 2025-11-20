import { Box, Button, Typography } from "@mui/material";
import ErrorOutlineIcon from "@mui/icons-material/ErrorOutline";
import { useNavigate } from "react-router-dom";
import Layout from "../components/layout/Layout";

export default function NotFoundPage() {
    const navigate = useNavigate();

    return (
        <Layout>
            <Box
                sx={{
                    minHeight: "50vh",
                    display: "flex",
                    justifyContent: "center",
                    alignItems: "center",
                    textAlign: "center",
                    p: 3,
                }}
            >
                <Box sx={{ maxWidth: 400 }}>
                    <ErrorOutlineIcon sx={{ fontSize: 60, color: "#555" }} />

                    <Typography variant="h5" sx={{ mt: 2, fontWeight: 700 }}>
                        Página não encontrada
                    </Typography>

                    <Typography variant="body1" sx={{ mt: 1, color: "text.secondary" }}>
                        A página que você tentou acessar não existe ou foi removida.
                    </Typography>

                    <Button
                        variant="contained"
                        sx={{
                            mt: 3,
                            py: 1.4,
                            background: "#ff123c",
                            fontWeight: 600,
                            "&:hover": { background: "#e01030" },
                        }}
                        onClick={() => navigate("/")}
                    >
                        Voltar para a Home
                    </Button>
                </Box>
            </Box>
        </Layout>
    );
}
