import React, { useState } from "react";
import { Link, useParams } from "react-router-dom";

function EditEvent() {
    const { id } = useParams();

    // Données temporaires pour construire l'interface.
    // Plus tard, elles viendront de l'API Laravel.
    const [formData, setFormData] = useState({
        title: "Campus Welcome Party",
        description:
            "Une soirée organisée par le BDE pour accueillir les étudiants du campus.",
        date: "2026-09-15",
        time: "19:00",
        location: "Campus ENAA",
        price: "50",
        capacity: "150",
        image: "",
    });

    const handleChange = (e) => {
        const { name, value } = e.target;

        setFormData({
            ...formData,
            [name]: value,
        });
    };

    const handleSubmit = (e) => {
        e.preventDefault();

        console.log("Event ID:", id);
        console.log("Updated event:", formData);
    };

    return (
        <div className="min-h-screen bg-gray-50">

            {/* Header */}
            <section className="bg-white ">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

                    <Link
                        to="/admin/events"
                        className="text-sm text-blue-600 font-medium hover:text-blue-700"
                    >
                        ← Retour aux événements
                    </Link>

                    <div className="mt-4">
                        <p className="text-sm text-gray-500">
                            Événement #{id}
                        </p>

                        <h1 className="mt-1 text-3xl font-bold text-gray-900">
                            Modifier l'événement
                        </h1>

                        <p className="mt-2 text-gray-600">
                            Modifiez les informations de cet événement.
                        </p>
                    </div>

                </div>
            </section>


            {/* Form */}
            <main className="py-10">

                <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

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
                                Modifiez les informations principales de l'événement.
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
                                Modifiez la date, l'heure et le lieu.
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
                                        className="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    />
                                </div>

                            </div>

                        </div>


                        {/* Settings */}
                        <div className="p-6 md:p-8 border-b border-gray-100">

                            <h2 className="text-xl font-semibold text-gray-900">
                                Paramètres
                            </h2>

                            <p className="mt-1 text-sm text-gray-500">
                                Modifiez le prix et la capacité de l'événement.
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
                                Modifiez l'image de l'événement.
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
                        <div className="p-6 md:p-8 flex flex-col-reverse sm:flex-row sm:justify-between gap-3">

                            <Link
                                to="/admin/events"
                                className="inline-flex justify-center items-center px-5 py-3 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-100 transition"
                            >
                                Annuler
                            </Link>


                            <button
                                type="submit"
                                className="px-5 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition"
                            >
                                Enregistrer les modifications
                            </button>

                        </div>

                    </form>

                </div>

            </main>

        </div>
    );
}

export default EditEvent;