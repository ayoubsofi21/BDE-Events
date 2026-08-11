import { useEffect, useState } from "react";
import api from "../services/api";
import EventCard from "../components/EventCard";

function Events() {
    const [events, setEvents] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        const getEvents = async () => {
            try {
                const response = await api.get("/events");

                console.log("API response:", response.data);

                setEvents(response.data.data);
            } catch (error) {
                console.error("Erreur API:", error);
                setError("Impossible de récupérer les événements.");
            } finally {
                setLoading(false);
            }
        };

        getEvents();
    }, []);

    if (loading) {
        return (
            <div className="min-h-screen flex items-center justify-center bg-gray-50">
                <p className="text-gray-600 text-lg">
                    Chargement des événements...
                </p>
            </div>
        );
    }

    if (error) {
        return (
            <div className="min-h-screen flex items-center justify-center bg-gray-50">
                <div className="text-center">
                    <h1 className="text-xl font-semibold text-red-600">
                        {error}
                    </h1>
                </div>
            </div>
        );
    }

    return (
        <div className="bg-gray-50 min-h-screen">

            {/* Header */}
            <section className="bg-white ">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <h1 className="mt-2 text-4xl font-bold text-gray-900">
                        Découvrez les événements
                    </h1>
                </div>
            </section>


            {/* Events */}
            <section className="py-12">

                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    <div className="flex items-center justify-between mb-8">
                        <h2 className="text-xl font-semibold text-gray-900">
                            Tous les événements
                        </h2>

                        <p className="text-sm text-gray-500">
                            {events.length} événement(s)
                        </p>
                    </div>


                    {events.length === 0 ? (
                        <div className="bg-white rounded-xl border border-gray-100 p-12 text-center">
                            <h3 className="text-xl font-semibold text-gray-900">
                                Aucun événement disponible
                            </h3>

                            <p className="mt-2 text-gray-500">
                                Aucun événement n'est disponible pour le moment.
                            </p>
                        </div>
                    ) : (
                        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                            {events.map((event) => (
                                <EventCard
                                    key={event.id}
                                    event={event}
                                />
                            ))}

                        </div>
                    )}

                </div>

            </section>

        </div>
    );
}

export default Events;