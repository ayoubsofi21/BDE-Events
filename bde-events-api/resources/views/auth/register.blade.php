@extends('layouts.app')

@section('title', 'Register - BDE Events')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-indigo-100 px-4 py-12">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8">
            <div class="text-center mb-8">
                <div class="mx-auto flex items-center justify-center w-16 h-16 rounded-full bg-blue-600 text-white shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M18 9a3 3 0 100-6 3 3 0 000 6zm-6 12v-1a4 4 0 014-4h4m-8 5H4a2 2 0 01-2-2v-1a6 6 0 016-6h2"/>
                    </svg>

                </div>

                <h2 class="mt-5 text-3xl font-bold text-gray-900">
                    Create Account
                </h2>

                <p class="mt-2 text-gray-500">
                    Join BDE-Events and book your campus activities
                </p>

            </div>
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-semibold text-gray-700">
                        Full Name
                    </label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="John Doe"
                        required
                        autofocus
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 outline-none transition @error('name') border-red-500 @enderror">

                    @error('name')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror

                </div>
                <div>
                    <label for="email"
                        class="block mb-2 text-sm font-semibold text-gray-700">
                        Campus Email
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="student@campus.edu"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 outline-none transition @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password"
                        class="block mb-2 text-sm font-semibold text-gray-700">
                        Password
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 outline-none transition @error('password') border-red-500 @enderror">

                    <p class="mt-2 text-xs text-gray-500">
                        Password must contain at least 8 characters.
                    </p>

                    @error('password')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation"
                        class="block mb-2 text-sm font-semibold text-gray-700">
                        Confirm Password
                    </label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        placeholder="••••••••"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 outline-none transition">
                </div>
                <button
                    type="submit"
                    class="w-full rounded-xl bg-blue-600 py-3 font-semibold text-white shadow-lg transition duration-300 hover:bg-blue-700 hover:shadow-xl">
                    Create Account
                </button>
            </form>
            <!-- Footer -->
            <div class="mt-8 text-center">

                <p class="text-sm text-gray-500">
                    Already have an account?
                    <a href="{{ route('login') }}"
                        class="font-semibold text-blue-600 hover:text-blue-700">
                        Sign In
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection