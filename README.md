
# TaskFlow

TaskFlow is a simple Task Manager application designed to help users create, read, update, and delete tasks efficiently. Built with PHP, Bootstrap 5, jQuery, and MySQL, TaskFlow is containerized using ddev for streamlined development and deployment.

## Features

- **Task Management:** Create, view, edit, and delete tasks.
- **Responsive Design:** Utilizes Bootstrap 5 for a mobile-friendly interface.
- **Database Integration:** Stores tasks in a MySQL database.
- **Containerized Development:** Easily set up and run the application using ddev.

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Composer
- ddev

## Installation

Follow these steps to set up the project locally:

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/imustakim/taskflow.git
   ```

2. **Navigate to the Project Directory:**

   ```bash
   cd taskflow
   ```

3. **Install PHP Dependencies:**

   Use Composer to install the required dependencies:

   ```bash
   composer install
   ```

4. **Start the ddev Environment:**

   Initialize and start the ddev environment:

   ```bash
   ddev start
   ```

5. **Access the Application:**

   Open your web browser and go to:

   ```text
   http://taskflow.ddev.site
   ```

## Usage

- **Add a Task:** Use the form on the homepage to add new tasks.
- **View Tasks:** See all tasks listed on the homepage.
- **Edit a Task:** Click the edit button next to a task to update it.
- **Delete a Task:** Click the delete button to remove a task.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
