<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
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
                        class="flex items-center gap-2 px-4 py-3 text-indigo-600 bg-indigo-50 rounded-lg transition-colors"
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
            <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                    <div class="flex items-center gap-2 mb-6">
                        <i data-lucide="edit" class="h-6 w-6 text-indigo-600"></i>
                        <h1 class="text-2xl font-bold text-gray-800">Edit Student</h1>
                    </div>

                    <form action="{{ route('students.update', $student) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input 
                                type="text" 
                                name="first_name" 
                                id="first_name" 
                                value="{{ old('first_name', $student->first_name) }}" 
                                required
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            >
                            @error('first_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input 
                                type="text" 
                                name="last_name" 
                                id="last_name" 
                                value="{{ old('last_name', $student->last_name) }}" 
                                required
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            >
                            @error('last_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <input 
                                type="text" 
                                name="address" 
                                id="address" 
                                value="{{ old('address', $student->address) }}" 
                                required
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            >
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-3">
                            <a 
                                href="{{ route('students.index') }}" 
                                class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Cancel
                            </a>
                            <button 
                                type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Update Student
                            </button>
                        </div>
                    </form>
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