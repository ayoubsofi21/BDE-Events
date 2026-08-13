import React from "react";
import { Routes, Route } from "react-router-dom";
import Home from "../pages/Home";
import Login from "../pages/Login";
import Register from "../pages/Register";
import Events from "../pages/Events";
import EventDetails from "../pages/EventDetails";
import Profile from "../pages/profile/Profile";
import MyTickets from "../pages/profile/MyTickets";
import Dashboard from "../pages/admin/Dashboard";
import EventsManagement from "../pages/admin/EventsManagement";
import CreateEvent from "../pages/admin/CreateEvent";
import EditEvent from "../pages/admin/EditEvent";
import ProtectedRoute from "../components/ProtectedRoute";
function AppRoutes() {
  return (
    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/login" element={<Login />} />
      <Route path="/register" element={<Register />} />
      <Route path="/events" element={<Events />} />
      <Route path="/events/:id" element={<EventDetails />} />
      {/* protected routes */}
      <Route
        path="/profile"
        element={
          <ProtectedRoute>
            <Profile />
          </ProtectedRoute>
        }
      />
      <Route
        path="/profile/tickets"
        element={
          <ProtectedRoute>
            <MyTickets />
          </ProtectedRoute>
        }
      />
      <Route
        path="/admin/dashboard"
        element={
          <ProtectedRoute adminOnly={true}>
            <Dashboard />
          </ProtectedRoute>
        }
      />
      <Route
        path="/admin/events"
        element={
          <ProtectedRoute adminOnly={true}>
            <EventsManagement />
          </ProtectedRoute>
        }
      />
      <Route
        path="/admin/events/create"
        element={
          <ProtectedRoute adminOnly={true}>
            <CreateEvent />
          </ProtectedRoute>
        }
      />
      <Route
        path="/admin/events/:id"
        element={
          <ProtectedRoute adminOnly={true}>
            <EditEvent />
          </ProtectedRoute>
        }
      />
    </Routes>
  );
}
export default AppRoutes;
