import React from 'react';
import Navbar from './Navbar';

function Dashboard({ user }) {
    return (
        <div className="min-h-screen flex flex-col">
            <Navbar user={user} />

            {/* Dashboard - Matches original exactly */}
            <main className="relative flex-1">
                {/* Background removed - prevents UI from being covered by absolute layer */}

                {/* Content */}
                <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                    <h1 className="text-3xl font-bold text-gray-800 mb-8">Dashboard</h1>
                    <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                        <div className="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200">
                            <h2 className="text-xl font-semibold text-gray-700">Faculty</h2>
                            <p className="text-sm text-gray-500 mt-2">Manage faculty records, assignments, and schedules.</p>
                            <a href="/faculty" className="mt-4 inline-block text-sm px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                                Go to Faculty
                            </a>
                        </div>

                        <div className="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200">
                            <h2 className="text-xl font-semibold text-gray-700">Students</h2>
                            <p className="text-sm text-gray-500 mt-2">View, enroll, and update student information.</p>
                            <a href="/students" className="mt-4 inline-block text-sm px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                                Go to Students
                            </a>
                        </div>

                        <div className="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200">
                            <h2 className="text-xl font-semibold text-gray-700">Reports</h2>
                            <p className="text-sm text-gray-500 mt-2">Generate academic and administrative reports.</p>
                            <a href="#" className="mt-4 inline-block text-sm px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                                Go to Reports
                            </a>
                        </div>

                        <div className="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200">
                            <h2 className="text-xl font-semibold text-gray-700">Registrar Tools</h2>
                            <p className="text-sm text-gray-500 mt-2">Access core registrar management functions.</p>
                            <a href="#" className="mt-4 inline-block text-sm px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                                Open Tools
                            </a>
                        </div>

                        <div className="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200">
                            <h2 className="text-xl font-semibold text-gray-700">Settings</h2>
                            <p className="text-sm text-gray-500 mt-2">Update portal configurations and preferences.</p>
                            <a href="#" className="mt-4 inline-block text-sm px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                                Go to Settings
                            </a>
                        </div>

                        <div className="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200">
                            <h2 className="text-xl font-semibold text-gray-700">Profile</h2>
                            <p className="text-sm text-gray-500 mt-2">Manage your account and profile details.</p>
                            <a href="/profile" className="mt-4 inline-block text-sm px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                                Go to Profile
                            </a>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    );
}

export default Dashboard;
