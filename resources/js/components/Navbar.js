import React from 'react';

function Navbar({ user }) {
    const handleLogout = async (e) => {
        e.preventDefault();

        try {
            const response = await fetch('/logout', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                }
            });

            if (response.ok) {
                window.location.href = '/login';
            }
        } catch (error) {
            console.error('Logout failed:', error);
        }
    };

    const getCurrentDate = () => {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        return new Date().toLocaleDateString('en-US', options);
    };

    return (
        <nav className="bg-white shadow-sm">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="flex items-center justify-between py-3">
                    <div className="flex items-center gap-4">
                        <a href="/dashboard">
                            <img src="/images/school_logo.png" alt="School Logo" className="h-14 w-auto object-contain" />
                        </a>
                        <div className="flex flex-col">
                            <span className="text-lg font-semibold text-gray-800">
                                Welcome, {user?.name || 'Guest'}
                            </span>
                            <span className="text-sm text-gray-500">
                                {getCurrentDate()}
                            </span>
                        </div>
                    </div>

                    {/* Navigation */}
                    <div className="hidden md:flex gap-10 text-lg font-medium">
                        <a href="/dashboard" className="text-gray-800 hover:text-blue-600 transition">Dashboard</a>
                        <a href="/faculty" className="text-gray-800 hover:text-blue-600 transition">Faculty</a>
                        <a href="/students" className="text-gray-800 hover:text-blue-600 transition">Students</a>
                        <a href="#" className="text-gray-800 hover:text-blue-600 transition">Reports</a>
                        <a href="#" className="text-gray-800 hover:text-blue-600 transition">Settings</a>
                        <a href="/profile" className="text-gray-800 hover:text-blue-600">Profile</a>
                    </div>

                    {/* Logout */}
                    <form onSubmit={handleLogout}>
                        <button
                            type="submit"
                            className="px-4 py-2 text-white rounded-md hover:bg-red-700 transition"
                            style={{ background: '#243b80' }}
                        >
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    );
}

export default Navbar;
