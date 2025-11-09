import React, { useState } from 'react';
import Navbar from './Navbar';

function Profile({ user }) {
    // Initialize with common profile fields (try multiple possible locations on the user object)
    const initial = {
        first_name: user?.first_name || user?.profile?.first_name || (user?.name ? user.name.split(' ')[0] : '') || '',
        middle_name: user?.middle_name || user?.profile?.middle_name || '',
        last_name: user?.last_name || user?.profile?.last_name || (user?.name ? user.name.split(' ').slice(-1)[0] : '') || '',
        email: user?.email || '',
        phone: user?.profile?.phone || '',
        department: user?.profile?.department || '',
        position: user?.profile?.position || '',
        employee_id: user?.profile?.employee_id || '',
        address: user?.profile?.address || '',
        birthdate: user?.profile?.birthdate || '',
        gender: user?.profile?.gender || '',
        avatar_url: user?.profile?.avatar || user?.avatar || ''
    };

    const [formData, setFormData] = useState({
        ...initial,
        currentPassword: '',
        newPassword: '',
        confirmPassword: ''
    });
    const [message, setMessage] = useState('');
    const [avatarPreview, setAvatarPreview] = useState(initial.avatar_url || '/images/default-avatar.png');
    const [avatarFile, setAvatarFile] = useState(null);

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData(prev => ({ ...prev, [name]: value }));
    };

    const handleFileChange = (e) => {
        const file = e.target.files[0];
        if (!file) return;
        setAvatarFile(file);
        const reader = new FileReader();
        reader.onload = (ev) => setAvatarPreview(ev.target.result);
        reader.readAsDataURL(file);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setMessage('');

        try {
            let response;
            if (avatarFile) {
                const fd = new FormData();
                Object.keys(formData).forEach(key => {
                    // skip empty password fields if not provided
                    if ((key === 'currentPassword' || key === 'newPassword' || key === 'confirmPassword') && !formData[key]) return;
                    fd.append(key, formData[key]);
                });
                fd.append('avatar', avatarFile);

                response = await fetch('/profile/update', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    },
                    body: fd
                });
            } else {
                // JSON fallback
                const payload = { ...formData };
                response = await fetch('/profile/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    },
                    body: JSON.stringify(payload)
                });
            }

            if (response.ok) {
                setMessage('Profile updated successfully!');
            } else {
                const data = await response.json().catch(() => ({}));
                setMessage(data.message || 'Failed to update profile.');
            }
        } catch (error) {
            setMessage('An error occurred. Please try again.');
        }
    };

    return (
        <div className="min-h-screen flex flex-col" style={{ fontFamily: 'Roboto, sans-serif', background: '#f3f4f6' }}>
            <Navbar user={user} />

            <main className="flex-1 p-8">
                <div className="max-w-4xl mx-auto">
                    <div className="bg-white p-8 rounded-lg shadow-md">
                        <h1 className="text-3xl font-bold text-gray-800 mb-6">Profile</h1>

                        {message && (
                            <div className={`mb-6 p-4 rounded-lg ${message.toLowerCase().includes('success') ? 'bg-green-100 text-green-700 border border-green-300' : 'bg-red-100 text-red-700 border border-red-300'}`}>
                                {message}
                            </div>
                        )}

                        <form onSubmit={handleSubmit} className="space-y-6">
                            <div className="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
                                {/* Avatar / Summary */}
                                <div className="col-span-1">
                                    <div className="flex flex-col items-center">
                                        <img src={avatarPreview} alt="avatar" className="h-32 w-32 rounded-full object-cover mb-4" />
                                        <label className="text-sm text-gray-600 mb-2">Profile Photo</label>
                                        <input type="file" accept="image/*" onChange={handleFileChange} />
                                    </div>
                                </div>

                                {/* Details */}
                                <div className="col-span-1 lg:col-span-2">
                                    <h2 className="text-lg font-semibold text-gray-800 mb-4">Personal Information</h2>

                                    <div className="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                        <div>
                                            <label className="block text-sm font-medium text-gray-700 mb-2">First name</label>
                                            <input name="first_name" value={formData.first_name} onChange={handleChange} className="w-full px-3 py-2 border rounded" />
                                        </div>
                                        <div>
                                            <label className="block text-sm font-medium text-gray-700 mb-2">Middle name</label>
                                            <input name="middle_name" value={formData.middle_name} onChange={handleChange} className="w-full px-3 py-2 border rounded" />
                                        </div>
                                        <div>
                                            <label className="block text-sm font-medium text-gray-700 mb-2">Last name</label>
                                            <input name="last_name" value={formData.last_name} onChange={handleChange} className="w-full px-3 py-2 border rounded" />
                                        </div>
                                    </div>

                                    <div className="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label className="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                            <input name="email" type="email" value={formData.email} onChange={handleChange} className="w-full px-3 py-2 border rounded" />
                                        </div>
                                        <div>
                                            <label className="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                            <input name="phone" value={formData.phone} onChange={handleChange} className="w-full px-3 py-2 border rounded" />
                                        </div>
                                    </div>

                                    <div className="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                        <div>
                                            <label className="block text-sm font-medium text-gray-700 mb-2">Department</label>
                                            <input name="department" value={formData.department} onChange={handleChange} className="w-full px-3 py-2 border rounded" />
                                        </div>
                                        <div>
                                            <label className="block text-sm font-medium text-gray-700 mb-2">Position</label>
                                            <input name="position" value={formData.position} onChange={handleChange} className="w-full px-3 py-2 border rounded" />
                                        </div>
                                        <div>
                                            <label className="block text-sm font-medium text-gray-700 mb-2">Employee ID</label>
                                            <input name="employee_id" value={formData.employee_id} onChange={handleChange} className="w-full px-3 py-2 border rounded" />
                                        </div>
                                    </div>

                                    <div className="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label className="block text-sm font-medium text-gray-700 mb-2">Birthdate</label>
                                            <input name="birthdate" type="date" value={formData.birthdate} onChange={handleChange} className="w-full px-3 py-2 border rounded" />
                                        </div>
                                        <div>
                                            <label className="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                                            <select name="gender" value={formData.gender} onChange={handleChange} className="w-full px-3 py-2 border rounded">
                                                <option value="">Select</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div className="mb-4">
                                        <label className="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                        <input name="address" value={formData.address} onChange={handleChange} className="w-full px-3 py-2 border rounded" />
                                    </div>
                                </div>
                            </div>

                            {/* Change Password Section */}
                            <div className="pb-6 border-t pt-6">
                                <h2 className="text-lg font-semibold text-gray-800 mb-4">Change Password</h2>

                                <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                        <input name="currentPassword" type="password" value={formData.currentPassword} onChange={handleChange} className="w-full px-3 py-2 border rounded" />
                                    </div>
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                        <input name="newPassword" type="password" value={formData.newPassword} onChange={handleChange} className="w-full px-3 py-2 border rounded" />
                                    </div>
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                        <input name="confirmPassword" type="password" value={formData.confirmPassword} onChange={handleChange} className="w-full px-3 py-2 border rounded" />
                                    </div>
                                </div>
                            </div>

                            {/* Submit Button */}
                            <div className="flex justify-end">
                                <button type="submit" className="px-6 py-3 bg-[#243b80] text-white rounded-md hover:opacity-95 transition">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    );
}

export default Profile;
