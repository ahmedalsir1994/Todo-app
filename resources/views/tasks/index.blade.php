@extends('layouts.app')

@section('title', 'Todo App - Task Manager')

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">My Todo List</h1>
            <p class="text-gray-600">Manage your daily tasks efficiently</p>
        </div>

        <!-- Quick Add Task Form -->
        <div class="mb-8 bg-blue-50 rounded-lg p-4">
            <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Task Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Enter a new task..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description
                        (Optional)</label>
                    <textarea id="description" name="description" rows="2" placeholder="Add task description..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between items-center">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add Task
                    </button>

                    <a href="{{ route('tasks.create') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                        Need more options? Advanced form →
                    </a>
                </div>
            </form>
        </div>

        <!-- Task Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-gray-100 rounded-lg p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $tasks->count() }}</h3>
                        <p class="text-sm text-gray-600">Total Tasks</p>
                    </div>
                </div>
            </div>

            <div class="bg-green-50 rounded-lg p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $tasks->where('is_completed', true)->count() }}
                        </h3>
                        <p class="text-sm text-gray-600">Completed</p>
                    </div>
                </div>
            </div>

            <div class="bg-amber-50 rounded-lg p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $tasks->where('is_completed', false)->count() }}
                        </h3>
                        <p class="text-sm text-gray-600">Pending</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Filter -->
        <div class="mb-6">
            <div class="flex space-x-2">
                <button class="filter-btn active px-4 py-2 bg-blue-500 text-white rounded-md text-sm font-medium"
                    data-filter="all">
                    All Tasks
                </button>
                <button
                    class="filter-btn px-4 py-2 bg-gray-200 text-gray-700 rounded-md text-sm font-medium hover:bg-gray-300"
                    data-filter="pending">
                    Pending
                </button>
                <button
                    class="filter-btn px-4 py-2 bg-gray-200 text-gray-700 rounded-md text-sm font-medium hover:bg-gray-300"
                    data-filter="completed">
                    Completed
                </button>
            </div>
        </div>

        <!-- Tasks List -->
        <div class="space-y-4">
            @forelse($tasks as $task)
                <div class="task-item bg-white border border-gray-200 rounded-lg p-4 shadow-sm {{ $task->is_completed ? 'completed' : 'pending' }}"
                    data-status="{{ $task->is_completed ? 'completed' : 'pending' }}">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-3 flex-1">
                            <!-- Task Completion Toggle -->
                            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="toggle-form">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="title" value="{{ $task->title }}">
                                <input type="hidden" name="description" value="{{ $task->description }}">
                                <input type="hidden" name="is_completed" value="{{ $task->is_completed ? 0 : 1 }}">
                                <button type="submit"
                                    class="flex-shrink-0 w-6 h-6 rounded-full border-2 flex items-center justify-center transition
                                                   {{ $task->is_completed ? 'bg-green-500 border-green-500' : 'border-gray-300 hover:border-green-400' }}">
                                    @if($task->is_completed)
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    @endif
                                </button>
                            </form>

                            <!-- Task Content -->
                            <div class="flex-1">
                                <h3
                                    class="font-medium text-gray-900 {{ $task->is_completed ? 'line-through text-gray-500' : '' }}">
                                    {{ $task->title }}
                                </h3>
                                @if($task->description)
                                    <p class="text-sm text-gray-600 mt-1 {{ $task->is_completed ? 'line-through' : '' }}">
                                        {{ $task->description }}
                                    </p>
                                @endif
                                <p class="text-xs text-gray-400 mt-2">
                                    Created: {{ $task->created_at->format('M j, Y g:i A') }}
                                    @if($task->updated_at != $task->created_at)
                                        • Updated: {{ $task->updated_at->format('M j, Y g:i A') }}
                                    @endif
                                </p>
                            </div>
                        </div>

                        <!-- Task Actions -->
                        <div class="flex items-center space-x-2 ml-4">
                            <a href="{{ route('tasks.show', $task->id) }}"
                                class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                View
                            </a>

                            <a href="{{ route('tasks.edit', $task->id) }}"
                                class="text-green-600 hover:text-green-800 text-sm font-medium">
                                Edit
                            </a>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Are you sure you want to delete this task?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                        </path>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">No tasks yet</h3>
                    <p class="mt-2 text-sm text-gray-500">Get started by creating your first task above.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination if needed -->
        @if($tasks->count() > 0)
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600">
                    Showing all {{ $tasks->count() }} task{{ $tasks->count() !== 1 ? 's' : '' }}
                </p>
            </div>
        @endif
    </div>

    @push('scripts')
        <script>
            // Task filtering functionality
            document.addEventListener('DOMContentLoaded', function () {
                const filterButtons = document.querySelectorAll('.filter-btn');
                const taskItems = document.querySelectorAll('.task-item');

                filterButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const filter = this.getAttribute('data-filter');

                        // Update button states
                        filterButtons.forEach(btn => {
                            btn.classList.remove('active', 'bg-blue-500', 'text-white');
                            btn.classList.add('bg-gray-200', 'text-gray-700');
                        });

                        this.classList.add('active', 'bg-blue-500', 'text-white');
                        this.classList.remove('bg-gray-200', 'text-gray-700');

                        // Filter tasks
                        taskItems.forEach(task => {
                            const status = task.getAttribute('data-status');

                            if (filter === 'all' || filter === status) {
                                task.style.display = 'block';
                            } else {
                                task.style.display = 'none';
                            }
                        });
                    });
                });

                // Auto-submit completion toggle forms
                const toggleForms = document.querySelectorAll('.toggle-form');
                toggleForms.forEach(form => {
                    form.addEventListener('submit', function (e) {
                        e.preventDefault();

                        const button = form.querySelector('button');
                        button.disabled = true;

                        // You can add AJAX submission here if needed
                        // For now, we'll use the default form submission
                        form.submit();
                    });
                });
            });
        </script>
    @endpush
@endsection