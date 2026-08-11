import { useEffect, useState } from "react";
import api from "../services/api";

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
        return <h1>Chargement...</h1>;
    }

    if (error) {
        return <h1>{error}</h1>;
    }

    return (
        <div>
            <h1>Events</h1>

            {events.map((event) => (
                <div key={event.id}>
                    <h2>{event.title}</h2>
                    <p>{event.description}</p>
                    <p>Date : {event.date}</p>
                    <p>Lieu : {event.location}</p>
                    <p>Prix : {event.price} DH</p>
                </div>
            ))}
        </div>
    );
}

export default Events;  