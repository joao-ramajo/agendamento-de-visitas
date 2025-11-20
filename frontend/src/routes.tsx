import { createBrowserRouter } from "react-router-dom";
import VehiclesPage from "./pages/VehiclesPage";
import VehicleSchedulePage from "./pages/VehicleSchedulePage";
import SuccessPage from "./pages/SuccessPage";

export const router = createBrowserRouter([
  {
    path: "/",
    element: <VehiclesPage />,
  },
  {
    path: "/vehicle/:id",
    element: <VehicleSchedulePage />,
  },
  {
    path: "agendamento-realizado",
    element: <SuccessPage/>
  }
]);