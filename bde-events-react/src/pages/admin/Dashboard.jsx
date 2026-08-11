import React from "react";
import { Link } from "react-router-dom";

function Dashboard() {
    return (
        <div className="min-h-screen bg-gray-50">

            {/* Header */}
            <section className="bg-white border-b">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

                    <p className="text-blue-600 font-semibold">
                        Administration
                    </p>

                    <h1 className="mt-2 text-3xl font-bold text-gray-900">
                        Dashboard
                    </h1>

                    <p className="mt-2 text-gray-600">
                        Gérez les événements et suivez l'activité du campus.
                    </p>

                </div>
            </section>


            {/* Main */}
            <main className="py-10">

                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    {/* Statistics */}
                    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                        {/* Events */}
                        <div className="bg-white rounded-xl border border-gray-100 shadow-sm p-6">

                            <div className="flex items-center justify-between">

                                <div>
                                    <p className="text-sm text-gray-500">
                                        Événements
                                    </p>

                                    <p className="mt-2 text-3xl font-bold text-gray-900">
                                        12
                                    </p>
                                </div>

                                <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <span className="text-xl">
                                        📅
                                    </span>
                                </div>

                            </div>

                            <p className="mt-4 text-sm text-green-600">
                                +3 ce mois
                            </p>

                        </div>


                        {/* Reservations */}
                        <div className="bg-white rounded-xl border border-gray-100 shadow-sm p-6">

                            <div className="flex items-center justify-between">

                                <div>
                                    <p className="text-sm text-gray-500">
                                        Réservations
                                    </p>

                                    <p className="mt-2 text-3xl font-bold text-gray-900">
                                        248
                                    </p>
                                </div>

                                <div className="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <span className="text-xl">
                                        🎟️
                                    </span>
                                </div>

                            </div>

                            <p className="mt-4 text-sm text-green-600">
                                +18% cette semaine
                            </p>

                        </div>


                        {/* Students */}
                        <div className="bg-white rounded-xl border border-gray-100 shadow-sm p-6">

                            <div className="flex items-center justify-between">

                                <div>
                                    <p className="text-sm text-gray-500">
                                        Étudiants
                                    </p>

                                    <p className="mt-2 text-3xl font-bold text-gray-900">
                                        520
                                    </p>
                                </div>

                                <div className="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <span className="text-xl">
                                        👥
                                    </span>
                                </div>

                            </div>

                            <p className="mt-4 text-sm text-gray-500">
                                Utilisateurs inscrits
                            </p>

                        </div>


                        {/* Revenue */}
                        <div className="bg-white rounded-xl border border-gray-100 shadow-sm p-6">

                            <div className="flex items-center justify-between">

                                <div>
                                    <p className="text-sm text-gray-500">
                                        Revenus
                                    </p>

                                    <p className="mt-2 text-3xl font-bold text-gray-900">
                                        12,450 DH
                                    </p>
                                </div>

                                <div className="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                    <span className="text-xl">
                                        💰
                                    </span>
                                </div>

                            </div>

                            <p className="mt-4 text-sm text-green-600">
                                +12% ce mois
                            </p>

                        </div>

                    </div>


                    {/* Content */}
                    <div className="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-8">

                        {/* Recent Events */}
                        <div className="lg:col-span-2 bg-white rounded-xl border border-gray-100 shadow-sm">

                            <div className="p-6 border-b border-gray-100 flex items-center justify-between">

                                <div>
                                    <h2 className="text-xl font-semibold text-gray-900">
                                        Événements récents
                                    </h2>

                                    <p className="mt-1 text-sm text-gray-500">
                                        Les derniers événements créés.
                                    </p>
                                </div>

                                <Link
                                    to="/admin/events"
                                    className="text-sm text-blue-600 font-semibold hover:text-blue-700"
                                >
                                    Voir tout
                                </Link>

                            </div>


                            <div className="divide-y divide-gray-100">

                                {/* Event 1 */}
                                <div className="p-6 flex items-center justify-between gap-4">

                                    <div>
                                        <h3 className="font-semibold text-gray-900">
                                            Campus Welcome Party
                                        </h3>

                                        <p className="mt-1 text-sm text-gray-500">
                                            15 Septembre 2026 · Campus ENAA
                                        </p>
                                    </div>

                                    <span className="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        Actif
                                    </span>

                                </div>


                                {/* Event 2 */}
                                <div className="p-6 flex items-center justify-between gap-4">

                                    <div>
                                        <h3 className="font-semibold text-gray-900">
                                            Tech Conference
                                        </h3>

                                        <p className="mt-1 text-sm text-gray-500">
                                            22 Septembre 2026 · Amphithéâtre
                                        </p>
                                    </div>

                                    <span className="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        Actif
                                    </span>

                                </div>


                                {/* Event 3 */}
                                <div className="p-6 flex items-center justify-between gap-4">

                                    <div>
                                        <h3 className="font-semibold text-gray-900">
                                            Career Day
                                        </h3>

                                        <p className="mt-1 text-sm text-gray-500">
                                            5 Octobre 2026 · Salle de conférences
                                        </p>
                                    </div>

                                    <span className="bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        Bientôt
                                    </span>

                                </div>

                            </div>

                        </div>


                        {/* Quick Actions */}
                        <div className="bg-white rounded-xl border border-gray-100 shadow-sm p-6">

                            <h2 className="text-xl font-semibold text-gray-900">
                                Actions rapides
                            </h2>

                            <p className="mt-1 text-sm text-gray-500">
                                Gérez rapidement vos événements.
                            </p>


                            <div className="mt-6 space-y-3">

                                <Link
                                    to="/admin/events/create"
                                    className="flex items-center justify-center w-full bg-blue-600 text-white px-4 py-3 rounded-lg font-semibold hover:bg-blue-700 transition"
                                >
                                    + Créer un événement
                                </Link>

                                <Link
                                    to="/admin/events"
                                    className="flex items-center justify-center w-full border border-gray-300 text-gray-700 px-4 py-3 rounded-lg font-semibold hover:bg-gray-100 transition"
                                >
                                    Gérer les événements
                                </Link>

                                <Link
                                    to="/events"
                                    className="flex items-center justify-center w-full border border-gray-300 text-gray-700 px-4 py-3 rounded-lg font-semibold hover:bg-gray-100 transition"
                                >
                                    Voir le site
                                </Link>

                            </div>

                        </div>

                    </div>

                </div>

            </main>

        </div>
    );
}

export default Dashboard;