import React, { useState } from 'react';

function Faculty({ user }) {
    const [facultyList] = useState([
        { id: 1, name: 'Dr. Jane Smith', department: 'Mathematics', email: 'jane.smith@university.edu' },
        { id: 2, name: 'Prof. John Doe', department: 'Physics', email: 'john.doe@university.edu' }
    ]);

    return (
        <div className="min-h-screen bg-gray-100">
            {/* Simple Navbar - Matches original faculty.blade.php */}
            <nav className="bg-white shadow-md px-6 py-4 flex items-center gap-6">
                <span className="text-2xl font-extrabold text-blue-700 tracking-wide">Registrar</span>
                <a href="/dashboard" className="text-gray-600 hover:text-blue-600 transition">Dashboard</a>
                <a href="/faculty" className="text-blue-700 font-bold underline">Faculty</a>
                <a href="/students" className="text-gray-600 hover:text-blue-600 transition">Student</a>
                <a href="#" className="text-gray-600 hover:text-blue-600 transition">Report</a>
                <a href="#" className="text-gray-600 hover:text-blue-600 transition">Setting</a>
                <a href="/profile" className="text-gray-600 hover:text-blue-600 transition">Profile</a>
            </nav>

            <main className="p-8">
                <div className="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
                    <div className="flex justify-between items-center mb-6">
                        <h2 className="text-2xl font-bold text-gray-800">Faculty List</h2>
                        <button className="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            Add New Faculty
                        </button>
                    </div>

                    <div className="overflow-x-auto">
                        <table className="min-w-full border border-gray-300">
                            <thead className="bg-blue-50">
                                <tr>
                                    <th className="px-4 py-3 border border-gray-300 text-left text-gray-700 font-semibold">Name</th>
                                    <th className="px-4 py-3 border border-gray-300 text-left text-gray-700 font-semibold">Department</th>
                                    <th className="px-4 py-3 border border-gray-300 text-left text-gray-700 font-semibold">Email</th>
                                    <th className="px-4 py-3 border border-gray-300 text-left text-gray-700 font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {facultyList.map((faculty) => (
                                    <tr key={faculty.id} className="hover:bg-gray-50 transition">
                                        <td className="px-4 py-3 border border-gray-300 text-gray-700">{faculty.name}</td>
                                        <td className="px-4 py-3 border border-gray-300 text-gray-700">{faculty.department}</td>
                                        <td className="px-4 py-3 border border-gray-300 text-gray-700">{faculty.email}</td>
                                        <td className="px-4 py-3 border border-gray-300">
                                            <button className="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition text-sm mr-2">
                                                Edit
                                            </button>
                                            <button className="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition text-sm">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    );
}

export default Faculty;
