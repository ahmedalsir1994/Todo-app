# 📝 Laravel Todo Application

A modern, responsive task management application built with Laravel 12 and Tailwind CSS. This application provides a clean and intuitive interface for managing your daily tasks with features like task creation, editing, completion tracking, and more.

![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white)

## ✨ Features

-   **📋 Task Management**: Create, read, update, and delete tasks
-   **✅ Task Completion**: Mark tasks as completed or pending
-   **📊 Dashboard Statistics**: View total, completed, and pending tasks
-   **🔍 Task Filtering**: Filter tasks by status (All, Pending, Completed)
-   **📱 Responsive Design**: Optimized for desktop and mobile devices
-   **⚡ Quick Add**: Fast task creation directly from the main page
-   **📝 Detailed Forms**: Advanced task creation with descriptions
-   **🕒 Timestamps**: Track when tasks were created and updated
-   **⏰ Reminder System**: Set reminder dates and times for tasks (database ready)

## 🛠 Tech Stack

-   **Backend**: Laravel 12.0
-   **Frontend**: Blade Templates with Tailwind CSS
-   **Database**: SQLite (easily configurable to MySQL/PostgreSQL)
-   **PHP Version**: 8.2+
-   **Testing**: Pest PHP
-   **Package Manager**: Composer

## 🚀 Quick Start

### Prerequisites

-   PHP 8.2 or higher
-   Composer
-   Node.js & NPM (for asset compilation)

### Installation

1. **Clone the repository**

    ```bash
    git clone https://github.com/ahmedalsir1994/Todo-app.git
    cd Todo-app
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Install NPM dependencies**

    ```bash
    npm install
    ```

4. **Environment setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Database setup**

    ```bash
    # Create SQLite database file
    touch database/database.sqlite

    # Run migrations
    php artisan migrate

    # (Optional) Seed with sample data
    php artisan db:seed
    ```

6. **Compile assets**

    ```bash
    npm run dev
    ```

7. **Start the development server**
    ```bash
    php artisan serve
    ```

Visit `http://localhost:8000` to access the application.

## 📋 Database Schema

### Tasks Table

| Column        | Type        | Description                        |
| ------------- | ----------- | ---------------------------------- |
| id            | Primary Key | Auto-incrementing task ID          |
| title         | String      | Task title (required)              |
| description   | Text        | Task description (optional)        |
| is_completed  | Boolean     | Completion status (default: false) |
| reminder_date | Date        | Reminder date (optional)           |
| reminder_time | Time        | Reminder time (optional)           |
| created_at    | Timestamp   | Creation timestamp                 |
| updated_at    | Timestamp   | Last update timestamp              |

## 🎯 Usage

### Creating Tasks

-   **Quick Add**: Use the form at the top of the main page for simple tasks
-   **Advanced Form**: Click "Advanced form" for tasks with detailed descriptions

### Managing Tasks

-   **Mark Complete**: Click the circle icon next to any task
-   **Edit Task**: Click the "Edit" button to modify task details
-   **Delete Task**: Click "Delete" (with confirmation prompt)
-   **View Details**: Click "View" to see full task information

### Filtering Tasks

Use the filter buttons to view:

-   **All Tasks**: Complete overview
-   **Pending**: Only incomplete tasks
-   **Completed**: Only finished tasks

## 🔧 Configuration

### Database Configuration

Edit `.env` file to change database settings:

```env
# For SQLite (default)
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite

# For MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_app
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Application Settings

```env
APP_NAME="Todo App"
APP_URL=http://localhost:8000
APP_TIMEZONE=UTC
```

## 🧪 Testing

Run the test suite using Pest:

```bash
# Run all tests
php artisan test

# Run specific test file
php artisan test tests/Feature/TaskTest.php

# Run with coverage
php artisan test --coverage
```

## 📁 Project Structure

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── TaskController.php     # Main task controller
│   │   └── Requests/
│   │       └── taskRequest.php        # Form validation
│   └── Models/
│       └── task.php                   # Task model
├── database/
│   ├── migrations/
│   │   └── 2025_09_04_131017_create_tasks_table.php
│   └── seeders/
│       └── TaskSeeder.php             # Sample data seeder
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php          # Main layout
│       └── tasks/
│           ├── index.blade.php        # Task dashboard
│           ├── create.blade.php       # Create task form
│           ├── edit.blade.php         # Edit task form
│           └── show.blade.php         # Task details
└── routes/
    └── web.php                        # Application routes
```

## 🔮 Future Enhancements

-   [ ] **User Authentication**: Multi-user support with login/registration
-   [ ] **Task Categories**: Organize tasks into categories
-   [ ] **Due Dates**: Set and track task deadlines
-   [ ] **Priority Levels**: High, medium, low priority tasks
-   [ ] **Task Attachments**: Add files to tasks
-   [ ] **Email Notifications**: Reminder emails for due tasks
-   [ ] **API Endpoints**: RESTful API for mobile app integration
-   [ ] **Task Sharing**: Collaborate on tasks with other users
-   [ ] **Dark Mode**: Theme switching capability
-   [ ] **Task Export**: Export tasks to PDF/CSV

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Author

**Ahmed Alsir**

-   GitHub: [@ahmedalsir1994](https://github.com/ahmedalsir1994)
-   Repository: [Todo-app](https://github.com/ahmedalsir1994/Todo-app)
