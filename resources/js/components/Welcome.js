import React, { useEffect } from "react";

export default function Welcome() {
    useEffect(() => {
        // Carousel logic
        const root = document.getElementById("carousel");
        if (!root) return;
        const slides = Array.from(root.querySelectorAll(".carousel-item"));
        const dots = Array.from(document.querySelectorAll("#carousel-dots .dot"));
        let current = 0;
        const total = slides.length;
        const intervalMs = 5000;
        let timer = null;

        function show(index) {
            slides.forEach((s, i) => {
                s.classList.toggle("opacity-100", i === index);
                s.classList.toggle("opacity-0", i !== index);
                s.style.zIndex = i === index ? 20 : 10;
            });
            dots.forEach((d, i) =>
                d.classList.toggle("bg-white/70", i === index)
            );
            current = index;
        }

        function next() {
            show((current + 1) % total);
        }
        function start() {
            stop();
            timer = setInterval(next, intervalMs);
        }
        function stop() {
            if (timer) clearInterval(timer);
        }

        dots.forEach((d) =>
            d.addEventListener("click", () => {
                show(+d.dataset.dot);
                stop();
                start();
            })
        );
        root.addEventListener("mouseenter", stop);
        root.addEventListener("mouseleave", start);

        show(0);
        start();
    }, []);

    return (
        <div className="min-h-screen flex flex-col">
            {/* Navbar */}
            <nav className="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex items-center justify-between py-3">
                        <div className="flex items-center gap-4">
                            <img
                                src="/images/school_logo.png"
                                alt="School Logo"
                                className="h-14 w-auto object-contain"
                            />
                            <span className="text-2xl font-bold text-gray-800 pl-14">
                                International Horizon School
                            </span>
                        </div>
                        {/* Replace with Laravel auth check */}
                        <div className="flex items-center gap-10 text-lg font-medium">
                            <a
                                href="/dashboard"
                                className="text-gray-800 hover:text-blue-600"
                            >
                                Dashboard
                            </a>
                            <a
                                href="/students"
                                className="text-gray-800 hover:text-blue-600"
                            >
                                Students
                            </a>
                            <a
                                href="/profile"
                                className="text-gray-800 hover:text-blue-600"
                            >
                                Profile
                            </a>
                        </div>
                    </div>
                </div>
            </nav>

            {/* Hero Section */}
            <main className="relative">
                <div className="relative hero-wrap overflow-hidden">
                    <img
                        src="/images/welcomebackground.png"
                        alt="Background"
                        className="hero-bg-img"
                    />

                    <div className="relative z-30 w-full px-4 sm:px-6 lg:px-8 py-8">
                        <div className="flex flex-col lg:flex-row gap-6 items-start">
                            {/* Carousel */}
                            <div className="flex-1 relative">
                                <div
                                    id="carousel"
                                    className="relative w-full h-[350px] sm:h-[450px] md:h-[550px] lg:h-[600px] overflow-hidden rounded-xl shadow-xl z-10"
                                >
                                    {[1, 2, 3].map((i) => (
                                        <div
                                            key={i}
                                            className={`carousel-item absolute inset-0 ${
                                                i === 1
                                                    ? "opacity-100 z-20"
                                                    : "opacity-0 z-10"
                                            } transition-opacity duration-700 ease-in-out`}
                                        >
                                            <img
                                                src={`/images/image-${i}.png`}
                                                className="w-full h-full object-cover"
                                                alt={`Slide ${i}`}
                                            />
                                        </div>
                                    ))}
                                </div>
                                <div
                                    id="carousel-dots"
                                    className="absolute left-1/2 -translate-x-1/2 bottom-4 flex gap-2 z-30"
                                >
                                    {[0, 1, 2].map((i) => (
                                        <button
                                            key={i}
                                            className={`dot w-3 h-3 rounded-full ${
                                                i === 0
                                                    ? "bg-white/70"
                                                    : "bg-white/40"
                                            }`}
                                            data-dot={i}
                                        />
                                    ))}
                                </div>
                            </div>

                            {/* Login / Signup */}
                            <div className="w-full lg:w-80 flex-shrink-0 space-y-4">
                                <div className="bg-white/95 backdrop-blur-sm shadow-xl rounded-xl border border-gray-100 p-5">
                                    <h4 className="text-lg font-semibold text-gray-800">
                                        Get started
                                    </h4>
                                    <p className="text-sm text-gray-500 mt-1">
                                        Create an account or sign in to access
                                        the registrar tools.
                                    </p>
                                    <div className="mt-4 flex flex-col gap-3">
                                        <a
                                            href="/register"
                                            className="block text-center py-2 px-3 rounded-md bg-[#243b80] text-white font-medium hover:bg-[#21346a] transition"
                                        >
                                            Sign up
                                        </a>
                                        <a
                                            href="/login"
                                            className="block text-center py-2 px-3 rounded-md border border-gray-200 text-gray-700 bg-white hover:bg-yellow-500 hover:text-white hover:border-yellow-500 transition duration-300 ease-in-out"
                                        >
                                            Log in
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            {/* Footer */}
            <footer className="bg-[#243b80] text-white mt-0">
                <div className="max-w-9xl mx-auto px-6 lg:px-34 py-10">
                    <p className="text-center text-xs text-gray-300">
                        © {new Date().getFullYear()} IHS Portal. All rights
                        reserved.
                    </p>
                </div>
            </footer>

            <style jsx>{`
                .hero-bg-img {
                    position: absolute;
                    inset: 0;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    filter: blur(6px) brightness(0.85);
                    z-index: 0;
                }
            `}</style>
        </div>
    );
}
