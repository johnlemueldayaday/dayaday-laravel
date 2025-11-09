import React from 'react';
import { BrowserRouter, Routes, Route, Navigate } from 'react-router-dom';
import Welcome from './Welcome';
import Login from './Login';
import Register from './Register';
import Home from './Home';
import Students from './Students';
import Faculty from './Faculty';
import Dashboard from './Dashboard';
import Profile from './Profile';

function App() {
    // Get initial auth state from Laravel (passed via meta tag or global variable)
    const isAuthenticated = window.Laravel?.isAuthenticated || false;
    const user = window.Laravel?.user || null;

    return (
        <BrowserRouter>
            <Routes>
                {/* Public routes */}
                <Route path="/" element={<Welcome user={user} />} />
                <Route path="/welcome" element={<Welcome user={user} />} />
                <Route path="/login" element={<Login />} />
                <Route path="/register" element={<Register />} />

                {/* Protected routes */}
                <Route path="/home" element={isAuthenticated ? <Home user={user} /> : <Navigate to="/login" />} />
                <Route path="/dashboard" element={isAuthenticated ? <Dashboard user={user} /> : <Navigate to="/login" />} />
                <Route path="/students" element={isAuthenticated ? <Students user={user} /> : <Navigate to="/login" />} />
                <Route path="/faculty" element={isAuthenticated ? <Faculty user={user} /> : <Navigate to="/login" />} />
                <Route path="/profile" element={isAuthenticated ? <Profile user={user} /> : <Navigate to="/login" />} />
            </Routes>
        </BrowserRouter>
    );
}

export default App;
