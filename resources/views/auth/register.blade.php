{{-- resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50 font-sans antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BDE-Events</title>
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
        <div class="w-full max-w-5xl bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden grid grid-cols-1 lg:grid-cols-12 my-auto">
            
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
                        Join your campus community today.
                    </h2>
                    <p class="text-blue-100 text-sm leading-relaxed">
                        Create an account to gain instant access to campus events, reserve your tickets in advance, and coordinate union activities effortlessly.
                    </p>
                </div>

                <!-- Bottom Footer Note -->
                <div class="relative z-10 text-xs text-blue-200">
                    &copy; {{ date('Y') }} BDE-Events Platform. All rights reserved.
                </div>
            </div>

            <!-- ========================================== -->
            <!-- RIGHT COLUMN: REGISTER FORM                -->
            <!-- ========================================== -->
            <div class="lg:col-span-7 p-8 sm:p-12 flex flex-col justify-between">
                
                <!-- Mobile Header Logo (Visible only on small screens) -->
                <div class="lg:hidden flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-md">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-12v.75m0 3v.75m0 3v.75m0 3V18m-3-12h15a2.25 2.25 0 012.25 2.25v1.372c0 .516-.351.966-.852 1.091l-4.423 1.106c-.44.11-.44.738 0 .848l4.423 1.106c.501.125.852.575.852 1.091v1.372a2.25 2.25 0 01-2.25 2.25h-15A2.25 2.25 0 012.25 18v-1.372c0-.516.351-.966.852-1.091l4.423-1.106c.44-.11.44-.738 0-.848L3.102 12.48c-.501-.125-.852-.575-.852-1.091V10a2.25 2.25 0 012.25-2.25z" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-gray-900">BDE-Events</span>
                </div>

                <!-- Title Header -->
                <div class="mb-6">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">Create an account</h1>
                    <p class="text-sm text-gray-500 mt-1">Get started with your student or organizer account</p>
                </div>

                <!-- Form Body -->
                <form action="#" method="POST" class="space-y-4">
                    
                    <!-- Full Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Full Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <!-- Heroicon: User -->
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                required 
                                placeholder="Alex Morgan" 
                                class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-300 text-gray-900 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                            >
                        </div>
                    </div>

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
                                class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-300 text-gray-900 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                            >
                        </div>
                    </div>

                    <!-- Role Select Field -->
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-1.5">Role</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <!-- Heroicon: Academic-Cap -->
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147L12 14.6l7.74-4.453a1.125 1.125 0 000-1.947L12 3.75 4.26 8.2a1.125 1.125 0 000 1.947z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12.75v3.375c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V12.75M12 18.75V21" />
                                </svg>
                            </div>
                            <select 
                                id="role" 
                                name="role" 
                                required 
                                class="w-full pl-10 pr-10 py-2.5 rounded-xl border border-gray-300 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 appearance-none bg-white"
                            >
                                <option value="student" selected>Student</option>
                                <option value="admin">Admin (Event Organizer)</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-gray-400">
                                <!-- Heroicon: Chevron-Down -->
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password Grid (Password + Password Confirmation) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Password -->
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
                                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-300 text-gray-900 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                >
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5">Confirm Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                    <!-- Heroicon: Check-Circle -->
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <input 
                                    type="password" 
                                    id="password_confirmation" 
                                    name="password_confirmation" 
                                    required 
                                    placeholder="••••••••" 
                                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-300 text-gray-900 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                >
                            </div>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500">Password must contain at least 8 characters.</p>

                    <!-- Terms & Conditions Checkbox -->
                    <div class="pt-1">
                        <label class="flex items-start space-x-2.5 cursor-pointer">
                            <input type="checkbox" name="terms" required class="mt-0.5 w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 transition-all duration-200">
                            <span class="text-xs text-gray-600 leading-normal">
                                I accept the <a href="#" class="text-blue-600 hover:underline">Terms & Conditions</a> and <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>.
                            </span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 mt-2"
                    >
                        Create Account
                    </button>
                </form>

                <!-- Login Redirect Link -->
                <div class="mt-6 text-center text-sm text-gray-500">
                    Already have an account? 
                    <a href="#" class="font-semibold text-blue-600 hover:text-blue-700 transition-colors duration-200">Login</a>
                </div>

            </div>
        </div>
    </div>

</body>
</html>