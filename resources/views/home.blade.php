<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Your Premium Shopping Destination</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

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
        <div class="min-h-screen bg-white dark:bg-gray-900">
            @include('layouts.public-navigation')

            <!-- Hero Section with Enhanced Design -->
            <div class="relative overflow-hidden bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 dark:from-indigo-900 dark:via-purple-900 dark:to-pink-900">
                <!-- Animated Background Pattern -->
                <div class="absolute inset-0 opacity-20">
                    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
                </div>

                <!-- Decorative Elements -->
                <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full mix-blend-soft-light filter blur-3xl opacity-10 animate-blob"></div>
                <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-300 rounded-full mix-blend-soft-light filter blur-3xl opacity-10 animate-blob animation-delay-2000"></div>
                <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-pink-300 rounded-full mix-blend-soft-light filter blur-3xl opacity-10 animate-blob animation-delay-4000"></div>

                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 md:py-48">
                    <div class="text-center">
                        <div class="inline-block mb-6">
                            <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-bold bg-white/20 backdrop-blur-sm text-white border border-white/30">
                                <svg class="w-5 h-5 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                Premium Quality Products
                            </span>
                        </div>

                        <h1 class="text-6xl md:text-7xl lg:text-8xl font-black text-white mb-8 leading-tight tracking-tight">
                            {{ __('products.welcome_to_our_store') }}
                        </h1>

                        <p class="text-2xl md:text-3xl text-white/90 mb-12 max-w-4xl mx-auto leading-relaxed font-medium">
                            {{ __('products.discover_amazing_products') }}
                        </p>

                        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-16">
                            <a href="{{ route('shop') }}" class="group inline-flex items-center justify-center px-12 py-6 bg-white text-indigo-600 rounded-2xl hover:bg-gray-50 transition-all duration-300 font-bold text-xl shadow-2xl hover:shadow-3xl hover:scale-105 transform">
                                {{ __('products.shop_now') }}
                                <svg class="ml-3 w-7 h-7 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                            @auth
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-12 py-6 bg-white/10 backdrop-blur-sm text-white rounded-2xl hover:bg-white/20 transition-all duration-300 font-bold text-xl border-2 border-white/30 hover:border-white/50">
                                    {{ __('products.go_to_dashboard') }}
                                </a>
                            @endauth
                        </div>

                        <!-- Trust Badges -->
                        <div class="flex flex-wrap justify-center gap-8 text-white/80">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-semibold">Free Shipping</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-semibold">Secure Payment</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-semibold">24/7 Support</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wave Divider -->
                <div class="absolute bottom-0 left-0 right-0">
                    <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                        <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" class="fill-white dark:fill-gray-900"/>
                    </svg>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="py-20 bg-white dark:bg-gray-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                        <div class="text-center">
                            <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-2">10K+</div>
                            <div class="text-gray-600 dark:text-gray-400 font-semibold">Happy Customers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600 mb-2">500+</div>
                            <div class="text-gray-600 dark:text-gray-400 font-semibold">Products</div>
                        </div>
                        <div class="text-center">
                            <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-orange-600 mb-2">99%</div>
                            <div class="text-gray-600 dark:text-gray-400 font-semibold">Satisfaction</div>
                        </div>
                        <div class="text-center">
                            <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-red-600 mb-2">50+</div>
                            <div class="text-gray-600 dark:text-gray-400 font-semibold">Countries</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section with Better Design -->
            <div class="py-32 bg-gradient-to-b from-white to-gray-50 dark:from-gray-900 dark:to-gray-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-24">
                        <span class="inline-block px-6 py-2 rounded-full text-sm font-bold bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-400 mb-6">
                            WHY CHOOSE US
                        </span>
                        <h2 class="text-5xl md:text-6xl font-black text-gray-900 dark:text-gray-100 mb-6">
                            Exceptional Shopping Experience
                        </h2>
                        <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto leading-relaxed">
                            We provide the best shopping experience with quality products, fast delivery, and excellent customer service
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                        <div class="group relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-3xl opacity-25 group-hover:opacity-100 transition duration-500 blur"></div>
                            <div class="relative bg-white dark:bg-gray-800 p-12 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 h-full">
                                <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                    </svg>
                                </div>
                                <h3 class="text-3xl font-black text-gray-900 dark:text-gray-100 mb-6">{{ __('products.quality_products') }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 leading-relaxed text-lg">{{ __('products.quality_description') }}</p>
                            </div>
                        </div>

                        <div class="group relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl opacity-25 group-hover:opacity-100 transition duration-500 blur"></div>
                            <div class="relative bg-white dark:bg-gray-800 p-12 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 h-full">
                                <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-500 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <h3 class="text-3xl font-black text-gray-900 dark:text-gray-100 mb-6">{{ __('products.fast_delivery') }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 leading-relaxed text-lg">{{ __('products.fast_delivery_description') }}</p>
                            </div>
                        </div>

                        <div class="group relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-pink-500 to-orange-500 rounded-3xl opacity-25 group-hover:opacity-100 transition duration-500 blur"></div>
                            <div class="relative bg-white dark:bg-gray-800 p-12 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 h-full">
                                <div class="w-20 h-20 bg-gradient-to-br from-pink-500 to-orange-500 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-3xl font-black text-gray-900 dark:text-gray-100 mb-6">{{ __('products.best_prices') }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 leading-relaxed text-lg">{{ __('products.best_prices_description') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonials Section -->
            <div class="py-32 bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-gray-800 dark:to-gray-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-20">
                        <span class="inline-block px-6 py-2 rounded-full text-sm font-bold bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-400 mb-6">
                            TESTIMONIALS
                        </span>
                        <h2 class="text-5xl md:text-6xl font-black text-gray-900 dark:text-gray-100 mb-6">
                            What Our Customers Say
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @for($i = 0; $i < 3; $i++)
                        <div class="bg-white dark:bg-gray-800 p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700">
                            <div class="flex items-center mb-6">
                                @for($j = 0; $j < 5; $j++)
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                @endfor
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 mb-6 text-lg leading-relaxed italic">
                                "Amazing products and excellent service! Fast shipping and great quality. Highly recommended!"
                            </p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                    {{ chr(65 + $i) }}
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900 dark:text-gray-100">Customer {{ $i + 1 }}</div>
                                    <div class="text-gray-500 dark:text-gray-400 text-sm">Verified Buyer</div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="py-32 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 dark:from-indigo-900 dark:via-purple-900 dark:to-pink-900 relative overflow-hidden">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
                </div>

                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-5xl md:text-6xl font-black text-white mb-8">
                        Ready to Start Shopping?
                    </h2>
                    <p class="text-2xl text-white/90 mb-12 max-w-3xl mx-auto leading-relaxed">
                        Explore our collection and find the perfect products for you. Start your shopping journey today!
                    </p>
                    <a href="{{ route('shop') }}" class="inline-flex items-center justify-center px-16 py-8 bg-white text-indigo-600 rounded-3xl hover:bg-gray-50 transition-all duration-300 font-black text-2xl shadow-2xl hover:shadow-3xl hover:scale-105 transform">
                        Browse All Products
                        <svg class="ml-4 w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Newsletter Section -->
            <div class="py-24 bg-white dark:bg-gray-900">
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-gray-800 dark:to-gray-700 rounded-3xl p-12 md:p-16 text-center border border-indigo-100 dark:border-gray-600">
                        <h3 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-gray-100 mb-6">
                            Get Exclusive Deals
                        </h3>
                        <p class="text-xl text-gray-600 dark:text-gray-400 mb-10">
                            Subscribe to our newsletter and get 10% off your first order
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 max-w-2xl mx-auto">
                            <input type="email" placeholder="Enter your email" class="flex-1 px-6 py-5 rounded-2xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 transition text-lg">
                            <button class="px-10 py-5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-2xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 font-bold text-lg shadow-xl whitespace-nowrap">
                                Subscribe Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Footer -->
            <footer class="bg-gray-900 dark:bg-black text-gray-300 pt-20 pb-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                        <div>
                            <h3 class="text-white font-black text-2xl mb-6">{{ config('app.name') }}</h3>
                            <p class="text-gray-400 leading-relaxed mb-6">
                                Your trusted destination for premium quality products at unbeatable prices.
                            </p>
                            <div class="flex space-x-4">
                                <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-indigo-600 rounded-lg flex items-center justify-center transition">
                                    <span class="sr-only">Facebook</span>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-indigo-600 rounded-lg flex items-center justify-center transition">
                                    <span class="sr-only">Twitter</span>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-indigo-600 rounded-lg flex items-center justify-center transition">
                                    <span class="sr-only">Instagram</span>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/></svg>
                                </a>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-white font-bold text-lg mb-6">Shop</h4>
                            <ul class="space-y-3">
                                <li><a href="{{ route('shop') }}" class="hover:text-indigo-400 transition">All Products</a></li>
                                <li><a href="#" class="hover:text-indigo-400 transition">New Arrivals</a></li>
                                <li><a href="#" class="hover:text-indigo-400 transition">Best Sellers</a></li>
                                <li><a href="#" class="hover:text-indigo-400 transition">Special Offers</a></li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="text-white font-bold text-lg mb-6">Support</h4>
                            <ul class="space-y-3">
                                <li><a href="#" class="hover:text-indigo-400 transition">Help Center</a></li>
                                <li><a href="#" class="hover:text-indigo-400 transition">Shipping Info</a></li>
                                <li><a href="#" class="hover:text-indigo-400 transition">Returns</a></li>
                                <li><a href="#" class="hover:text-indigo-400 transition">Contact Us</a></li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="text-white font-bold text-lg mb-6">Company</h4>
                            <ul class="space-y-3">
                                <li><a href="#" class="hover:text-indigo-400 transition">About Us</a></li>
                                <li><a href="#" class="hover:text-indigo-400 transition">Careers</a></li>
                                <li><a href="#" class="hover:text-indigo-400 transition">Privacy Policy</a></li>
                                <li><a href="#" class="hover:text-indigo-400 transition">Terms of Service</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="border-t border-gray-800 pt-10 flex flex-col md:flex-row justify-between items-center">
                        <p class="text-gray-400 mb-4 md:mb-0">
                            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                        </p>
                        <p class="text-gray-500 text-sm">
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
