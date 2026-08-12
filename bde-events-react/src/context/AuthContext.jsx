import { createContext, useState } from "react";
import api from "../services/api";
export const AuthContext = createContext();
function AuthContextProvider({ children }) {
  const [user, setUser] = useState(null);
  const [token, setToken] = useState(localStorage.getItem("token"));
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

  const logout = async () => {
    try {
      await api.post(
        "/logout",
        {},
        {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        },
      );
    } catch (error) {
      console.error("Erreur logout :", error);
    }

    localStorage.removeItem("token");

    setToken(null);
    setUser(null);
  };

  return (
    <AuthContext.Provider
      value={{
        user,
        token,
        login,
        logout,
      }}
    >
      {children}
    </AuthContext.Provider>
  );
}

export default AuthContextProvider;
