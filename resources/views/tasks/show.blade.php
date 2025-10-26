@extends('layouts.app')

@section('title', 'View Task - ' . $task->title)

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <!-- Header -->
            <div class="mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">Task Details</h1>
                        <p class="text-gray-600">View and manage task information</p>
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

            <!-- Task Status Badge -->
            <div class="mb-6">
                @if($task->is_completed)
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Completed
                    </span>
                @else
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-amber-100 text-amber-800">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Pending
                    </span>
                @endif
            </div>

            <!-- Task Information -->
            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Task Title</label>
                    <div class="bg-gray-50 border border-gray-200 rounded-md p-3">
                        <h2
                            class="text-lg font-semibold text-gray-900 {{ $task->is_completed ? 'line-through text-gray-500' : '' }}">
                            {{ $task->title }}
                        </h2>
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <div class="bg-gray-50 border border-gray-200 rounded-md p-3 min-h-[100px]">
                        @if($task->description)
                            <p class="text-gray-700 {{ $task->is_completed ? 'line-through text-gray-500' : '' }}">
                                {{ $task->description }}
                            </p>
                        @else
                            <p class="text-gray-500 italic">No description provided</p>
                        @endif
                    </div>
                </div>
                <!-- Reminder Date and Time -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Reminder</label>
                    <div class="bg-gray-50 border border-gray-200 rounded-md p-3 min-h-[50px]">
                        @if($task->reminder_date || $task->reminder_time)
                            <p class="text-gray-700">
                                @if($task->reminder_date)
                                    <span class="font-medium">Date:</span>
                                    {{ \Carbon\Carbon::parse($task->reminder_date)->format('M j, Y') }}
                                @endif
                                @if($task->reminder_time)
                                    <br>
                                    <span class="font-medium">Time:</span>
                                    {{ \Carbon\Carbon::parse($task->reminder_time)->format('g:i A') }}
                                @endif
                            </p>
                        @else
                            <p class="text-gray-500 italic">No reminder set</p>
                        @endif
                    </div>

                    <!-- Timestamps -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Created</label>
                            <div class="bg-gray-50 border border-gray-200 rounded-md p-3">
                                <p class="text-gray-700">{{ $task->created_at->format('M j, Y') }}</p>
                                <p class="text-sm text-gray-500">{{ $task->created_at->format('g:i A') }}</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Updated</label>
                            <div class="bg-gray-50 border border-gray-200 rounded-md p-3">
                                <p class="text-gray-700">{{ $task->updated_at->format('M j, Y') }}</p>
                                <p class="text-sm text-gray-500">{{ $task->updated_at->format('g:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="mt-8 border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Actions</h3>

                    <div class="flex flex-wrap gap-3">
                        <!-- Toggle Completion -->
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Mark as Pending
                                </button>
                            @else
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-green-500 text-white font-medium rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 transition">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Mark as Completed
                                </button>
                            @endif
                        </form>

                        <!-- Edit Task -->
                        <a href="{{ route('tasks.edit', $task->id) }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit Task
                        </a>

                        <!-- Delete Task -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline"
                            onsubmit="return confirm('Are you sure you want to delete this task? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-red-500 text-white font-medium rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                Delete Task
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex justify-between">
                        <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                            ← View All Tasks
                        </a>

                        <a href="{{ route('tasks.create') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                            Create New Task →
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection