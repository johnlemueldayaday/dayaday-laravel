import React, { useState } from 'react';

function Register() {
    const [formData, setFormData] = useState({
        name: '',
        email: '',
        password: ''
    });
    const [errors, setErrors] = useState({});

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const response = await fetch('/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify(formData)
            });

            if (response.ok) {
                window.location.href = '/home';
            } else {
                const data = await response.json();
                setErrors(data.errors || { general: 'Registration failed' });
            }
        } catch (error) {
            setErrors({ general: 'An error occurred. Please try again.' });
        }
    };

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: value
        }));
    };

    return (
        <div className="min-h-screen flex items-center justify-center p-4 sm:p-6 relative" style={{ background: '#fbfbfe', fontFamily: 'Nunito, sans-serif' }}>
            {/* Logo */}
            <a href="/" className="absolute top-4 left-4 sm:top-6 sm:left-6 z-20">
                <img
                    src="/images/ihs-logo.png"
                    alt="IHS Logo"
                    className="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 xl:w-28 xl:h-28 object-contain"
                />
            </a>

            {/* Register Card */}
            <div className="w-full max-w-6xl bg-white shadow-lg overflow-hidden flex flex-col lg:flex-row" style={{ borderRadius: '1rem' }}>

                {/* Left Panel - Info Section */}
                <div className="hidden lg:flex lg:w-2/3 text-white p-8 xl:p-12 flex-col gap-6" style={{ background: '#243b80' }}>
                    <h2 className="text-3xl xl:text-4xl font-bold tracking-tight italic" style={{ fontFamily: 'Work Sans, Roboto, sans-serif' }}>
                        IHS Admin
                    </h2>

                    <div className="mt-2 text-sm leading-relaxed" style={{ fontFamily: 'Roboto, Nunito, sans-serif' }}>
                        <p className="mb-4">
                            Create your account to access the IHS Admin system. Make sure to use a valid University email or ID.
                        </p>

                        <p className="mb-3">
                            <strong>Password Policy:</strong><br />
                            Minimum of 6 characters. Use a mix of letters and numbers for security.
                        </p>

                        <p className="mt-6 text-xs opacity-90">
                            Access IHS for Graduate degree programs: opisv2025.ihs.edu.ph.
                        </p>
                    </div>
                </div>

                {/* Right Panel - Register Form */}
                <div className="w-full lg:w-1/3 p-6 sm:p-8 xl:p-10 bg-white">
                    {/* Register Header */}
                    <div className="mb-6">
                        <h3 className="text-xl sm:text-2xl font-semibold text-gray-800">Create an Account</h3>
                        <p className="text-sm text-gray-500 mt-1">Fill in your details below to register</p>
                    </div>

                    {/* Register Form */}
                    <form onSubmit={handleSubmit} className="space-y-4">
                        {/* Name */}
                        <div>
                            <label className="sr-only" htmlFor="name">Full Name</label>
                            <div className="flex items-center bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                                <img src="/images/admin-icon.png" alt="Name Icon" className="w-5 h-5 object-contain" />
                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    value={formData.name}
                                    onChange={handleChange}
                                    required
                                    className="w-full bg-transparent outline-none ml-3 text-sm sm:text-base"
                                    placeholder="Full Name"
                                />
                            </div>
                            {errors.name && <p className="text-xs text-red-600 mt-1">{errors.name}</p>}
                        </div>

                        {/* Email */}
                        <div>
                            <label className="sr-only" htmlFor="email">Email</label>
                            <div className="flex items-center bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                                <img src="/images/admin-icon.png" alt="Email Icon" className="w-5 h-5 object-contain" />
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value={formData.email}
                                    onChange={handleChange}
                                    required
                                    className="w-full bg-transparent outline-none ml-3 text-sm sm:text-base"
                                    placeholder="Email"
                                />
                            </div>
                            {errors.email && <p className="text-xs text-red-600 mt-1">{errors.email}</p>}
                        </div>

                        {/* Password */}
                        <div>
                            <label className="sr-only" htmlFor="password">Password</label>
                            <div className="flex items-center bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                                <img src="/images/password-icon.png" alt="Password Icon" className="w-5 h-5 object-contain" />
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    value={formData.password}
                                    onChange={handleChange}
                                    required
                                    className="w-full bg-transparent outline-none ml-3 text-sm sm:text-base"
                                    placeholder="Password"
                                />
                            </div>
                            {errors.password && <p className="text-xs text-red-600 mt-1">{errors.password}</p>}
                        </div>

                        {/* Submit Button */}
                        <div>
                            <button
                                type="submit"
                                className="w-full py-3 text-white font-semibold rounded-md hover:opacity-95 transition"
                                style={{ background: '#243b80' }}
                            >
                                Register
                            </button>
                        </div>

                        {/* Error Message */}
                        {errors.general && (
                            <div className="text-sm text-red-600">
                                {errors.general}
                            </div>
                        )}
                    </form>

                    {/* Link to login */}
                    <div className="mt-4 text-sm text-gray-600 text-center">
                        Already have an account?
                        <a href="/login" className="text-blue-600 hover:underline ml-1">Log in</a>
                    </div>
                </div>
            </div>

            {/* Mobile Info Card */}
            <div className="lg:hidden max-w-6xl w-full mt-6">
                <div className="rounded-xl p-6 text-white" style={{ background: '#243b80' }}>
                    <h3 className="text-lg sm:text-xl font-bold mb-3">IHS Admin</h3>
                    <p className="text-sm sm:text-base">
                        Register with your University email or ID to access the Admin portal.
                    </p>
                </div>
            </div>
        </div>
    );
}

export default Register;
