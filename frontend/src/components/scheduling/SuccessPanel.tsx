import { Box, Typography, Button } from "@mui/material";

export default function SuccessPanel() {
    return (
        <Box
            sx={{
                borderRadius: 2,
                border: "1px solid #eee",
                height: "400px",
                display: "flex",
                flexDirection: "column",
                justifyContent: "center",
                alignItems: "center",
                gap: 2,
                textAlign: "center",
            }}
        >
            <Typography variant="h5" sx={{ color: "#4caf50", fontWeight: 700 }}>
                Visita agendada!
            </Typography>

            <Typography sx={{ maxWidth: 250, opacity: 0.7 }}>
                Entraremos em contato por e-mail com mais detalhes.
            </Typography>

            <Button
                variant="contained"
                sx={{ mt: 2 }}
                onClick={() => (window.location.href = "/")}
            >
                Voltar ao início
            </Button>
        </Box>
    );
}
