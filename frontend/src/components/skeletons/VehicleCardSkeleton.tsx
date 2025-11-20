import { Card, CardContent, Skeleton, Box, Stack } from "@mui/material";

export default function VehicleCardSkeleton() {
  return (
    <Card
      sx={{
        borderRadius: 2,
        overflow: "hidden",
        border: "1px solid rgba(0,0,0,0.08)",
        boxShadow: "0px 2px 6px rgba(0,0,0,0.06)",
        height: "100%",
        display: "flex",
        flexDirection: "column",
      }}
    >
      {/* Imagem */}
      <Box
        sx={{
          width: 270,
          height: 180,
          overflow: "hidden",
        }}
      >
        <Skeleton variant="rectangular" width={270} height={180} />
      </Box>

      {/* Conteúdo */}
      <CardContent
        sx={{
          p: 2,
          display: "flex",
          flexDirection: "column",
          flexGrow: 1,
        }}
      >
        {/* Título */}
        <Skeleton variant="text" width="70%" height={28} />

        {/* Versão */}
        <Skeleton variant="text" width="50%" height={20} sx={{ mt: 1 }} />

        {/* Preço */}
        <Skeleton
          variant="text"
          width="60%"
          height={32}
          sx={{ mt: 2, mb: "auto" }}
        />

        {/* Localização */}
        <Stack direction="row" spacing={1} alignItems="center" sx={{ mt: 1 }}>
          <Skeleton variant="circular" width={18} height={18} />
          <Skeleton variant="text" width="40%" height={20} />
        </Stack>
      </CardContent>
    </Card>
  );
}
