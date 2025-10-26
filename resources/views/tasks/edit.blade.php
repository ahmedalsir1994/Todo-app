@extends('layouts.app')

@section('title', 'Edit Task - ' . $task->title)

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Edit Task</h1>
                    <p class="text-gray-600">Update task information</p>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('tasks.show', $task->id) }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-500 text-white font-medium rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        View
                    </a>
                    <a href="{{ route('tasks.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-500 text-white font-medium rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Tasks
                    </a>
                </div>
            </div>
        </div>

        <!-- Task Status Badge -->
        <div class="mb-6">
            @if($task->is_completed)
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Completed
                </span>
            @else
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-amber-100 text-amber-800">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Pending
                </span>
            @endif
        </div>

        <!-- Edit Task Form -->
        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Task Title <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $task->title) }}"
                       placeholder="Enter task title..."
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
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
                <textarea id="description" 
                          name="description" 
                          rows="4" 
                          placeholder="Enter task description (optional)..."
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-sm mt-1">Provide additional details about the task</p>
            </div>
            <div>
                <label for="reminder_date" class="block text-sm font-medium text-gray-700 mb-2">
                    Reminder Date
                </label>
                <input type="date" 
                       id="reminder_date" 
                       name="reminder_date" 
                       value="{{ old('reminder_date', $task->reminder_date) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('reminder_date')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-sm mt-1">Set a date to be reminded about this task</p>

            <div>
                <label for="is_completed" class="block text-sm font-medium text-gray-700 mb-2">
                    Task Status
                </label>
                <div class="space-y-2">
                    <label class="inline-flex items-center">
                        <input type="radio" 
                               name="is_completed" 
                               value="0" 
                               {{ old('is_completed', $task->is_completed) == 0 ? 'checked' : '' }}
                               class="form-radio text-blue-500">
                        <span class="ml-2 text-gray-700">Pending</span>
                    </label>
                    <br>
                    <label class="inline-flex items-center">
                        <input type="radio" 
                               name="is_completed" 
                               value="1" 
                               {{ old('is_completed', $task->is_completed) == 1 ? 'checked' : '' }}
                               class="form-radio text-green-500">
                        <span class="ml-2 text-gray-700">Completed</span>
                    </label>
                </div>
                @error('is_completed')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Task Metadata -->
            <div class="bg-gray-50 border border-gray-200 rounded-md p-4">
                <h3 class="text-sm font-medium text-gray-900 mb-2">Task Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                    <div>
                        <span class="font-medium">Created:</span>
                        {{ $task->created_at->format('M j, Y g:i A') }}
                    </div>
                    <div>
                        <span class="font-medium">Last Updated:</span>
                        {{ $task->updated_at->format('M j, Y g:i A') }}
                    </div>
                </div>
            </div>
            
            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <div class="flex space-x-3">
                    <a href="{{ route('tasks.show', $task->id) }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 transition">
                        Cancel
                    </a>
                    
                    <a href="{{ route('tasks.index') }}" 
                       class="text-blue-600 hover:text-blue-800 font-medium py-2">
                        Back to All Tasks
                    </a>
                </div>
                
                <button type="submit" 
                        class="inline-flex items-center px-6 py-2 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Update Task
                </button>
            </div>
        </form>

        <!-- Quick Actions -->
        <div class="mt-8 border-t border-gray-200 pt-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Actions</h3>
            
            <div class="flex flex-wrap gap-3">
                <!-- Toggle Completion (without editing) -->
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="inline">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="title" value="{{ $task->title }}">
                    <input type="hidden" name="description" value="{{ $task->description }}">
                    <input type="hidden" name="is_completed" value="{{ $task->is_completed ? 0 : 1 }}">
                    
                    @if($task->is_completed)
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-amber-500 text-white font-medium rounded-md hover:bg-amber-600 focus:outline-none focus:ring-2 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Quick Mark as Pending
                        </button>
                    @else
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-green-500 text-white font-medium rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Quick Mark as Completed
                        </button>
                    @endif
                </form>

                <!-- Delete Task -->
                <form action="{{ route('tasks.destroy', $task->id) }}" 
                      method="POST" 
                      class="inline"
                      onsubmit="return confirm('Are you sure you want to delete this task? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 bg-red-500 text-white font-medium rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Delete Task
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
