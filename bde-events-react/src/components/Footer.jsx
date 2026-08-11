import React from "react";
import { Link } from "react-router-dom";

function Footer() {
    return (
        <footer className="bg-gray-900 text-white mt-12">
            <div  className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

                <div className="grid grid-cols-1 md:grid-cols-3 gap-8">

                    {/* About */}
                    <div>
                        <h2 className="text-xl font-bold text-blue-400">
                            BDE-Events
                        </h2>

                        <p className="mt-3 text-gray-400 text-sm leading-6">
                            La plateforme de billetterie du campus ENAA.
                            Découvrez les événements et réservez votre place
                            facilement.
                        </p>
                    </div>

                    {/* Navigation */}
                    <div>
                        <h3 className="font-semibold text-lg mb-3">
                            Navigation
                        </h3>

                        <div className="flex flex-col gap-2 text-sm">
                            <Link
                                to="/"
                                className="text-gray-400 hover:text-white transition"
                            >
                                Home
                            </Link>

                            <Link
                                to="/events"
                                className="text-gray-400 hover:text-white transition"
                            >
                                Events
                            </Link>

                            <Link
                                to="/login"
                                className="text-gray-400 hover:text-white transition"
                            >
                                Login
                            </Link>

                            <Link
                                to="/register"
                                className="text-gray-400 hover:text-white transition"
                            >
                                Register
                            </Link>
                        </div>
                    </div>

                    {/* Contact */}
                    <div>
                        <h3 className="font-semibold text-lg mb-3">
                            Contact
                        </h3>

                        <p className="text-gray-400 text-sm">
                            ENAA Campus
                        </p>

                        <p className="text-gray-400 text-sm mt-2">
                            contact@bde-events.com
                        </p>
                    </div>

                </div>

                {/* Bottom */}
                <div className="border-t border-gray-700 mt-8 pt-6 text-center">
                    <p className="text-gray-500 text-sm">
                        © 2026 BDE-Events. Tous droits réservés.
                    </p>
                </div>

            </div>
        </footer>
    );
}

export default Footer;