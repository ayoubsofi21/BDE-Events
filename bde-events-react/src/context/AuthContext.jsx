import { createContext, useContext } from "react";

const AuthContext = createContext();

function AuthProvider({ children }) {
  const value = {};

  return <AuthContext.Provider value={value}>{children}</AuthContext.Provider>;
}

function useAuth() {
  return useContext(AuthContext);
}

export { AuthProvider, useAuth };
