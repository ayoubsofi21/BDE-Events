import { createContext, useState, useEffect } from "react";
import api from "../services/api";

export const AuthContext = createContext();

function AuthContextProvider({ children }) {

    const [user, setUser] = useState(null);
    const [loading,setLoading]=useState(true);
    const [token, setToken] = useState(
        localStorage.getItem("token")
    );

    const login = async (email, password) => {

        const response = await api.post("/login", {
            email,
            password,
        });

        const user = response.data.data.user;
        const token = response.data.data.token;

        localStorage.setItem("token", token);

        setUser(user);
        setToken(token);
    };

    const register = async (
        name,
        email,
        password,
        passwordConfirmation
    ) => {

        const response = await api.post("/register", {
            name,
            email,
            password,
            password_confirmation: passwordConfirmation,
        });

        const user = response.data.data.user;
        const token = response.data.data.token;

        localStorage.setItem("token", token);

        setUser(user);
        setToken(token);
    };
    const getUser = async () => {
            try {
                const response = await api.get("/me", {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                });
                setUser(response.data.data.user);

            } catch (error) {
                console.log("Session invalide");
                localStorage.removeItem("token");
                setToken(null);
                setUser(null);
            } finally {
                setLoading(false);
            }
        };

    const logout = async () => {
        try {
            await api.post(
                "/logout",
                {},
                {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                }
            );
        } catch (error) {
            console.error("Erreur logout :", error);
        }

        localStorage.removeItem("token");
        setToken(null);
        setUser(null);
    };

    useEffect(() => {

        if (token) {
            getUser();
        } else {
            setLoading(false);
        }

    }, []);
    return (
        <AuthContext.Provider
            value={{
                user,
                token,
                login,
                register,
                logout,
            }}
        >
            {children}
        </AuthContext.Provider>
    );
}

export default AuthContextProvider;