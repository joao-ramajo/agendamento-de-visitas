import { createBrowserRouter } from "react-router-dom";
import VehiclesPage from "./pages/VehiclesPage";

export const router = createBrowserRouter([
  {
    path: "/",
    element: <VehiclesPage />,
  }
]);