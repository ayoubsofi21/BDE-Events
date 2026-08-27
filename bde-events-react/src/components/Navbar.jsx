import React from "react";
import { Link } from "react-router-dom";
import {useContext} from "react";
import { AuthContext } from "../context/AuthContext";
function Navbar() {
    const {user,logout}=useContext(AuthContext);
    return (
        <nav className="bg-white shadow-md">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="flex items-center justify-between h-16">

                    {/* Logo */}
                    <Link
                        to="/"
                        className="text-2xl font-bold text-blue-600"
                    >
                        BDE-Events
                    </Link>

                    {/* Navigation */}
                    <div className="flex items-center gap-6">

                        <Link
                            to="/"
                            className="text-gray-700 hover:text-blue-600 font-medium transition"
                        >
                            Home
                        </Link>

                        <Link
                            to="/events"
                            className="text-gray-700 hover:text-blue-600 font-medium transition"
                        >
                            Events
                        </Link>

                        {user ? (
                            <button
                                onClick={logout}
                                className="text-gray-700 hover:text-blue-600 font-medium transition"
                            >
                                Logout
                            </button>
                        ) : (
                            <>
                                <Link
                                to="/login"
                                className="text-gray-700 hover:text-blue-600 font-medium transition"
                            >
                                Login
                            </Link>

                            <Link
                                to="/register"
                                className="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition"
                            >
                                Register
                            </Link>
                        </>
                        )}

                    </div>
                </div>
            </div>
        </nav>
    );
}

export default Navbar;