import React from "react";
import { Link ,useNavigate } from "react-router-dom";
import {useState, useContext} from "react";
import { AuthContext } from "../context/AuthContext";
function Login() {
    const { login } = useContext(AuthContext);
    const navigate = useNavigate();
    const [email,setEmail]=useState("");
    const [password,setPassword]=useState("");
    const [error, setError] = useState("");
    const [loading, setLoading] = useState(false);
    // const handleSubmit=()=>{
    // }
      const handleSubmit = async (e) => {
        e.preventDefault();
        setError("");
        setLoading(true);
        try {
            await login(email, password);
            navigate("/events");
        } catch (error) {
            console.error("Erreur login :", error);

            if (error.response?.status === 422) {
                setError("Email ou mot de passe incorrect.");
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
        <div className="text-center mb-8">
          <Link to="/" className="text-3xl font-bold text-blue-600">
            BDE-Events
          </Link>

          <h1 className="mt-6 text-2xl font-bold text-gray-900">
            Welcome back
          </h1>
          <p className="mt-2 text-gray-600">
            Connectez-vous à votre compte étudiant
          </p>
        </div>
        <div className="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
          <form onSubmit={handleSubmit}>
            <div>
              <label
                htmlFor="email"
                className="block text-sm font-medium text-gray-700 mb-2"
              >
                Email
              </label>
              <input
                id="email"
                type="email"
                placeholder="exemple@email.com"
                value={email}
                onChange={(e)=>setEmail(e.target.value)}
                className="w-full px-4 py-3 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              />
            </div>
            <div className="mt-5">
              <div className="flex items-center justify-between mb-2">
                <label
                  htmlFor="password"
                  className="block text-sm font-medium text-gray-700"
                >
                  Mot de passe
                </label>
                <button
                  type="button"
                  className="text-sm text-blue-600 hover:text-blue-700 font-medium"
                >
                  Mot de passe oublié ?
                </button>
              </div>
              <input
                id="password"
                type="password"
                placeholder="••••••••"
                value={password}
                onChange={(e)=>setPassword(e.target.value)}
                className="w-full px-4 py-3 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
              />
            </div>
            {error && (<p className="mt-4 text-sm text-red-600">{error}</p>)}
            <div className="flex items-center mt-5">
              <input
                id="remember"
                type="checkbox"
                className="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
              />

              <label htmlFor="remember" className="ml-2 text-sm text-gray-600">
                Se souvenir de moi
              </label>
            </div>
            <button
              type="submit"
              disabled={loading}
              className="w-full mt-6 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition"
            >
              {loading ? "en cours enregistrer les donnees" :"Se connecter"}
            </button>
          </form>
          <div className="mt-6 text-center text-sm text-gray-600">
            Vous n'avez pas encore de compte ?{" "}
            <Link
              to="/register"
              className="text-blue-600 font-semibold hover:text-blue-700"
            >
              Créer un compte
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Login;