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
 function AppRoutes(){
    return(
            <Routes>
                <Route path='/' element={<Home />} />
                <Route path='/login' element={<Login/>} />
                <Route path="/register" element={<Register />} />
                <Route path="/events" element={<Events />} />
                <Route path="/events/:id" element={<EventDetails />} />
                <Route path="/profile" element={<Profile />} />
                <Route path="/profile/tickets" element={<MyTickets />} />
                <Route path="/admin/dashboard" element={<Dashboard />} />
                <Route path="/admin/events" element={<EventsManagement />} />
                <Route path="/admin/events/create" element={<CreateEvent />} />
            </Routes>
    )
}
export default AppRoutes;