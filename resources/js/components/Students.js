import React, { useState, useEffect } from 'react';
import Navbar from './Navbar';

function Students({ user }) {
    const [students, setStudents] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        fetchStudents();
    }, []);

    const fetchStudents = async () => {
        try {
            const response = await fetch('/api/students', {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                }
            });
            const data = await response.json();
            setStudents(data);
        } catch (error) {
            console.error('Error fetching students:', error);
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="min-h-screen flex flex-col" style={{ fontFamily: 'Roboto, sans-serif' }}>
            <Navbar user={user} />

            <main className="relative flex-1">
                {/* Background removed to avoid covering UI interactions */}

                <div className="relative z-15 max-w-7xl mx-auto px-4 py-6">
                    <div className="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200">
                        <h2 className="text-2xl font-semibold text-gray-800 mb-4">Student Records</h2>

                        {loading ? (
                            <div className="text-center py-8">Loading students...</div>
                        ) : (
                            <div className="overflow-x-auto">
                                <table className="min-w-full border border-gray-200 text-sm text-gray-700">
                                    <thead className="bg-gray-100">
                                        <tr>
                                            <th className="px-4 py-2 border">Profile</th>
                                            <th className="px-4 py-2 border">Name</th>
                                            <th className="px-4 py-2 border">ID Number</th>
                                            <th className="px-4 py-2 border">Course</th>
                                            <th className="px-4 py-2 border">Year</th>
                                            <th className="px-4 py-2 border">Department</th>
                                            <th className="px-4 py-2 border">Email</th>
                                            <th className="px-4 py-2 border">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {students.length > 0 ? (
                                            students.map((student) => (
                                                <tr key={student.id} className="hover:bg-gray-50">
                                                    <td className="px-4 py-2 border text-center">
                                                        <img
                                                            src={student.profile_picture ? `/storage/${student.profile_picture}` : '/images/default-avatar.png'}
                                                            className="h-10 w-10 rounded-full mx-auto object-cover"
                                                            alt={student.first_name}
                                                        />
                                                    </td>
                                                    <td className="px-4 py-2 border">
                                                        {student.first_name} {student.middle_name} {student.last_name}
                                                    </td>
                                                    <td className="px-4 py-2 border">{student.id_number}</td>
                                                    <td className="px-4 py-2 border">{student.course}</td>
                                                    <td className="px-4 py-2 border">{student.year}</td>
                                                    <td className="px-4 py-2 border">{student.department}</td>
                                                    <td className="px-4 py-2 border">{student.email}</td>
                                                    <td className="px-4 py-2 border text-center">
                                                        <a
                                                            href={`/students/${student.id}`}
                                                            className="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition"
                                                        >
                                                           View
                                                        </a>
                                                    </td>
                                                </tr>
                                            ))
                                        ) : (
                                            <tr>
                                                <td colSpan="8" className="px-4 py-3 text-center text-gray-500">
                                                    No students found.
                                                </td>
                                            </tr>
                                        )}
                                    </tbody>
                                </table>
                            </div>
                        )}
                    </div>
                </div>
            </main>
        </div>
    );
}

export default Students;
