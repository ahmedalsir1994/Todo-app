@extends('layouts.app')

@section('title', 'Create New Task')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <!-- Header -->
            <div class="mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">Create New Task</h1>
                        <p class="text-gray-600">Add a new task to your todo list</p>
                    </div>
                    <a href="{{ route('tasks.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-500 text-white font-medium rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Tasks
                    </a>
                </div>
            </div>

            <!-- Create Task Form -->
            <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Task Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Enter task title..."
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}"
                        required>
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-gray-500 text-sm mt-1">Maximum 255 characters</p>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Description
                    </label>
                    <textarea id="description" name="description" rows="4"
                        placeholder="Enter task description (optional)..."
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-gray-500 text-sm mt-1">Provide additional details about the task</p>
                </div>
                <!-- ...existing code... -->
                <div>
                    <label for="reminder_date">Reminder Date:</label>
                    <input type="date" name="reminder_date" id="reminder_date"
                        value="{{ old('reminder_date', $task->reminder_date ?? '') }}">
                </div>
                <div>
                    <label for="reminder_time">Reminder Time:</label>
                    <input type="time" name="reminder_time" id="reminder_time"
                        value="{{ old('reminder_time', $task->reminder_time ?? '') }}">
                </div>
                <!-- ...existing code... -->

                <!-- Task Priority (if you want to add this field to your model later) -->
                <div class="bg-blue-50 border border-blue-200 rounded-md p-4">
                    <h3 class="text-sm font-medium text-blue-900 mb-2">💡 Tips for better task management:</h3>
                    <ul class="text-sm text-blue-700 space-y-1">
                        <li>• Use clear and specific titles</li>
                        <li>• Break down complex tasks into smaller ones</li>
                        <li>• Add relevant details in the description</li>
                        <li>• You can always edit the task later</li>
                    </ul>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                    <a href="{{ route('tasks.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 transition">
                        Cancel
                    </a>

                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Create Task
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection