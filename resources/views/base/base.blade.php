<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg fixed h-full">
            <div class="p-6">
                <div class="flex items-center gap-2 mb-6">
                    <i data-lucide="layout-dashboard" class="h-6 w-6 text-indigo-600"></i>
                    <span class="text-xl font-bold text-gray-800">Control Panel</span>
                </div>
                
                <nav class="space-y-1">
                    <a 
                        href="{{ route('students.index') }}"
                        class="flex items-center gap-2 px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition-colors"
                    >
                        <i data-lucide="graduation-cap" class="h-5 w-5"></i>
                        <span>Students</span>
                    </a>
                    <a 
                        href="{{ route('employees.index') }}"
                        class="flex items-center gap-2 px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-lg transition-colors"
                    >
                        <i data-lucide="users" class="h-5 w-5"></i>
                        <span>Employees</span>
                    </a>
                </nav>
            </div>

            <div class="absolute bottom-0 w-full p-6">
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 px-4 py-2 text-gray-600 hover:text-gray-800 w-full">
                        <i data-lucide="log-out" class="h-5 w-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 flex-1 p-8">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">
                        Welcome, {{ Auth::user()->role == 0 ? 'Administrator' : 'Manager' }}
                    </h1>
                    <p class="text-gray-600">
                        Manage your organization from this control panel
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Students Card -->
                    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 mb-2">Students</h2>
                                <p class="text-gray-600 mb-4">View and manage student records</p>
                                <a 
                                    href="{{ route('students.index') }}"
                                    class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-700"
                                >
                                    View Students
                                    <span aria-hidden="true">&rarr;</span>
                                </a>
                            </div>
                            <div class="bg-indigo-50 p-3 rounded-lg">
                                <i data-lucide="graduation-cap" class="h-6 w-6 text-indigo-600"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Employees Card -->
                    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 mb-2">Employees</h2>
                                <p class="text-gray-600 mb-4">See employees data</p>
                                <a 
                                    href="{{ route('employees.index') }}"
                                    class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-700"
                                >
                                    View Employees
                                    <span aria-hidden="true">&rarr;</span>
                                </a>
                            </div>
                            <div class="bg-indigo-50 p-3 rounded-lg">
                                <i data-lucide="users" class="h-6 w-6 text-indigo-600"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>
</html>