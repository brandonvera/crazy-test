<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Control Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="max-w-md w-full">
            <!-- Logo and Title -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-indigo-100 mb-4">
                    <i data-lucide="layout-dashboard" class="h-8 w-8 text-indigo-600"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900">Welcome back</h1>
                <p class="text-gray-600 mt-2">Please enter your credentials to continue</p>
            </div>

            <!-- Login Form -->
            <div class="bg-white rounded-xl shadow-sm p-8">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="mail" class="h-5 w-5 text-gray-400"></i>
                            </div>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                value="{{ old('email') }}"
                                required
                                class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="you@example.com"
                            >
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="lock" class="h-5 w-5 text-gray-400"></i>
                            </div>
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                required
                                class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="••••••••"
                            >
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="rounded-lg bg-red-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i data-lucide="alert-circle" class="h-5 w-5 text-red-400"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul class="list-disc space-y-1 pl-5">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <button 
                        type="submit"
                        class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Sign in
                    </button>
                </form>
            </div>

            <!-- Registration Link -->
            <p class="mt-4 text-center text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('sign-up') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Create one now
                </a>
            </p>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>
</html>