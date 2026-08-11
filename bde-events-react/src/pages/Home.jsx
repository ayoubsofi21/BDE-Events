import React from "react";
import { Link } from "react-router-dom";

function Home() {
    return (
        <div className="bg-gray-50">

            {/* Hero Section */}
            <section className="bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">

                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                        {/* Hero Content */}
                        <div>
                            <span className="inline-block bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-semibold mb-6">
                                ENAA Campus
                            </span>

                            <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                                Discover.
                                <span className="text-blue-600"> Connect.</span>
                                <br />
                                Experience.
                            </h1>

                            <p className="mt-6 text-lg text-gray-600 leading-8 max-w-xl">
                                Découvrez les événements de votre campus,
                                réservez votre place et profitez pleinement
                                de la vie étudiante avec BDE-Events.
                            </p>

                            <div className="mt-8 flex flex-col sm:flex-row gap-4">

                                <Link
                                    to="/events"
                                    className="inline-flex justify-center items-center bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition"
                                >
                                    Voir les événements
                                </Link>

                                <Link
                                    to="/register"
                                    className="inline-flex justify-center items-center border border-gray-300 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition"
                                >
                                    Créer un compte
                                </Link>

                            </div>
                        </div>

                        {/* Hero Visual */}
                        <div className="hidden lg:flex justify-center">
                            <div className="w-full max-w-md h-80 bg-blue-100 rounded-3xl flex items-center justify-center">

                                <div className="text-center">
                                    <div className="w-24 h-24 bg-blue-600 rounded-2xl mx-auto flex items-center justify-center">
                                        <span className="text-4xl font-bold text-white">
                                            BDE
                                        </span>
                                    </div>

                                    <h2 className="mt-6 text-2xl font-bold text-gray-800">
                                        BDE-Events
                                    </h2>

                                    <p className="mt-2 text-gray-500">
                                        La vie étudiante en un seul endroit.
                                    </p>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </section>


            {/* Introduction */}
            <section className="py-16">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    <div className="text-center max-w-2xl mx-auto">
                        <h2 className="text-3xl font-bold text-gray-900">
                            Tout ce dont vous avez besoin
                        </h2>

                        <p className="mt-4 text-gray-600">
                            BDE-Events simplifie la découverte et la réservation
                            des événements organisés sur le campus.
                        </p>
                    </div>


                    {/* Features */}
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">

                        {/* Feature 1 */}
                        <div className="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                            <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <span className="text-blue-600 text-xl">
                                    📅
                                </span>
                            </div>

                            <h3 className="mt-5 text-xl font-semibold text-gray-900">
                                Découvrez les événements
                            </h3>

                            <p className="mt-3 text-gray-600 leading-6">
                                Consultez facilement les soirées, conférences,
                                séminaires et autres événements du campus.
                            </p>
                        </div>


                        {/* Feature 2 */}
                        <div className="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                            <div className="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <span className="text-green-600 text-xl">
                                    🎟️
                                </span>
                            </div>

                            <h3 className="mt-5 text-xl font-semibold text-gray-900">
                                Réservez votre place
                            </h3>

                            <p className="mt-3 text-gray-600 leading-6">
                                Réservez rapidement votre place pour participer
                                aux événements qui vous intéressent.
                            </p>
                        </div>


                        {/* Feature 3 */}
                        <div className="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                            <div className="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <span className="text-purple-600 text-xl">
                                    🎫
                                </span>
                            </div>

                            <h3 className="mt-5 text-xl font-semibold text-gray-900">
                                Retrouvez vos billets
                            </h3>

                            <p className="mt-3 text-gray-600 leading-6">
                                Retrouvez facilement vos réservations et vos
                                billets numériques depuis votre espace étudiant.
                            </p>
                        </div>

                    </div>

                </div>
            </section>


            {/* CTA Section */}
            <section className="bg-blue-600">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

                    <div className="text-center">
                        <h2 className="text-3xl font-bold text-white">
                            Prêt à découvrir les prochains événements ?
                        </h2>

                        <p className="mt-4 text-blue-100 max-w-2xl mx-auto">
                            Explorez les événements du campus et réservez
                            votre place dès maintenant.
                        </p>

                        <div className="mt-8">
                            <Link
                                to="/events"
                                className="inline-flex items-center bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition"
                            >
                                Explorer les événements
                            </Link>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    );
}

export default Home;