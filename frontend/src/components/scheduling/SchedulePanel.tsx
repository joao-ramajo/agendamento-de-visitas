import { useState } from "react";
import { Box, Typography, Button } from "@mui/material";
import type { Slot } from "../../types/Slot";
import { useSlots } from "../../hooks/useSlots";

interface SchedulePanelProps {
    vehicleId: number;
}

export default function SchedulePanel({ vehicleId }: SchedulePanelProps) {
    const { data: slots, isLoading, error } = useSlots(vehicleId);

    const [selectedDate, setSelectedDate] = useState<string | null>(null);
    const [selectedHour, setSelectedHour] = useState<string | null>(null);
    const [selectedSlotId, setSelectedSlotId] = useState<number | null>(null);

    if (isLoading) return <Typography>Carregando datas...</Typography>;
    if (error) return <Typography color="error">Erro ao carregar datas</Typography>;
    if (!slots?.length) return <Typography>Nenhuma data disponível</Typography>;

    // Agrupa slots por data
    const groupedDates = slots.reduce((acc: any, slot: Slot) => {
        if (!acc[slot.date]) acc[slot.date] = [];
        acc[slot.date].push(slot);
        return acc;
    }, {});

    // Horários entre 09:00 → 18:00
    const allHours = [];
    for (let h = 9; h <= 18; h++) {
        allHours.push(`${String(h).padStart(2, "0")}:00`);
        if (h < 18) allHours.push(`${String(h).padStart(2, "0")}:30`);
    }

    const availableSlotsForDate: Slot[] =
        selectedDate ? groupedDates[selectedDate] ?? [] : [];

    const monthName = new Date(Object.keys(groupedDates)[0]).toLocaleDateString(
        "pt-BR",
        { month: "long", year: "numeric" }
    );

    const GREEN = "#4caf50";
    const RED = "#ff123c";

    return (
        <Box
            sx={{
                borderRadius: 2,
                border: "1px solid #eee",
                overflow: "hidden",
                height: "360px",
                display: "flex",
                flexDirection: "column"
            }}
        >
            {/* HEADER */}
            <Box
                sx={{
                    background: "#2c2e3a",
                    color: "#fff",
                    textAlign: "center",
                    py: 2
                }}
            >
                <Typography variant="h6">
                    Agende o dia e horário da sua visita
                </Typography>
            </Box>

            {/* BODY COM SCROLL */}
            <Box
                sx={{
                    p: 3,
                    overflowY: "auto",
                    flexGrow: 1
                }}
            >
                {/* MÊS */}
                <Typography
                    variant="h6"
                    sx={{
                        textAlign: "center",
                        mb: 3,
                        textTransform: "capitalize"
                    }}
                >
                    {monthName}
                </Typography>

                {/* DATAS */}
                <Box
                    sx={{
                        display: "flex",
                        justifyContent: "space-evenly",
                        gap: 1,
                        mb: 3,
                        flexWrap: "wrap"
                    }}
                >
                    {Object.keys(groupedDates).map((date) => {
                        const d = new Date(date);
                        const weekday = d
                            .toLocaleDateString("pt-BR", { weekday: "short" })
                            .replace(".", "")
                            .toUpperCase();

                        const isSelected = selectedDate === date;

                        return (
                            <Box
                                key={date}
                                onClick={() => {
                                    setSelectedDate(date);
                                    setSelectedHour(null);
                                    setSelectedSlotId(null);
                                }}
                                sx={{
                                    width: 70,
                                    height: 70,
                                    borderRadius: "50%",
                                    background: isSelected ? GREEN : "#fafafa",
                                    color: isSelected ? "#fff" : "#000",
                                    border: "1px solid #ddd",
                                    display: "flex",
                                    flexDirection: "column",
                                    alignItems: "center",
                                    justifyContent: "center",
                                    cursor: "pointer",
                                    transition: "0.2s"
                                }}
                            >
                                <span style={{ fontSize: 12, opacity: 0.9 }}>
                                    {weekday}
                                </span>
                                <strong style={{ fontSize: 16 }}>
                                    {d.getDate()}
                                </strong>
                            </Box>
                        );
                    })}
                </Box>

                {/* HORÁRIOS – LISTA COM SCROLL */}
                <Box
                    sx={{
                        display: "flex",
                        gap: 1,
                        flexWrap: "wrap",
                        justifyContent: "center",
                        mb: 3
                    }}
                >
                    {allHours.map((hour) => {
                        const slot = availableSlotsForDate.find((s) => s.hour === hour);
                        const isAvailable = selectedDate ? !!slot : true;
                        const isSelected = selectedHour === hour;

                        return (
                            <Box
                                key={hour}
                                onClick={() => {
                                    if (!isAvailable) return;
                                    setSelectedHour(hour);
                                    setSelectedSlotId(slot?.id ?? null);
                                }}
                                sx={{
                                    px: 3,
                                    py: 1,
                                    borderRadius: "20px",
                                    border: "1px solid #ddd",
                                    fontSize: 16,
                                    cursor: isAvailable ? "pointer" : "not-allowed",
                                    background:
                                        !selectedDate
                                            ? "#fafafa"
                                            : !isAvailable
                                                ? "#333"
                                                : isSelected
                                                    ? GREEN
                                                    : "#fafafa",
                                    color:
                                        !selectedDate
                                            ? "inherit"
                                            : !isAvailable
                                                ? "#999"
                                                : isSelected
                                                    ? "#fff"
                                                    : "#000",
                                    opacity: !isAvailable ? 0.5 : 1
                                }}
                            >
                                {hour}
                            </Box>
                        );
                    })}
                </Box>
            </Box>

            {/* FOOTER COM BOTÃO FIXO */}
            <Box sx={{ p: 2, borderTop: "1px solid #eee" }}>
                <Button
                    variant="contained"
                    disabled={!selectedSlotId}
                    sx={{
                        py: 1.5,
                        background: RED,
                        color: "#fff",
                        fontWeight: 600,
                        width: "100%",
                        mx: "auto",
                        "&:disabled": {
                            background: "#cfcfcf",
                            color: "#777"
                        }
                    }}
                >
                    Agendar Visita
                </Button>
            </Box>
        </Box>
    );
}
