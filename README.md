
# 📅 ENSAK Event Management System

The **ENSAK Event Management System** is a web application designed to streamline event management, user registrations, and interactions for the National School of Applied Sciences of Kenitra (ENSAK). This system provides a comprehensive solution for managing events, user authentication, profiles, and more.

## 🌟 Features

- **User Authentication**: Secure registration, login, and logout functionalities.
- **Event Management**: Create, edit, delete, and view events with detailed information.
- **Profile Management**: Update and manage user profiles.
- **Comment System**: Comment on events and manage comments.
- **Subscription Management**: Subscribe to newsletters for updates on events.
- **Search Functionality**: Search for events based on various criteria.
- **Analytics**: View event and user interaction analytics.



### Prerequisites

- PHP 7.3 or higher
- Composer
- A web server (e.g., Apache, Nginx)
- MySQL or another supported database

## 🛠️ Installation
### Steps

1. **Clone the repository:**
   ```bash
   git clone https://github.com/ryanelouarrat/ENSAK-EVENT.git 
2.  **Navigate to the project directory:**
    ```bash
    `cd ENSAK-EVENT
3.  **Install dependencies:**
    ```bash
    composer install 
4.  **Create a copy of the `.env.example` file and rename it to `.env`:**
    ```bash
    `cp .env.example .env` 
 5.  **Generate the application key:**
     ```bash
     `cd ENSAK-EVENT`
6.  **Configure your database in the `.env` file:**
    ```bash
    `DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password` 
    
7.  **Run the database migrations:**
    ```bash
    `php artisan migrate` 
8.  **Serve the application:**
    
    ```bash
    php artisan serve 
Visit `http://localhost:8000` in your web browser to see the application in action.

## 🚀 Usage

-   **Home Page**: View upcoming events and details.
-   **Sign Up**: Register for a new account.
-   **Login**: Access your account.
-   **Profile**: Manage your personal information and settings.
-   **Create Event**: Add new events (requires authentication).
-   **Edit Event**: Modify existing events (requires authentication).
-   **Delete Event**: Remove events (requires authentication).
-   **Comments**: Participate in discussions related to events.
-   **Subscribe**: Sign up for newsletters to stay updated on events.



## 📞 Contact

For any questions or inquiries, please contact [Rayane El Ouarrat](https://www.linkedin.com/in/rayane-el-ouarrat-460abb22a/).

----------

Visit the live application at [ENSAK Event Management System](https://rayaneelouarrat.000webhostapp.com/).
