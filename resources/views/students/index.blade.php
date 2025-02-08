<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
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
            <div class="max-w-7xl mx-auto">
                <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800 mb-2">Student List</h1>
                            <p class="text-gray-600">Manage and view all students</p>
                        </div>
                        <a 
                            href="{{ route('students.create') }}" 
                            class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors"
                        >
                            <i data-lucide="plus" class="h-5 w-5"></i>
                            Add Student
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($students->count() > 0)
                                    @foreach ($students as $student)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $student->first_name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $student->last_name }}</div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-500">{{ $student->address }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                                <!-- <a href="{{ route('students.show', $student) }}" class="text-blue-600 hover:text-blue-900">View</a> -->
                                                <a href="{{ route('students.edit', $student) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this student?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                            No students found.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    @if ($students->hasPages())
                        <div class="px-6 py-4 border-t border-gray-200">
                            {{ $students->links() }}
                        </div>
                    @endif
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