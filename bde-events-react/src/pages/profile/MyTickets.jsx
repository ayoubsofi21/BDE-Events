import React from "react";
import { Link } from "react-router-dom";

function MyTickets() {
    return (
        <div className="min-h-screen bg-gray-50">

            {/* Header */}
            <section className="bg-white border-b">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

                    <Link
                        to="/profile"
                        className="text-sm text-blue-600 font-medium hover:text-blue-700"
                    >
                        ← Retour au profil
                    </Link>

                    <h1 className="mt-4 text-3xl font-bold text-gray-900">
                        Mes billets
                    </h1>

                    <p className="mt-3 text-gray-600">
                        Retrouvez ici vos réservations et billets numériques.
                    </p>

                </div>
            </section>


            {/* Tickets */}
            <main className="py-12">

                <div className="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

                    {/* Ticket */}
                    <div className="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                        <div className="grid grid-cols-1 md:grid-cols-3">

                            {/* Event Info */}
                            <div className="md:col-span-2 p-6 md:p-8">

                                <div className="flex items-start justify-between gap-4">

                                    <div>
                                        <p className="text-sm font-medium text-blue-600">
                                            15 Septembre 2026
                                        </p>

                                        <h2 className="mt-2 text-2xl font-bold text-gray-900">
                                            Campus Welcome Party
                                        </h2>
                                    </div>

                                    <span className="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        Confirmé
                                    </span>

                                </div>


                                {/* Information */}
                                <div className="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">

                                    <div>
                                        <p className="text-sm text-gray-500">
                                            Heure
                                        </p>

                                        <p className="mt-1 font-medium text-gray-900">
                                            19:00
                                        </p>
                                    </div>


                                    <div>
                                        <p className="text-sm text-gray-500">
                                            Lieu
                                        </p>

                                        <p className="mt-1 font-medium text-gray-900">
                                            Campus ENAA
                                        </p>
                                    </div>


                                    <div>
                                        <p className="text-sm text-gray-500">
                                            Numéro du billet
                                        </p>

                                        <p className="mt-1 font-medium text-gray-900">
                                            TICKET-2026-0001
                                        </p>
                                    </div>


                                    <div>
                                        <p className="text-sm text-gray-500">
                                            Réservation
                                        </p>

                                        <p className="mt-1 font-medium text-gray-900">
                                            BDE-2026-0001
                                        </p>
                                    </div>

                                </div>

                            </div>


                            {/* Ticket Side */}
                            <div className="bg-blue-600 p-6 md:p-8 text-white flex flex-col justify-center">

                                <div className="text-center">

                                    <div className="w-24 h-24 bg-white rounded-xl mx-auto flex items-center justify-center">
                                        <span className="text-3xl">
                                            🎫
                                        </span>
                                    </div>

                                    <p className="mt-4 text-blue-100 text-sm">
                                        Billet numérique
                                    </p>

                                    <p className="mt-2 font-bold text-lg">
                                        TICKET-2026-0001
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {/* Empty state example */}
                    <div className="mt-8 text-center">

                        <Link
                            to="/events"
                            className="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700"
                        >
                            Découvrir d'autres événements →
                        </Link>

                    </div>

                </div>

            </main>

        </div>
    );
}

export default MyTickets;