@extends('layouts.app')

@section('title', 'Login - BDE Events')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-indigo-100 px-4 py-12">

    <div class="w-full max-w-md">

        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8">

            <!-- Header -->
            <div class="text-center mb-8">

                <div class="mx-auto flex items-center justify-center w-16 h-16 rounded-full bg-blue-600 text-white shadow-lg">
                    <!-- Login Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1" />
                    </svg>
                </div>

                <h2 class="mt-5 text-3xl font-bold text-gray-900">
                    Welcome Back
                </h2>

                <p class="mt-2 text-gray-500">
                    Access your campus tickets and event dashboard
                </p>

            </div>

            <!-- Form -->
            <form method="POST" action="#" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>

                    <label for="email"
                        class="block mb-2 text-sm font-semibold text-gray-700">
                        Email Address
                    </label>

                    <div class="relative">

                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">

                            <!-- Mail Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 12H8m8-4H8m10 10H6a2 2 0 01-2-2V8a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2z"/>
                            </svg>

                        </span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="your.email@campus.edu"
                            class="w-full rounded-xl border border-gray-300 pl-12 pr-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition @error('email') border-red-500 @enderror"
                            required
                            autofocus>

                    </div>

                    @error('email')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <!-- Password -->
                <div>

                    <label for="password"
                        class="block mb-2 text-sm font-semibold text-gray-700">
                        Password
                    </label>

                    <div class="relative">

                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">

                            <!-- Lock Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 15v2m-6 0h12a2 2 0 002-2v-5a2 2 0 00-2-2h-1V7a5 5 0 00-10 0v1H6a2 2 0 00-2 2v5a2 2 0 002 2z"/>
                            </svg>

                        </span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            class="w-full rounded-xl border border-gray-300 pl-12 pr-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition @error('password') border-red-500 @enderror"
                            required>

                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between">

                    <label class="flex items-center gap-2 text-sm text-gray-600">

                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">

                        Remember me

                    </label>

                    <a href="#"
                        class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                        Forgot password?
                    </a>

                </div>

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full rounded-xl bg-blue-600 py-3 text-white font-semibold hover:bg-blue-700 transition duration-300 shadow-lg">

                    Sign In

                </button>

            </form>

            <!-- Footer -->
            <div class="mt-8 text-center">

                <p class="text-sm text-gray-500">

                    Don't have an account?

                    <a href="/register"
                        class="font-semibold text-blue-600 hover:text-blue-700">

                        Create one

                    </a>

                </p>

            </div>

        </div>

    </div>

</div>
@endsection