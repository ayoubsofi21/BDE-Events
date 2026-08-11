import React from "react";
import { Link } from "react-router-dom";

function Profile() {
    return (
        <div className="min-h-screen bg-gray-50">

            {/* Header */}
            <section className="bg-white border-b">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

                    <p className="text-blue-600 font-semibold">
                        Mon espace
                    </p>

                    <h1 className="mt-2 text-3xl font-bold text-gray-900">
                        Mon profil
                    </h1>

                    <p className="mt-3 text-gray-600">
                        Consultez et gérez les informations de votre compte.
                    </p>

                </div>
            </section>


            {/* Content */}
            <main className="py-12">

                <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

                    {/* Profile Card */}
                    <div className="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                        {/* Profile Header */}
                        <div className="bg-blue-600 px-6 py-8 md:px-8">

                            <div className="flex flex-col sm:flex-row items-center sm:items-start gap-5">

                                {/* Avatar */}
                                <div className="w-20 h-20 bg-white rounded-full flex items-center justify-center">

                                    <span className="text-2xl font-bold text-blue-600">
                                        AS
                                    </span>

                                </div>


                                {/* User Info */}
                                <div className="text-center sm:text-left">

                                    <h2 className="text-2xl font-bold text-white">
                                        Ayoub Sofi
                                    </h2>

                                    <p className="mt-1 text-blue-100">
                                        Étudiant
                                    </p>

                                </div>

                            </div>

                        </div>


                        {/* Information */}
                        <div className="p-6 md:p-8">

                            <h3 className="text-xl font-semibold text-gray-900">
                                Informations personnelles
                            </h3>


                            <div className="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                                {/* Name */}
                                <div>
                                    <p className="text-sm text-gray-500">
                                        Nom complet
                                    </p>

                                    <p className="mt-1 font-medium text-gray-900">
                                        Ayoub Sofi
                                    </p>
                                </div>


                                {/* Email */}
                                <div>
                                    <p className="text-sm text-gray-500">
                                        Email
                                    </p>

                                    <p className="mt-1 font-medium text-gray-900">
                                        student@example.com
                                    </p>
                                </div>


                                {/* Role */}
                                <div>
                                    <p className="text-sm text-gray-500">
                                        Rôle
                                    </p>

                                    <p className="mt-1 font-medium text-gray-900">
                                        Student
                                    </p>
                                </div>


                                {/* Account */}
                                <div>
                                    <p className="text-sm text-gray-500">
                                        Statut du compte
                                    </p>

                                    <p className="mt-1 font-medium text-green-600">
                                        Actif
                                    </p>
                                </div>

                            </div>


                            {/* Actions */}
                            <div className="mt-8 pt-6 border-t border-gray-200 flex flex-col sm:flex-row gap-4">

                                <Link
                                    to="/profile/tickets"
                                    className="inline-flex justify-center items-center bg-blue-600 text-white px-5 py-3 rounded-lg font-semibold hover:bg-blue-700 transition"
                                >
                                    Mes billets
                                </Link>

                                <Link
                                    to="/events"
                                    className="inline-flex justify-center items-center border border-gray-300 text-gray-700 px-5 py-3 rounded-lg font-semibold hover:bg-gray-100 transition"
                                >
                                    Découvrir les événements
                                </Link>

                            </div>

                        </div>

                    </div>

                </div>

            </main>

        </div>
    );
}

export default Profile;