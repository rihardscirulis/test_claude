<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Dark Mode Script -->
        <script>
            if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }

            function toggleDarkMode() {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            }
        </script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-800">
            @include('layouts.public-navigation')

            <!-- Hero Section with Enhanced Design -->
            <div class="relative overflow-hidden bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 dark:from-gray-900 dark:via-indigo-950 dark:to-purple-950">
                <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>

                <!-- Decorative Elements -->
                <div class="absolute top-0 left-0 w-96 h-96 bg-purple-300 dark:bg-purple-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-20 animate-blob"></div>
                <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-300 dark:bg-indigo-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
                <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-pink-300 dark:bg-pink-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>

                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 md:py-40">
                    <div class="text-center">
                        <h1 class="text-6xl md:text-7xl lg:text-8xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 dark:from-indigo-400 dark:via-purple-400 dark:to-pink-400 mb-8 leading-tight">
                            {{ __('products.welcome_to_our_store') }}
                        </h1>
                        <p class="text-xl md:text-2xl text-gray-700 dark:text-gray-300 mb-12 max-w-3xl mx-auto leading-relaxed">
                            {{ __('products.discover_amazing_products') }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                            <a href="{{ route('shop') }}" class="group inline-flex items-center justify-center px-10 py-5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-2xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 font-bold text-lg shadow-xl hover:shadow-2xl hover:scale-105 transform">
                                {{ __('products.shop_now') }}
                                <svg class="ml-3 w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                            @auth
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-10 py-5 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-2xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300 font-bold text-lg shadow-lg hover:shadow-xl border-2 border-gray-200 dark:border-gray-700">
                                    {{ __('products.go_to_dashboard') }}
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section with Better Spacing -->
            <div class="py-24 bg-white dark:bg-gray-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-20">
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                            Why Choose Us
                        </h2>
                        <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                            We provide the best shopping experience with quality products and excellent service
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                        <div class="group relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-3xl opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                            <div class="relative bg-white dark:bg-gray-800 p-10 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700">
                                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ __('products.quality_products') }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ __('products.quality_description') }}</p>
                            </div>
                        </div>

                        <div class="group relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                            <div class="relative bg-white dark:bg-gray-800 p-10 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ __('products.fast_delivery') }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ __('products.fast_delivery_description') }}</p>
                            </div>
                        </div>

                        <div class="group relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-pink-500 to-orange-500 rounded-3xl opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                            <div class="relative bg-white dark:bg-gray-800 p-10 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700">
                                <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ __('products.best_prices') }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ __('products.best_prices_description') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="py-24 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 dark:from-indigo-900 dark:via-purple-900 dark:to-pink-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                        Ready to Start Shopping?
                    </h2>
                    <p class="text-xl text-indigo-100 mb-10 max-w-2xl mx-auto">
                        Explore our collection and find the perfect products for you
                    </p>
                    <a href="{{ route('shop') }}" class="inline-flex items-center justify-center px-12 py-6 bg-white text-indigo-600 rounded-2xl hover:bg-gray-50 transition-all duration-300 font-bold text-xl shadow-2xl hover:shadow-3xl hover:scale-105 transform">
                        Browse Products
                        <svg class="ml-3 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-gray-900 dark:bg-black border-t border-gray-800">
                <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <p class="text-gray-400 text-lg mb-4">
                            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                        </p>
                        <p class="text-gray-500">
                            Built with Laravel & Livewire
                        </p>
                    </div>
                </div>
            </footer>
        </div>

        <style>
            @keyframes blob {
                0% { transform: translate(0px, 0px) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
                100% { transform: translate(0px, 0px) scale(1); }
            }
            .animate-blob {
                animation: blob 7s infinite;
            }
            .animation-delay-2000 {
                animation-delay: 2s;
            }
            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>
    </body>
</html>
