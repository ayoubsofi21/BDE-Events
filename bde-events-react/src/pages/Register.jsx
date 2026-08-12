import React, { useState,useContext } from "react";
import { Link ,useNavigate} from "react-router-dom";
import { AuthContext } from "../context/AuthContext";

function Register() {
        const { register } = useContext(AuthContext);

        const navigate = useNavigate();

        const [name, setName] = useState("");
        const [email, setEmail] = useState("");
        const [password, setPassword] = useState("");
        const [passwordConfirmation, setPasswordConfirmation] = useState("");

        const [error, setError] = useState("");
        const [loading, setLoading] = useState(false);

    const handleSubmit = async (e) => {
            e.preventDefault();

            setError("");
            setLoading(true);

            try {
                await register(
                    name,
                    email,
                    password,
                    passwordConfirmation
                );

                console.log("Register success");

                console.log("Avant navigate");
                navigate("/events");
                console.log("Après navigate");

            } catch (error) {
                console.error("Erreur register :", error);

                if (error.response?.status === 422) {
                    setError("Vérifiez les informations saisies.");
                } else {
                    setError("Une erreur est survenue. Veuillez réessayer.");
                }

            } finally {
                setLoading(false);
            }
        };
  return (
    <div className="min-h-[calc(100vh-4rem)] bg-gray-50 flex items-center justify-center px-4 py-12">
      <div className="w-full max-w-md">
        {/* Header */}
        <div className="text-center mb-8">
          <Link to="/" className="text-3xl font-bold text-blue-600">
            BDE-Events
          </Link>
          <h1 className="mt-6 text-2xl font-bold text-gray-900">
            Créer un compte
          </h1>

          <p className="mt-2 text-gray-600">
            Rejoignez la communauté BDE-Events
          </p>
        </div>
        <div className="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
          <form onSubmit={handleSubmit}>
            <div>
              <label
                htmlFor="name"
                className="block text-sm font-medium text-gray-700 mb-2"
              >
                Nom complet
              </label>
              <input
                id="name"
                type="text"
                value={name}
                onChange={(e)=>setName(e.target.value)}
                placeholder="Votre nom complet"
                className="w-full px-4 py-3 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              />
            </div>
            <div className="mt-5">
              <label
                htmlFor="email"
                className="block text-sm font-medium text-gray-700 mb-2"
              >
                Email
              </label>
              <input
                id="email"
                type="email"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                placeholder="exemple@email.com"
                className="w-full px-4 py-3 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              />
            </div>
            <div className="mt-5">
              <label
                htmlFor="password"
                className="block text-sm font-medium text-gray-700 mb-2"
              >
                Mot de passe
              </label>
              <input
                id="password"
                type="password"
                placeholder="••••••••"
                  value={password}
                onChange={(e) => setPassword(e.target.value)}
                className="w-full px-4 py-3 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              />
            </div>
            <div className="mt-5">
              <label
                htmlFor="password_confirmation"
                className="block text-sm font-medium text-gray-700 mb-2"
              >
                Confirmer le mot de passe
              </label>
              <input
                id="password_confirmation"
                type="password"
                placeholder="••••••••"
                  value={passwordConfirmation}
                onChange={(e) => setPasswordConfirmation(e.target.value)}
                className="w-full px-4 py-3 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              />
            </div>
                {error && (
                    <p className="mt-4 text-sm text-red-600">
                        {error}
                    </p>
                    )}
            <div className="flex items-start mt-5">
              <input
                id="terms"
                type="checkbox"
                className="w-4 h-4 mt-1 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
              />
              <label htmlFor="terms" className="ml-2 text-sm text-gray-600">
                J'accepte les conditions d'utilisation de BDE-Events.
              </label>
            </div>
            <button
                type="submit"
                disabled={loading}
                className="w-full mt-6 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition disabled:opacity-50"
            >
                {loading ? "Création..." : "Créer mon compte"}
            </button>
          </form>
          <div className="mt-6 text-center text-sm text-gray-600">
            Vous avez déjà un compte ?{" "}
            <Link
              to="/login"
              className="text-blue-600 font-semibold hover:text-blue-700"
            >
              Se connecter
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Register;
