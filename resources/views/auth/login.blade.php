{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50 font-sans antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BDE-Events</title>
    <!-- Tailwind CSS CDN (Use Vite/Mix in production) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="h-full text-gray-900 selection:bg-blue-500 selection:text-white">

    <!-- ========================================== -->
    <!-- MAIN WRAPPER: FULL HEIGHT CENTERING CONTAINER -->
    <!-- ========================================== -->
    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">
        
        <!-- ========================================== -->
        <!-- TWO-COLUMN CONTAINER CARD                  -->
        <!-- ========================================== -->
        <div class="w-full max-w-5xl bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden grid grid-cols-1 lg:grid-cols-12 min-h-[640px]">
            
            <!-- ========================================== -->
            <!-- LEFT COLUMN: BRANDING & GRADIENT (DESKTOP) -->
            <!-- ========================================== -->
            <div class="hidden lg:flex lg:col-span-5 bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-900 p-10 text-white flex-col justify-between relative overflow-hidden">
                <!-- Background decorative shapes -->
                <div class="absolute -top-16 -left-16 w-64 h-64 bg-white/10 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-blue-400/20 rounded-full blur-3xl"></div>

                <!-- Top Brand Logo -->
                <div class="relative z-10 flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/10 backdrop-blur-md rounded-xl flex items-center justify-center border border-white/20">
                        <!-- Heroicon: Ticket -->
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-12v.75m0 3v.75m0 3v.75m0 3V18m-3-12h15a2.25 2.25 0 012.25 2.25v1.372c0 .516-.351.966-.852 1.091l-4.423 1.106c-.44.11-.44.738 0 .848l4.423 1.106c.501.125.852.575.852 1.091v1.372a2.25 2.25 0 01-2.25 2.25h-15A2.25 2.25 0 012.25 18v-1.372c0-.516.351-.966.852-1.091l4.423-1.106c.44-.11.44-.738 0-.848L3.102 12.48c-.501-.125-.852-.575-.852-1.091V10a2.25 2.25 0 012.25-2.25z" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight">BDE-Events</span>
                </div>

                <!-- Middle Content Section -->
                <div class="relative z-10 my-auto py-12">
                    <h2 class="text-3xl font-bold leading-tight tracking-tight text-white mb-4">
                        Manage and reserve your campus events easily.
                    </h2>
                    <p class="text-blue-100 text-sm leading-relaxed">
                        Join thousands of students and organizers. Discover, book tickets, and stay updated with student union activities in one seamless platform.
                    </p>
                </div>

                <!-- Bottom Footer Note -->
                <div class="relative z-10 text-xs text-blue-200">
                    &copy; {{ date('Y') }} BDE-Events Platform. All rights reserved.
                </div>
            </div>

            <!-- ========================================== -->
            <!-- RIGHT COLUMN: LOGIN FORM                   -->
            <!-- ========================================== -->
            <div class="lg:col-span-7 p-8 sm:p-12 flex flex-col justify-between">
                
                <!-- Mobile Header Logo (Visible only on small screens) -->
                <div class="lg:hidden flex items-center space-x-3 mb-8">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-md">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-12v.75m0 3v.75m0 3v.75m0 3V18m-3-12h15a2.25 2.25 0 012.25 2.25v1.372c0 .516-.351.966-.852 1.091l-4.423 1.106c-.44.11-.44.738 0 .848l4.423 1.106c.501.125.852.575.852 1.091v1.372a2.25 2.25 0 01-2.25 2.25h-15A2.25 2.25 0 012.25 18v-1.372c0-.516.351-.966.852-1.091l4.423-1.106c.44-.11.44-.738 0-.848L3.102 12.48c-.501-.125-.852-.575-.852-1.091V10a2.25 2.25 0 012.25-2.25z" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-gray-900">BDE-Events</span>
                </div>

                <!-- Title Header -->
                <div class="mb-8">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">Welcome back</h1>
                    <p class="text-sm text-gray-500 mt-1">Enter your credentials to access your account</p>
                </div>

                <!-- Form Body -->
                <form action="#" method="POST" class="space-y-5">
                    
                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <!-- Heroicon: Envelope -->
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                required 
                                placeholder="student@university.edu" 
                                class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300 text-gray-900 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                            >
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <!-- Heroicon: Lock-Closed -->
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                required 
                                placeholder="••••••••" 
                                class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300 text-gray-900 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                            >
                        </div>
                        <p class="mt-1.5 text-xs text-gray-500">Password must contain at least 8 characters.</p>
                    </div>

                    <!-- Options: Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 transition-all duration-200">
                            <span class="text-gray-600 text-sm">Remember me</span>
                        </label>
                        <a href="#" class="font-medium text-blue-600 hover:text-blue-700 transition-colors duration-200">Forgot password?</a>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300"
                    >
                        Login
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-xs uppercase">
                        <span class="bg-white px-3 text-gray-400 font-medium tracking-wider">OR</span>
                    </div>
                </div>

                <!-- Social Login Buttons -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <!-- Google Button -->
                    <button type="button" class="flex items-center justify-center space-x-2 py-2.5 px-4 border border-gray-300 rounded-xl text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-gray-200 transition-all duration-300">
                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                        </svg>
                        <span>Google</span>
                    </button>

                    <!-- GitHub Button -->
                    <button type="button" class="flex items-center justify-center space-x-2 py-2.5 px-4 border border-gray-300 rounded-xl text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-gray-200 transition-all duration-300">
                        <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                        </svg>
                        <span>GitHub</span>
                    </button>
                </div>

                <!-- Registration Link -->
                <div class="mt-8 text-center text-sm text-gray-500">
                    Don't have an account? 
                    <a href="#" class="font-semibold text-blue-600 hover:text-blue-700 transition-colors duration-200">Register</a>
                </div>

            </div>
        </div>
    </div>

</body>
</html>