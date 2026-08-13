import { useEffect, useState } from "react";
import { Link, useNavigate, useParams } from "react-router-dom";
import api from "../services/api";
import { useContext } from "react";
import { AuthContext } from "../context/AuthContext";

function EventDetails() {

    const { id } = useParams();
    const navigate = useNavigate();

    const { user, token } = useContext(AuthContext);

    const [event, setEvent] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    const [bookingLoading, setBookingLoading] = useState(false);
    const [bookingError, setBookingError] = useState(null);
    const [bookingSuccess, setBookingSuccess] = useState(null);


    useEffect(() => {

        const getEvent = async () => {

            try {

                const response = await api.get(`/events/${id}`);

                console.log("Event API response:", response.data);

                setEvent(response.data.data);

            } catch (error) {

                console.error("Erreur API:", error);

                setError("Impossible de récupérer cet événement.");

            } finally {

                setLoading(false);

            }
        };

        getEvent();

    }, [id]);


    const handleBooking = async () => {

        if (!user || !token) {
            navigate("/login");
            return;
        }

        setBookingLoading(true);
        setBookingError(null);
        setBookingSuccess(null);

        try {

            const response = await api.post(
                `/events/${id}/book`,
                {},
                {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                }
            );

            console.log("Booking response:", response.data);

            setBookingSuccess(
                response.data.message
            );

        } catch (error) {

            console.error("Booking error:", error);

            if (error.response) {

                setBookingError(
                    error.response.data.message ||
                    "Impossible de réserver cet événement."
                );

            } else {

                setBookingError(
                    "Une erreur est survenue."
                );

            }

        } finally {

            setBookingLoading(false);

        }
    };


    if (loading) {
        return (
            <div className="min-h-screen flex items-center justify-center bg-gray-50">
                <p className="text-gray-600 text-lg">
                    Chargement de l'événement...
                </p>
            </div>
        );
    }


    if (error) {
        return (
            <div className="min-h-screen flex items-center justify-center bg-gray-50 px-4">

                <div className="text-center">

                    <h1 className="text-xl font-semibold text-red-600">
                        {error}
                    </h1>

                    <Link
                        to="/events"
                        className="inline-block mt-6 bg-blue-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition"
                    >
                        Retour aux événements
                    </Link>

                </div>

            </div>
        );
    }


    if (!event) {
        return (
            <div className="min-h-screen flex items-center justify-center bg-gray-50">

                <p className="text-gray-600">
                    Événement introuvable.
                </p>

            </div>
        );
    }


    return (
        <div className="bg-gray-50 min-h-screen">

            {/* Header */}

            <section className="bg-white">

                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

                    <Link
                        to="/events"
                        className="text-sm text-blue-600 font-medium hover:text-blue-700"
                    >
                        ← Retour aux événements
                    </Link>

                </div>

            </section>


            <main className="py-12">

                <div className="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

                    <div className="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">


                        {/* Image */}

                        <div className="h-64 md:h-80 bg-blue-100 flex items-center justify-center">

                            {event.image ? (

                                <img
                                    src={`http://localhost:8000/storage/${event.image}`}
                                    alt={event.title}
                                    className="w-full h-full object-cover"
                                />

                            ) : (

                                <span className="text-7xl">
                                    🎉
                                </span>

                            )}

                        </div>


                        {/* Content */}

                        <div className="p-6 md:p-10">


                            {/* Title */}

                            <h1 className="text-3xl md:text-4xl font-bold text-gray-900">
                                {event.title}
                            </h1>


                            {/* Event Information */}

                            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">


                                <div className="bg-gray-50 rounded-xl p-5">

                                    <p className="text-sm text-gray-500">
                                        Date
                                    </p>

                                    <p className="mt-1 font-semibold text-gray-900">
                                        📅 {event.date}
                                    </p>

                                </div>


                                <div className="bg-gray-50 rounded-xl p-5">

                                    <p className="text-sm text-gray-500">
                                        Lieu
                                    </p>

                                    <p className="mt-1 font-semibold text-gray-900">
                                        📍 {event.location}
                                    </p>

                                </div>


                                <div className="bg-gray-50 rounded-xl p-5">

                                    <p className="text-sm text-gray-500">
                                        Prix
                                    </p>

                                    <p className="mt-1 font-semibold text-gray-900">
                                        🎟️ {event.price} DH
                                    </p>

                                </div>

                            </div>


                            {/* Description */}

                            <div className="mt-10">

                                <h2 className="text-2xl font-bold text-gray-900">
                                    À propos de cet événement
                                </h2>

                                <p className="mt-4 text-gray-600 leading-8 whitespace-pre-line">
                                    {event.description}
                                </p>

                            </div>


                            {/* Booking */}

                            <div className="mt-10 pt-8 border-t border-gray-200">

                                <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">


                                    <div>

                                        <h3 className="text-lg font-semibold text-gray-900">
                                            Vous souhaitez participer ?
                                        </h3>

                                        <p className="mt-1 text-sm text-gray-500">
                                            Réservez votre place pour cet événement.
                                        </p>

                                    </div>


                                    <button
                                        type="button"
                                        onClick={handleBooking}
                                        disabled={bookingLoading}
                                        className="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition disabled:opacity-50"
                                    >

                                        {bookingLoading
                                            ? "Réservation..."
                                            : "Réserver ma place"
                                        }

                                    </button>

                                </div>


                                {/* Success */}

                                {bookingSuccess && (

                                    <div className="mt-5 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700">
                                        {bookingSuccess}
                                    </div>

                                )}


                                {/* Error */}

                                {bookingError && (

                                    <div className="mt-5 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700">
                                        {bookingError}
                                    </div>

                                )}

                            </div>


                        </div>

                    </div>

                </div>

            </main>

        </div>
    );
}

export default EventDetails;