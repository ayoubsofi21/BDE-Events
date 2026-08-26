import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import api from "../../services/api";
function EventsManagement() {
  //    const response = api.get("/events").then((response) => {return response.data;});
  const [events, setEvents] = useState([]);
  useEffect(() => {
    api.get("/events").then((response) => {
      setEvents(response.data.data);
      console.log("Events fetched:", response.data.data);
    });
  }, []);
  let totalcapacity = 0;
  for (let event of events) {
    totalcapacity += event.capacity;
  }
  return (
    <div className="min-h-screen bg-gray-50">
      {/* Header */}
      <section className="bg-white border-b">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
          <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
              <p className="text-blue-600 font-semibold">Administration</p>

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
              <p className="text-sm text-gray-500">Total événements</p>

              <p className="mt-2 text-3xl font-bold text-gray-900">
                {events.length}
              </p>
            </div>

            <div className="bg-white border border-gray-100 rounded-xl shadow-sm p-6">
              <p className="text-sm text-gray-500">Événements actifs</p>
              <p className="mt-2 text-3xl font-bold text-green-600">
                {events.filter((event) => event.status === "Actif").length}
              </p>
            </div>

            <div className="bg-white border border-gray-100 rounded-xl shadow-sm p-6">
              <p className="text-sm text-gray-500">Capacité totale</p>

              <p className="mt-2 text-3xl font-bold text-blue-600">
                {/* {events.reduce((total,event)=>(total+event.capacity),0)}*/}
                {totalcapacity}
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
                    {events.map((event)=>
                    <tr className="hover:bg-gray-50 transition">
                        <td className="px-6 py-5">
                        <p className="font-semibold text-gray-900">
                            {event.title}
                        </p>
                    </td>

                        {/* Date */}
                        <td className="px-6 py-5">
                        <p className="mt-1 text-xs text-gray-500">
                            {event.time}
                        </p>
                        </td>
                        <td className="px-6 py-5 text-sm text-gray-600">
                        {event.location}
                        </td>
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
                            event?.status === "Actif"
                                ? "bg-green-100 text-green-700"
                                : "bg-yellow-100 text-yellow-700"
                            }`}
                        >
                            {event?.status}
                        </span>
                        </td>

                        {/* Actions */}
                        <td className="px-6 py-5">
                        <div className="flex items-center justify-end gap-2">

                            <Link
                            to={`/admin/events/${event?.id}`}
                            className="px-3 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition"
                            >
                            Voir
                            </Link>

                            <Link
                            to={`/admin/events/${event?.id}/edit`}
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
                    )}
                    </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>
  );
}

export default EventsManagement;
