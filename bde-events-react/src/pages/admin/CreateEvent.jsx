import React, { useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import api from "../../services/api";

function CreateEvent() {
    const navigate = useNavigate();
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(null);
    const [formData, setFormData] = useState({
        title: "",
        description: "",
        date: "",
        time: "",
        location: "",
        price: "",
        capacity: "",
        image: "",
    });

    const handleChange = (e) => {
        const { name, value } = e.target;

        setFormData({
            ...formData,
            [name]: value,
        });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        setError(null);
        try {

            const token = localStorage.getItem("token");

            const response = await api.post(
                "/admin/events",
                formData,
                {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                }
            );

            console.log("Create event response:", response.data);

            navigate("/admin/events");

        } catch (error) {

            console.error("Create event error:", error);

            if (error.response?.status === 422) {

                setError("Veuillez vérifier les informations saisies.");

            } else if (error.response?.status === 403) {

                setError("Vous n'avez pas l'autorisation de créer un événement.");

            } else if (error.response?.status === 401) {

                setError("Votre session a expiré. Veuillez vous reconnecter.");

            } else {

                setError("Une erreur est survenue lors de la création.");
            }

        } finally {

            setLoading(false);
        }
    };

    return (
        <div className="min-h-screen bg-gray-50">

            {/* Header */}
            <section className="bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

                    <Link
                        to="/admin/events"
                        className="text-sm text-blue-600 font-medium hover:text-blue-700"
                    >
                        ← Retour aux événements
                    </Link>

                    <h1 className="mt-4 text-3xl font-bold text-gray-900">
                        Créer un événement
                    </h1>

                    <p className="mt-2 text-gray-600">
                        Ajoutez un nouvel événement au calendrier du campus.
                    </p>

                </div>
            </section>


            {/* Form */}
            <main className="py-10">

                <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                    {error && (
                            <div className="mb-6 p-4 bg-red-50 text-red-600 rounded-lg">
                                {error}
                            </div>
                        )}

                    <form
                        onSubmit={handleSubmit}
                        className="bg-white rounded-2xl shadow-sm border border-gray-100"
                    >

                        {/* General Information */}
                        <div className="p-6 md:p-8 border-b border-gray-100">

                            <h2 className="text-xl font-semibold text-gray-900">
                                Informations générales
                            </h2>

                            <p className="mt-1 text-sm text-gray-500">
                                Informations principales de l'événement.
                            </p>


                            <div className="mt-6 space-y-6">

                                {/* Title */}
                                <div>
                                    <label
                                        htmlFor="title"
                                        className="block text-sm font-medium text-gray-700"
                                    >
                                        Titre
                                    </label>

                                    <input
                                        type="text"
                                        id="title"
                                        name="title"
                                        value={formData.title}
                                        onChange={handleChange}
                                        placeholder="Ex : Campus Welcome Party"
                                        className="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    />
                                </div>


                                {/* Description */}
                                <div>
                                    <label
                                        htmlFor="description"
                                        className="block text-sm font-medium text-gray-700"
                                    >
                                        Description
                                    </label>

                                    <textarea
                                        id="description"
                                        name="description"
                                        rows="5"
                                        value={formData.description}
                                        onChange={handleChange}
                                        placeholder="Décrivez l'événement..."
                                        className="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    />
                                </div>

                            </div>

                        </div>


                        {/* Date and Location */}
                        <div className="p-6 md:p-8 border-b border-gray-100">

                            <h2 className="text-xl font-semibold text-gray-900">
                                Date et lieu
                            </h2>

                            <p className="mt-1 text-sm text-gray-500">
                                Définissez quand et où aura lieu l'événement.
                            </p>


                            <div className="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                                {/* Date */}
                                <div>
                                    <label
                                        htmlFor="date"
                                        className="block text-sm font-medium text-gray-700"
                                    >
                                        Date
                                    </label>

                                    <input
                                        type="date"
                                        id="date"
                                        name="date"
                                        value={formData.date}
                                        onChange={handleChange}
                                        className="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    />
                                </div>


                                {/* Time */}
                                <div>
                                    <label
                                        htmlFor="time"
                                        className="block text-sm font-medium text-gray-700"
                                    >
                                        Heure
                                    </label>

                                    <input
                                        type="time"
                                        id="time"
                                        name="time"
                                        value={formData.time}
                                        onChange={handleChange}
                                        className="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    />
                                </div>


                                {/* Location */}
                                <div className="md:col-span-2">
                                    <label
                                        htmlFor="location"
                                        className="block text-sm font-medium text-gray-700"
                                    >
                                        Lieu
                                    </label>

                                    <input
                                        type="text"
                                        id="location"
                                        name="location"
                                        value={formData.location}
                                        onChange={handleChange}
                                        placeholder="Ex : Amphithéâtre ENAA"
                                        className="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    />
                                </div>

                            </div>

                        </div>


                        {/* Event Settings */}
                        <div className="p-6 md:p-8 border-b border-gray-100">

                            <h2 className="text-xl font-semibold text-gray-900">
                                Paramètres
                            </h2>

                            <p className="mt-1 text-sm text-gray-500">
                                Définissez le prix et le nombre maximum de participants.
                            </p>


                            <div className="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                                {/* Price */}
                                <div>
                                    <label
                                        htmlFor="price"
                                        className="block text-sm font-medium text-gray-700"
                                    >
                                        Prix (DH)
                                    </label>

                                    <input
                                        type="number"
                                        id="price"
                                        name="price"
                                        min="0"
                                        value={formData.price}
                                        onChange={handleChange}
                                        placeholder="Ex : 50"
                                        className="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    />
                                </div>


                                {/* Capacity */}
                                <div>
                                    <label
                                        htmlFor="capacity"
                                        className="block text-sm font-medium text-gray-700"
                                    >
                                        Capacité
                                    </label>

                                    <input
                                        type="number"
                                        id="capacity"
                                        name="capacity"
                                        min="1"
                                        value={formData.capacity}
                                        onChange={handleChange}
                                        placeholder="Ex : 100"
                                        className="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    />
                                </div>

                            </div>

                        </div>


                        {/* Image */}
                        <div className="p-6 md:p-8 border-b border-gray-100">

                            <h2 className="text-xl font-semibold text-gray-900">
                                Image
                            </h2>

                            <p className="mt-1 text-sm text-gray-500">
                                Ajoutez l'image de l'événement.
                            </p>


                            <div className="mt-6">

                                <label
                                    htmlFor="image"
                                    className="block text-sm font-medium text-gray-700"
                                >
                                    URL de l'image
                                </label>

                                <input
                                    type="text"
                                    id="image"
                                    name="image"
                                    value={formData.image}
                                    onChange={handleChange}
                                    placeholder="https://example.com/image.jpg"
                                    className="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                />

                            </div>

                        </div>


                        {/* Actions */}
                        <div className="p-6 md:p-8 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

                            <Link
                                to="/admin/events"
                                className="inline-flex justify-center items-center px-5 py-3 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-100 transition"
                            >
                                Annuler
                            </Link>

                        <button
                            type="submit"
                            disabled={loading}
                            className="px-5 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition disabled:opacity-50"
                        >
                            {loading ? "Création..." : "Créer l'événement"}
                        </button>

                        </div>

                    </form>

                </div>

            </main>

        </div>
    );
}

export default CreateEvent;