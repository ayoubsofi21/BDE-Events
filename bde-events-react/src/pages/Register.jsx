import React from "react";
import { Link } from "react-router-dom";

function Register() {
    return (
        <div className="min-h-[calc(100vh-4rem)] bg-gray-50 flex items-center justify-center px-4 py-12">

            <div className="w-full max-w-md">

                {/* Header */}
                <div className="text-center mb-8">
                    <Link
                        to="/"
                        className="text-3xl font-bold text-blue-600"
                    >
                        BDE-Events
                    </Link>

                    <h1 className="mt-6 text-2xl font-bold text-gray-900">
                        Créer un compte
                    </h1>

                    <p className="mt-2 text-gray-600">
                        Rejoignez la communauté BDE-Events
                    </p>
                </div>


                {/* Register Card */}
                <div className="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

                    <form>

                        {/* Name */}
                        <div>
                            <label
                                htmlFor="name"
                                className="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Nom complet
                            </label>

                            <input
                                id="name"
                                type="text"
                                placeholder="Votre nom complet"
                                className="w-full px-4 py-3 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            />
                        </div>


                        {/* Email */}
                        <div className="mt-5">
                            <label
                                htmlFor="email"
                                className="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Email
                            </label>

                            <input
                                id="email"
                                type="email"
                                placeholder="exemple@email.com"
                                className="w-full px-4 py-3 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            />
                        </div>


                        {/* Password */}
                        <div className="mt-5">
                            <label
                                htmlFor="password"
                                className="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Mot de passe
                            </label>

                            <input
                                id="password"
                                type="password"
                                placeholder="••••••••"
                                className="w-full px-4 py-3 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            />
                        </div>


                        {/* Confirm Password */}
                        <div className="mt-5">
                            <label
                                htmlFor="password_confirmation"
                                className="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Confirmer le mot de passe
                            </label>

                            <input
                                id="password_confirmation"
                                type="password"
                                placeholder="••••••••"
                                className="w-full px-4 py-3 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            />
                        </div>


                        {/* Terms */}
                        <div className="flex items-start mt-5">
                            <input
                                id="terms"
                                type="checkbox"
                                className="w-4 h-4 mt-1 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                            />

                            <label
                                htmlFor="terms"
                                className="ml-2 text-sm text-gray-600"
                            >
                                J'accepte les conditions d'utilisation de
                                BDE-Events.
                            </label>
                        </div>


                        {/* Submit */}
                        <button
                            type="submit"
                            className="w-full mt-6 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition"
                        >
                            Créer mon compte
                        </button>

                    </form>


                    {/* Login */}
                    <div className="mt-6 text-center text-sm text-gray-600">
                        Vous avez déjà un compte ?{" "}
                        <Link
                            to="/login"
                            className="text-blue-600 font-semibold hover:text-blue-700"
                        >
                            Se connecter
                        </Link>
                    </div>

                </div>

            </div>

        </div>
    );
}

export default Register;
