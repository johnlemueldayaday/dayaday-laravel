import React, { useState } from 'react';

function Login() {
    const [formData, setFormData] = useState({
        email: '',
        password: '',
        remember: false
    });
    const [errors, setErrors] = useState({});

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const response = await fetch('/login', {
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
                setErrors(data.errors || { general: 'Login failed' });
            }
        } catch (error) {
            setErrors({ general: 'An error occurred. Please try again.' });
        }
    };

    const handleChange = (e) => {
        const { name, value, type, checked } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: type === 'checkbox' ? checked : value
        }));
    };

    return (
        <div className="min-h-screen flex items-center justify-center p-4 sm:p-6 relative" style={{ background: '#fbfbfe', fontFamily: 'Nunito, sans-serif' }}>
            <a href="/" className="absolute top-4 left-4 sm:top-6 sm:left-6 z-20">
                <img
                    src="/images/ihs-logo.png"
                    alt="IHS Logo"
                    className="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 xl:w-28 xl:h-28 object-contain"
                />
            </a>

            {/* Login Card */}
            <div className="w-full max-w-6xl bg-white shadow-lg overflow-hidden flex flex-col lg:flex-row" style={{ borderRadius: '1rem' }}>

                {/* Left Panel - Info Section */}
                <div className="hidden lg:flex lg:w-2/3 text-white p-8 xl:p-12 flex-col gap-6" style={{ background: '#243b80' }}>
                    <h2 className="text-3xl xl:text-4xl font-bold tracking-tight italic">IHS Admin</h2>

                    <div className="mt-2 text-sm leading-relaxed">
                        <p className="mb-4">
                            Is this your first time here? Your username is your University ID and your default password is a
                            combination of your Last Name, in capital letters, and the last four (4) digits of your University ID number.
                        </p>

                        <p className="mb-3">
                            <strong>Example using University ID:</strong><br />
                            username: 2013001934<br />
                            password: LEE1934
                        </p>

                        <p className="mb-3">
                            <strong>Example using University email:</strong><br />
                            username: 2013001934@my.ihs.edu.ph<br />
                            password: LEE1934
                        </p>

                        <p className="mt-6 text-xs opacity-90">
                            Access IHS for Graduate degree programs: opisv2025.ihs.edu.ph.
                        </p>
                    </div>
                </div>

                {/* Right Panel - Login Form */}
                <div className="w-full lg:w-1/3 p-6 sm:p-8 xl:p-10 bg-white">
                    <div className="mb-6">
                        <h3 className="text-xl sm:text-2xl font-semibold text-gray-800">Already have an account?</h3>
                        <p className="text-sm text-gray-500 mt-1">Sign in with your University ID or email</p>
                    </div>

                    <form onSubmit={handleSubmit} className="space-y-4">
                        {/* Email/Admin ID Input */}
                        <div>
                            <label className="sr-only" htmlFor="email">Admin ID / Email</label>
                            <div className="flex items-center bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                                <img src="/images/admin-icon.png" alt="Admin Icon" className="w-5 h-5 object-contain" />
                                <input
                                    id="email"
                                    name="email"
                                    type="text"
                                    value={formData.email}
                                    onChange={handleChange}
                                    required
                                    className="w-full bg-transparent outline-none ml-3 text-sm sm:text-base"
                                    placeholder="Admin ID"
                                />
                            </div>
                            {errors.email && <p className="text-xs text-red-600 mt-1">{errors.email}</p>}
                        </div>

                        {/* Password Input */}
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

                        {/* Options Row */}
                        <div className="flex items-center justify-between text-sm">
                            <label className="inline-flex items-center gap-2 text-gray-600">
                                <input
                                    type="checkbox"
                                    name="remember"
                                    checked={formData.remember}
                                    onChange={handleChange}
                                    className="form-checkbox h-4 w-4 text-blue-600 rounded"
                                />
                                Remember username
                            </label>
                            <a href="#" className="text-blue-600 hover:underline">Forgot password?</a>
                        </div>

                        {/* Submit Button */}
                        <div>
                            <button
                                type="submit"
                                className="w-full py-3 text-white font-semibold rounded-md hover:opacity-95 transition"
                                style={{ background: '#243b80' }}
                            >
                                Log in
                            </button>
                        </div>

                        {/* Error Message */}
                        {errors.general && (
                            <div className="text-sm text-red-600">
                                {errors.general}
                            </div>
                        )}
                    </form>

                    {/* Link to register */}
                    <div className="mt-4 text-sm text-gray-600 text-center">
                        Don't have an account?
                        <a href="/register" className="text-blue-600 hover:underline ml-1">Register here</a>
                    </div>
                </div>
            </div>

            {/* Mobile Info Card */}
            <div className="lg:hidden max-w-6xl w-full mt-6">
                <div className="text-white rounded-xl p-6" style={{ background: '#243b80' }}>
                    <h3 className="text-lg sm:text-xl font-bold mb-3">IHS Admin</h3>
                    <p className="text-sm sm:text-base">
                        Your username is your University ID or email. Default password: LASTNAME + last 4 digits of your ID.
                    </p>
                </div>
            </div>
        </div>
    );
}

export default Login;
