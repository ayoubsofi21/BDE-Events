import { Link } from "react-router-dom";

function EventCard({ event }) {
    return (
        <div className="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">

            {/* Image */}
            <div className="h-48 bg-blue-100 flex items-center justify-center">
                {event.image ? (
                    <img
                        src={event.image}
                        alt={event.title}
                        className="w-full h-full object-cover"
                    />
                ) : (
                    <span className="text-5xl">
                        🎉
                    </span>
                )}
            </div>


            {/* Content */}
            <div className="p-6">

                {/* Date */}
                <p className="text-sm font-medium text-blue-600">
                    {event.date}
                </p>


                {/* Title */}
                <h3 className="mt-2 text-xl font-bold text-gray-900">
                    {event.title}
                </h3>


                {/* Description */}
                <p className="mt-3 text-gray-600 text-sm leading-6 line-clamp-2">
                    {event.description}
                </p>


                {/* Location */}
                <div className="mt-4">
                    <p className="text-sm text-gray-600">
                        📍 {event.location}
                    </p>
                </div>


                {/* Price */}
                <div className="mt-2">
                    <p className="text-sm font-medium text-gray-800">
                        🎟️ {event.price} DH
                    </p>
                </div>


                {/* Button */}
                <Link
                    to={`/events/${event.id}`}
                    className="block text-center mt-6 bg-blue-600 text-white py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition"
                >
                    Voir l'événement
                </Link>

            </div>

        </div>
    );
}

export default EventCard;