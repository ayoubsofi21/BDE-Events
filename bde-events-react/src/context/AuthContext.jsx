import { createContext, useState } from "react";
import api from "../services/api";

const AuthContext = createContext();

export function AuthProvider({ children }) {
    const [user, setUser] = useState(null);
    const [token, setToken] = useState(null);

    const login = async (email, password) => {
        const response = await api.post("/login", {
            email,
            password,
        });

        const newToken = response.data.token;

        setToken(newToken);

        api.defaults.headers.common["Authorization"] = `Bearer ${newToken}`;

        const userResponse = await api.get("/me");

        setUser(userResponse.data);

        return userResponse.data;
    };

    const register = async (name, email, password, password_confirmation) => {
        const response = await api.post("/register", {
            name,
            email,
            password,
            password_confirmation,
        });

        return response.data;
    };

    const logout = async () => {
        await api.post("/logout");

        setUser(null);
        setToken(null);

        delete api.defaults.headers.common["Authorization"];
    };

    const value = {
        user,
        token,
        isAuthenticated: !!token,
        login,
        register,
        logout,
    };

    return (
        <AuthContext.Provider value={value}>
            {children}
        </AuthContext.Provider>
    );
}

export default AuthContext;