import React, { useState, useEffect } from 'react';
import Navbar from './Navbar';

function Home({ user }) {
    const [currentSlide, setCurrentSlide] = useState(0);
    const slides = [
        '/images/image-1.png',
        '/images/image-2.png',
        '/images/image-3.png',
        '/images/image-4.png'
    ];

    useEffect(() => {
        const interval = setInterval(() => {
            setCurrentSlide((prev) => (prev + 1) % slides.length);
        }, 5000);
        return () => clearInterval(interval);
    }, [slides.length]);

    const goToSlide = (index) => {
        setCurrentSlide(index);
    };

    const nextSlide = () => {
        setCurrentSlide((prev) => (prev + 1) % slides.length);
    };

    const prevSlide = () => {
        setCurrentSlide((prev) => (prev - 1 + slides.length) % slides.length);
    };

    return (
        <div className="min-h-screen flex flex-col" style={{ fontFamily: 'Roboto, sans-serif', background: '#f3f4f6' }}>
            <Navbar user={user} />

            {/* Hero Background - Matches original exactly */}
            <main className="relative flex-1" style={{ height: 'calc(100vh - 64px)' }}>
                <div className="relative overflow-hidden" style={{ height: '100%' }}>

                    {/* Carousel */}
                    <div className="relative z-10 w-full max-w-7xl mx-auto mt-8 px-4">
                        <div className="relative rounded-lg overflow-hidden shadow-lg">
                            <div className="relative w-full" style={{ height: '56vh' }}>
                                {slides.map((slide, index) => (
                                    <div
                                        key={index}
                                        className={`absolute inset-0 transition-opacity duration-700 ease-in-out ${
                                            index === currentSlide ? 'opacity-100' : 'opacity-0'
                                        }`}
                                        style={{ zIndex: index === currentSlide ? 20 : 10 }}
                                    >
                                        <img src={slide} alt={`Slide ${index + 1}`} className="w-full h-full object-cover" />
                                        <div className="absolute inset-0 bg-black/30"></div>
                                    </div>
                                ))}
                            </div>

                            {/* Arrows */}
                            <button
                                onClick={prevSlide}
                                className="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-2 rounded-full shadow z-30"
                            >
                                <svg className="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button
                                onClick={nextSlide}
                                className="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-2 rounded-full shadow z-30"
                            >
                                <svg className="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                            {/* Dots */}
                            <div className="absolute left-1/2 -translate-x-1/2 bottom-6 z-30 flex gap-3">
                                {slides.map((_, index) => (
                                    <button
                                        key={index}
                                        onClick={() => goToSlide(index)}
                                        className={`w-3 h-3 rounded-full ${
                                            index === currentSlide ? 'bg-white/80' : 'bg-white/50'
                                        }`}
                                    />
                                ))}
                            </div>
                        </div>
                    </div>

                    {/* Background/overlay removed to avoid covering UI */}
                </div>
            </main>
        </div>
    );
}

export default Home;
