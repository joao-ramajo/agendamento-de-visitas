import { Box, Paper, Skeleton } from "@mui/material";

export default function ScheduleSkeleton() {
  return (
    <Paper
      elevation={0}
      sx={{
        borderRadius: 2,
        border: "1px solid #eee",
        overflow: "hidden",
        width: "100%",
        height: 400,
        maxWidth: 600,
        mx: "auto",
        display: "flex",
        flexDirection: "column",
      }}
    >
      {/* HEADER */}
      <Box
        sx={{
          background: "#2c2e3a",
          py: 2,
          textAlign: "center",
        }}
      >
        <Skeleton
          variant="text"
          width={220}
          height={24}
          sx={{ mx: "auto", bgcolor: "grey.700" }}
        />
      </Box>

      {/* BODY */}
      <Box sx={{ p: 3, flexGrow: 1 }}>
        {/* Linha do mês */}
        <Skeleton
          variant="text"
          width={180}
          height={30}
          sx={{ mx: "auto", mb: 3 }}
        />

        {/* Skeleton das datas (bolinhas) */}
        <Box
          sx={{
            display: "flex",
            gap: 1.5,
            justifyContent: "center",
            flexWrap: "wrap",
            mb: 3,
          }}
        >
          {Array.from({ length: 7 }).map((_, i) => (
            <Skeleton
              key={i}
              variant="circular"
              width={70}
              height={70}
              sx={{ bgcolor: "grey.200" }}
            />
          ))}
        </Box>

        {/* Skeleton dos horários */}
        <Box
          sx={{
            display: "flex",
            gap: 1,
            justifyContent: "center",
            flexWrap: "wrap",
          }}
        >
          {Array.from({ length: 10 }).map((_, i) => (
            <Skeleton
              key={i}
              variant="rounded"
              width={80}
              height={35}
              sx={{ borderRadius: "20px", bgcolor: "grey.200" }}
            />
          ))}
        </Box>
      </Box>

      {/* FOOTER */}
      <Box sx={{ p: 2, borderTop: "1px solid #eee" }}>
        <Skeleton
          variant="rounded"
          width="100%"
          height={45}
          sx={{ borderRadius: 2 }}
        />
      </Box>
    </Paper>
  );
}
