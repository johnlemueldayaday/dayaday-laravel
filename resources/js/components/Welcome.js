import React, { useEffect } from "react";

export default function Welcome({ user }) {
    useEffect(() => {
        // Carousel logic matching original
        const root = document.getElementById("carousel");
        if (!root) return;

        const slides = Array.from(root.querySelectorAll(".carousel-item"));
        const nextBtn = document.getElementById("carousel-next");
        const prevBtn = document.getElementById("carousel-prev");
        const dots = Array.from(document.querySelectorAll("#carousel-dots .dot"));

        let current = 0;
        const total = slides.length;
        const intervalMs = 6000;
        let timer = null;

        function show(index) {
            slides.forEach((s, i) => {
                if (i === index) {
                    s.classList.remove("opacity-0");
                    s.classList.add("opacity-100");
                    s.style.zIndex = 20;
                } else {
                    s.classList.remove("opacity-100");
                    s.classList.add("opacity-0");
                    s.style.zIndex = 10;
                }
            });
            dots.forEach((d, i) => d.classList.toggle("bg-white/60", i === index));
            current = index;
        }

        function next() {
            show((current + 1) % total);
        }
        function prev() {
            show((current - 1 + total) % total);
        }

        function start() {
            stop();
            timer = setInterval(next, intervalMs);
        }
        function stop() {
            if (timer) {
                clearInterval(timer);
                timer = null;
            }
        }

        nextBtn?.addEventListener("click", () => {
            next();
            stop();
            start();
        });
        prevBtn?.addEventListener("click", () => {
            prev();
            stop();
            start();
        });
        dots.forEach((d) =>
            d.addEventListener("click", () => {
                show(+d.dataset.dot);
                stop();
                start();
            })
        );

        root.addEventListener("mouseenter", stop);
        root.addEventListener("mouseleave", start);

        document.addEventListener("keydown", (e) => {
            if (e.key === "ArrowRight") {
                next();
                stop();
                start();
            }
            if (e.key === "ArrowLeft") {
                prev();
                stop();
                start();
            }
        });

        show(0);
        start();

        return () => {
            stop();
        };
    }, []);

    return (
        <div className="min-h-screen flex flex-col" style={{ fontFamily: 'Roboto, sans-serif', background: '#f3f4f6' }}>
            {/* Navbar - matches original exactly */}
            <nav className="bg-white shadow-sm" style={{ height: '64px' }}>
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex items-center justify-between py-3">
                        {/* School Logo */}
                        <div className="flex-shrink-0">
                            <a href="/dashboard">
                                <img
                                    src="/images/school_logo.png"
                                    alt="School Logo"
                                    className="h-14 w-auto object-contain"
                                />
                            </a>
                        </div>

                        {/* Navigation */}
                        <div className="flex-1 flex justify-center">
                            <div className="flex gap-12 text-lg font-medium">
                                <a href="/dashboard" className="text-gray-800 hover:text-blue-600">Dashboard</a>
                                <a href="/faculty" className="text-gray-800 hover:text-blue-600">Faculty</a>
                                <a href="/students" className="text-gray-800 hover:text-blue-600">Student</a>
                                <a href="#" className="text-gray-800 hover:text-blue-600">Reports</a>
                                <a href="#" className="text-gray-800 hover:text-blue-600">Settings</a>
                                <a href="/profile" className="text-gray-800 hover:text-blue-600">Profile</a>
                            </div>
                        </div>
                        <div className="w-14"></div>
                    </div>
                </div>
            </nav>

            {/* Hero */}
            <main className="relative flex-1">
                <div className="relative overflow-hidden" style={{ height: 'calc(100vh - 64px)' }}>

                    {/* Carousel */}
                    <div className="relative z-10 h-full flex items-center">
                        <div className="w-full max-w-6xl mx-auto px-4">
                            <div className="relative rounded-lg overflow-hidden shadow-lg">
                                <div id="carousel" className="relative w-full h-[56vh] md:h-[64vh] lg:h-[72vh]">
                                    <div className="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100 z-20" data-index="0">
                                        <img src="/images/image-1.png" alt="Slide 1" className="w-full h-full object-cover" />
                                        <div className="absolute inset-0 bg-black/30"></div>
                                    </div>
                                    <div className="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 z-10" data-index="1">
                                        <img src="/images/image-2.png" alt="Slide 2" className="w-full h-full object-cover" />
                                        <div className="absolute inset-0 bg-black/30"></div>
                                    </div>
                                    <div className="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 z-10" data-index="2">
                                        <img src="/images/image-3.png" alt="Slide 3" className="w-full h-full object-cover" />
                                        <div className="absolute inset-0 bg-black/30"></div>
                                    </div>
                                    <div className="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 z-10" data-index="3">
                                        <img src="/images/image-4.png" alt="Slide 4" className="w-full h-full object-cover" />
                                        <div className="absolute inset-0 bg-black/30"></div>
                                    </div>
                                </div>

                                {/* Arrows */}
                                <button id="carousel-prev" className="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-2 rounded-full shadow z-30">
                                    <svg className="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button id="carousel-next" className="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-2 rounded-full shadow z-30">
                                    <svg className="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>

                                {/* Dots */}
                                <div id="carousel-dots" className="absolute left-1/2 -translate-x-1/2 bottom-6 z-30 flex gap-3">
                                    <button className="dot w-3 h-3 rounded-full bg-white/60" data-dot="0"></button>
                                    <button className="dot w-3 h-3 rounded-full bg-white/40" data-dot="1"></button>
                                    <button className="dot w-3 h-3 rounded-full bg-white/40" data-dot="2"></button>
                                    <button className="dot w-3 h-3 rounded-full bg-white/40" data-dot="3"></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* Desktop login/signup card (top-right) */}
                    {!user && (
                        <div className="hidden sm:block absolute z-30 right-6 top-24 w-72 sm:w-80 bg-white/95 backdrop-blur-sm shadow-xl rounded-xl border border-gray-100 p-5">
                            <h4 className="text-lg font-semibold text-gray-800">Get started</h4>
                            <p className="text-sm text-gray-500 mt-1">Create an account or sign in to access the registrar tools.</p>

                            <div className="mt-4 flex flex-col gap-3">
                                <a href="/register" className="block text-center py-2 px-3 rounded-md bg-[#243b80] text-white font-medium hover:bg-[#21346a] transition">
                                    Sign up
                                </a>
                                <a href="/login" className="block text-center py-2 px-3 rounded-md border border-gray-200 text-gray-700 bg-white hover:bg-gray-50 transition">
                                    Log in
                                </a>
                            </div>

                            <div className="mt-3 text-xs text-gray-400">
                                By signing up you agree to our <a href="#" className="underline">terms</a>.
                            </div>
                        </div>
                    )}

                    {/* Mobile login/signup card (below navbar, top-left) */}
                    {!user && (
                        <div className="sm:hidden fixed left-4 top-[72px] z-30 w-[85%] max-w-sm bg-white/95 backdrop-blur-sm shadow-lg rounded-lg border border-gray-100 p-4">
                            <div className="flex items-center justify-between">
                                <div>
                                    <div className="text-sm font-medium text-gray-800">Get started</div>
                                    <div className="text-xs text-gray-500">Sign up or log in to continue</div>
                                </div>
                                <div className="ml-2">
                                    <a href="/login" className="text-sm text-blue-600 hover:underline">Log in</a>
                                </div>
                            </div>
                            <div className="mt-3 flex gap-2">
                                <a href="/register" className="flex-1 text-center py-2 rounded-md bg-[#243b80] text-white font-medium">Sign up</a>
                                <a href="/login" className="flex-1 text-center py-2 rounded-md border border-gray-200 text-gray-700 bg-white">Log in</a>
                            </div>
                        </div>
                    )}

                    {/* Background/overlay removed to avoid covering UI */}
                </div>
            </main>
        </div>
    );
}
