import React from "react";
import { Routes, Route } from "react-router-dom";
import Home from "../pages/Home";
import Login from "../pages/Login";
import Register from "../pages/Register";
import Events from "../pages/Events";
import EventDetails from "../pages/EventDetails";
import Profile from "../pages/profile/Profile";
import MyTickets from "../pages/profile/MyTickets";
 function AppRoutes(){
    return(
            <Routes>
                <Route path='/' element={<Home />} />
                <Route path='/login' element={<Login/>} />
                <Route path="/register" element={<Register />} />
                <Route path="/events" element={<Events />} />
                <Route path="/events/:id" element={<EventDetails />} />
                <Route path="/profile" element={<Profile />} />
                <Route
                    path="/profile/tickets"
                    element={<MyTickets />}
                />
            </Routes>
    )
}
export default AppRoutes;