import { BrowserRouter, Route, Routes } from "react-router-dom";
import Footer from "../components/Footer";
import Navbar from "../components/Navbar";
import EventDetails from "../pages/EventDetails";
import Events from "../pages/Events";
import Home from "../pages/Home";
import Login from "../pages/Login";
import Register from "../pages/Register";
import Dashboard from "../pages/admin/Dashboard";
import AdminEventDetails from "../pages/admin/EventDetails";
import CreateEvent from "../pages/admin/CreateEvent";
import EditEvent from "../pages/admin/EditEvent";
import EventsManagement from "../pages/admin/EventsManagement";
import MyTickets from "../pages/profile/MyTickets";
import Profile from "../pages/profile/Profile";

function AppRoutes() {
  return (
    <BrowserRouter>
      <Navbar />
      <main className="page-content">
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/login" element={<Login />} />
          <Route path="/register" element={<Register />} />
          <Route path="/events" element={<Events />} />
          <Route path="/events/:id" element={<EventDetails />} />
          <Route path="/profile" element={<Profile />} />
          <Route path="/profile/tickets" element={<MyTickets />} />

          <Route path="/admin" element={<Dashboard />} />
          <Route path="/admin/events" element={<EventsManagement />} />
          <Route path="/admin/events/create" element={<CreateEvent />} />
          <Route path="/admin/events/:id/edit" element={<EditEvent />} />
          <Route path="/admin/events/:id" element={<AdminEventDetails />} />
        </Routes>
      </main>
      <Footer />
    </BrowserRouter>
  );
}

export default AppRoutes;
