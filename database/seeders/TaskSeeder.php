<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'title' => 'Complete Laravel Todo App',
                'description' => 'Build a fully functional todo application with CRUD operations, user-friendly interface, and task management features.',
                'is_completed' => false,
            ],
            [
                'title' => 'Review Code Quality',
                'description' => 'Check the codebase for best practices, proper documentation, and optimization opportunities.',
                'is_completed' => true,
            ],
            [
                'title' => 'Setup Database Migration',
                'description' => 'Create and run database migrations for the tasks table with proper field types and constraints.',
                'is_completed' => true,
            ],
            [
                'title' => 'Design User Interface',
                'description' => 'Create a clean, responsive UI using Tailwind CSS with proper form validation and user feedback.',
                'is_completed' => false,
            ],
            [
                'title' => 'Implement Task Filtering',
                'description' => 'Add functionality to filter tasks by status (all, pending, completed) for better task management.',
                'is_completed' => false,
            ],
            [
                'title' => 'Add Task Statistics',
                'description' => 'Display task statistics including total tasks, completed tasks, and pending tasks with visual indicators.',
                'is_completed' => true,
            ],
            [
                'title' => 'Write Documentation',
                'description' => 'Create comprehensive documentation for the application including setup instructions and usage guidelines.',
                'is_completed' => false,
            ],
        ];

        foreach ($tasks as $taskData) {
            task::create($taskData);
        }
    }
}