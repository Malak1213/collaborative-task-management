# Task Management System

![Laravel](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

## About This Project

This is a **Task Management System** built with Laravel, designed to help users create, organize, and track tasks efficiently. It includes project-based task management, progress tracking, and task sorting features.

### Key Features

-   **Task Management**: Create, update, and delete tasks.
-   **Task Status**: Tasks have statuses (`to do`, `in progress`, `done`).
-   **Task Due Dates**: Display and sort tasks based on deadlines.
-   **Project Association**: Tasks can be linked to projects.
-   **Project Completion Tracking**: Shows progress based on completed tasks.
-   **Navigation Enhancements**:
    -   Redirects back to project after task creation.
    -   "Cancel" button on task creation page.
    -   Easy navigation between projects and tasks.
-   **Sorting Options**: Sort tasks by priority or deadline.

---

## Installation & Setup

Follow these steps to set up the project locally:

### Prerequisites

Ensure you have the following installed:

-   PHP 8+
-   Composer
-   MySQL or SQLite
-   Node.js & npm (optional for front-end assets)

### Steps

```sh
# Clone the repository
git clone https://github.com/Malak1213/collaborative-task-management.git
cd collaborative-task-management

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Set up database and run migrations
php artisan migrate --seed

# Serve the application
php artisan serve
```

---

## Usage Guide

-   **Creating Tasks**: Click "Add Task", enter details, and submit.
-   **Task Status Update**: Click on a task to change its status.
-   **Sorting Tasks**: Use the sorting options to arrange tasks by priority or deadline.
-   **Navigating Between Projects**: Use links to switch between tasks and projects.
-   **Task Deletion**: Delete unwanted tasks from the list.

---

## Future Improvements

-   **User Authentication** (Allow multiple users to manage tasks.)
-   **Task Comments & Notes**
-   **Notifications & Reminders**
-   **API Support** (For integration with other apps.)

---

## Contributing

Contributions are welcome! Fork the repository, make your changes, and submit a pull request.

---

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
