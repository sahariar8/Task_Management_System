# Laravel Task Management System

## **Project Overview**
This is a Laravel-based task management system with user authentication implemented using Laravel Breeze. The application allows users to register, log in, change their passwords, and reset forgotten passwords. Additionally, the project includes CRUD operations for tasks, filtering tasks by status, and sorting them by due date. Blade templating is used for all frontend views.

---

## **Features**

### **User Authentication**
- **Registration:** Users can create an account to access the application.
- **Login:** Users can log in using their email and password.
- **Password Change:** Authenticated users can change their password.
- **Password Reset:** Users can reset their password if they forget it using email verification.

### **Task Management**
- **Create Tasks:** Users can add new tasks with details like title, description, due date, and status.
- **View Tasks:** A paginated list of all tasks is displayed with filtering and sorting functionality.
- **Edit Tasks:** Users can edit the details of existing tasks.
- **Delete Tasks:** Users can remove tasks from the system.

### **Task Filtering and Sorting**
- **Filter by Status:** Users can filter tasks based on their status (e.g., Pending, In Progress, Completed).
- **Sort by Due Date:** Users can sort tasks based on their due dates using a dynamic search field without requiring a submit button.

---