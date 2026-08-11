import React from "react";
import { Link } from "react-router-dom";

function EventsManagement() {

    // Données temporaires uniquement pour construire l'interface.
    // Elles seront remplacées plus tard par les données de l'API.
    const events = [
        {
            id: 1,
            title: "Campus Welcome Party",
            date: "15 Septembre 2026",
            time: "19:00",
            location: "Campus ENAA",
            price: 50,
            capacity: 150,
            status: "Actif",
        },
        {
            id: 2,
            title: "Tech Conference",
            date: "22 Septembre 2026",
            time: "14:00",
            location: "Amphithéâtre ENAA",
            price: 30,
            capacity: 100,
            status: "Actif",
        },
        {
            id: 3,
            title: "Football Tournament",
            date: "28 Septembre 2026",
            time: "10:00",
            location: "Terrain de sport",
            price: 20,
            capacity: 80,
            status: "Bientôt",
        },
    ];

    return (
        <div className="min-h-screen bg-gray-50">

            {/* Header */}
            <section className="bg-white border-b">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

                    <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                        <div>
                            <p className="text-blue-600 font-semibold">
                                Administration
                            </p>

                            <h1 className="mt-2 text-3xl font-bold text-gray-900">
                                Gestion des événements
                            </h1>

                            <p className="mt-2 text-gray-600">
                                Créez, modifiez et gérez les événements du campus.
                            </p>
                        </div>

                        <Link
                            to="/admin/events/create"
                            className="inline-flex items-center justify-center bg-blue-600 text-white px-5 py-3 rounded-lg font-semibold hover:bg-blue-700 transition"
                        >
                            + Créer un événement
                        </Link>

                    </div>

                </div>
            </section>


            {/* Main */}
            <main className="py-10">

                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    {/* Summary */}
                    <div className="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">

                        <div className="bg-white border border-gray-100 rounded-xl shadow-sm p-6">
                            <p className="text-sm text-gray-500">
                                Total événements
                            </p>

                            <p className="mt-2 text-3xl font-bold text-gray-900">
                                {events.length}
                            </p>
                        </div>


                        <div className="bg-white border border-gray-100 rounded-xl shadow-sm p-6">
                            <p className="text-sm text-gray-500">
                                Événements actifs
                            </p>

                            <p className="mt-2 text-3xl font-bold text-green-600">
                                2
                            </p>
                        </div>


                        <div className="bg-white border border-gray-100 rounded-xl shadow-sm p-6">
                            <p className="text-sm text-gray-500">
                                Capacité totale
                            </p>

                            <p className="mt-2 text-3xl font-bold text-blue-600">
                                330
                            </p>
                        </div>

                    </div>


                    {/* Desktop Table */}
                    <div className="hidden lg:block bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden">

                        <div className="px-6 py-5 border-b border-gray-100">

                            <h2 className="text-xl font-semibold text-gray-900">
                                Tous les événements
                            </h2>

                            <p className="mt-1 text-sm text-gray-500">
                                Gérez les événements actuellement disponibles.
                            </p>

                        </div>


                        <div className="overflow-x-auto">

                            <table className="w-full">

                                <thead className="bg-gray-50 border-b border-gray-100">

                                    <tr>

                                        <th className="text-left px-6 py-4 text-sm font-semibold text-gray-600">
                                            Événement
                                        </th>

                                        <th className="text-left px-6 py-4 text-sm font-semibold text-gray-600">
                                            Date
                                        </th>

                                        <th className="text-left px-6 py-4 text-sm font-semibold text-gray-600">
                                            Lieu
                                        </th>

                                        <th className="text-left px-6 py-4 text-sm font-semibold text-gray-600">
                                            Prix
                                        </th>

                                        <th className="text-left px-6 py-4 text-sm font-semibold text-gray-600">
                                            Capacité
                                        </th>

                                        <th className="text-left px-6 py-4 text-sm font-semibold text-gray-600">
                                            Statut
                                        </th>

                                        <th className="text-right px-6 py-4 text-sm font-semibold text-gray-600">
                                            Actions
                                        </th>

                                    </tr>

                                </thead>


                                <tbody className="divide-y divide-gray-100">

                                    {events.map((event) => (

                                        <tr
                                            key={event.id}
                                            className="hover:bg-gray-50 transition"
                                        >

                                            {/* Event */}
                                            <td className="px-6 py-5">

                                                <p className="font-semibold text-gray-900">
                                                    {event.title}
                                                </p>

                                                <p className="mt-1 text-sm text-gray-500">
                                                    #{event.id}
                                                </p>

                                            </td>


                                            {/* Date */}
                                            <td className="px-6 py-5">

                                                <p className="text-sm text-gray-900">
                                                    {event.date}
                                                </p>

                                                <p className="mt-1 text-xs text-gray-500">
                                                    {event.time}
                                                </p>

                                            </td>


                                            {/* Location */}
                                            <td className="px-6 py-5 text-sm text-gray-600">
                                                {event.location}
                                            </td>


                                            {/* Price */}
                                            <td className="px-6 py-5 text-sm font-medium text-gray-900">
                                                {event.price} DH
                                            </td>


                                            {/* Capacity */}
                                            <td className="px-6 py-5 text-sm text-gray-600">
                                                {event.capacity} places
                                            </td>


                                            {/* Status */}
                                            <td className="px-6 py-5">

                                                <span
                                                    className={`inline-flex px-3 py-1 rounded-full text-xs font-semibold ${
                                                        event.status === "Actif"
                                                            ? "bg-green-100 text-green-700"
                                                            : "bg-yellow-100 text-yellow-700"
                                                    }`}
                                                >
                                                    {event.status}
                                                </span>

                                            </td>


                                            {/* Actions */}
                                            <td className="px-6 py-5">

                                                <div className="flex items-center justify-end gap-2">

                                                    <Link
                                                        to={`/admin/events/${event.id}`}
                                                        className="px-3 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition"
                                                    >
                                                        Voir
                                                    </Link>

                                                    <Link
                                                        to={`/admin/events/${event.id}/edit`}
                                                        className="px-3 py-2 text-sm font-medium text-blue-600 border border-blue-200 rounded-lg hover:bg-blue-50 transition"
                                                    >
                                                        Modifier
                                                    </Link>

                                                    <button
                                                        type="button"
                                                        className="px-3 py-2 text-sm font-medium text-red-600 border border-red-200 rounded-lg hover:bg-red-50 transition"
                                                    >
                                                        Supprimer
                                                    </button>

                                                </div>

                                            </td>

                                        </tr>

                                    ))}

                                </tbody>

                            </table>

                        </div>

                    </div>


                    {/* Mobile Cards */}
                    <div className="lg:hidden space-y-4">

                        {events.map((event) => (

                            <div
                                key={event.id}
                                className="bg-white border border-gray-100 rounded-xl shadow-sm p-5"
                            >

                                <div className="flex items-start justify-between gap-4">

                                    <div>

                                        <p className="text-xs text-gray-500">
                                            #{event.id}
                                        </p>

                                        <h2 className="mt-1 text-lg font-semibold text-gray-900">
                                            {event.title}
                                        </h2>

                                    </div>

                                    <span
                                        className={`shrink-0 px-3 py-1 rounded-full text-xs font-semibold ${
                                            event.status === "Actif"
                                                ? "bg-green-100 text-green-700"
                                                : "bg-yellow-100 text-yellow-700"
                                        }`}
                                    >
                                        {event.status}
                                    </span>

                                </div>


                                <div className="mt-5 space-y-2 text-sm">

                                    <p className="text-gray-600">
                                        📅 {event.date} à {event.time}
                                    </p>

                                    <p className="text-gray-600">
                                        📍 {event.location}
                                    </p>

                                    <p className="text-gray-600">
                                        🎟️ {event.price} DH
                                    </p>

                                    <p className="text-gray-600">
                                        👥 {event.capacity} places
                                    </p>

                                </div>


                                <div className="mt-5 grid grid-cols-3 gap-2">

                                    <Link
                                        to={`/admin/events/${event.id}`}
                                        className="text-center px-3 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100"
                                    >
                                        Voir
                                    </Link>

                                    <Link
                                        to={`/admin/events/${event.id}/edit`}
                                        className="text-center px-3 py-2 text-sm font-medium text-blue-600 border border-blue-200 rounded-lg hover:bg-blue-50"
                                    >
                                        Modifier
                                    </Link>

                                    <button
                                        type="button"
                                        className="px-3 py-2 text-sm font-medium text-red-600 border border-red-200 rounded-lg hover:bg-red-50"
                                    >
                                        Supprimer
                                    </button>

                                </div>

                            </div>

                        ))}

                    </div>

                </div>

            </main>

        </div>
    );
}

export default EventsManagement;