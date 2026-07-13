# Laravel User Records CRUD

A simple CRUD (Create, Read, Update, Delete) application built with **Laravel 12**, using the **Query Builder** (no Eloquent models) to manage user records. The UI is built with **Bootstrap 5** and **Bootstrap Icons**, styled with a custom stylesheet, and rendered through Blade templates.

## Features

- **Create** — add new user records via a form (name, email, phone, role)
- **Read** — list all records with pagination, plus a detail view for a single record
- **Update** — edit an existing record's details
- **Delete** — remove a record with a confirmation prompt
- **Dashboard stats** — total records and a breakdown by role (Admin / Editor / Viewer)

## User Record
![image alt](https://github.com/ALI-RAZA816/laravel_crup_app/blob/ee0eee2ec34705c654a3a3120f52e0407e5b8866/public/1.PNG)
## Add User
![image alt](https://github.com/ALI-RAZA816/laravel_crup_app/blob/ee0eee2ec34705c654a3a3120f52e0407e5b8866/public/2.PNG)
## View User
![image alt](https://github.com/ALI-RAZA816/laravel_crup_app/blob/ee0eee2ec34705c654a3a3120f52e0407e5b8866/public/3.PNG)
## Update User
![image alt](https://github.com/ALI-RAZA816/laravel_crup_app/blob/ee0eee2ec34705c654a3a3120f52e0407e5b8866/public/4.PNG)

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 12 (PHP 8.2+) |
| Database access | Laravel Query Builder (`DB::table()`) |
| Frontend | Blade templates, Bootstrap 5, Bootstrap Icons |
| Build tooling | Vite, Tailwind CSS (dev dependency) |
| Database | MySQL (SQLite also supported) |

## Project Structure

```
app/Http/Controllers/UserController.php   # All CRUD logic
database/migrations/                      # users table schema
resources/views/
  layout/layout.blade.php                 # Shared layout (header + delete modal)
  welcome.blade.php                       # Records list + dashboard stats
  add.blade.php                           # Add record form
  update.blade.php                        # Edit record form
  view.blade.php                          # Single record detail view
routes/web.php                            # Route definitions
```

## Database Schema

The `users` table:

| Column | Type | Notes |
|---|---|---|
| `id` | bigint | Primary key |
| `name` | string(100) | Required |
| `email` | string(100) | Required, unique |
| `phone` | string(15) | Required, unique |
| `role` | string(10) | Admin / Editor / Viewer |
| `timestamps` | — | `created_at`, `updated_at` |

## Routes

| Method | URI | Action | Name |
|---|---|---|---|
| GET | `/` | List all records + stats | `home` |
| GET | `/add` | Show add-record form | — |
| POST | `/add` | Store a new record | `addUser` |
| GET | `/view/{id}` | Show a single record | `view.user` |
| GET | `/update/{id}` | Show edit form for a record | `view.update` |
| POST | `/update/{id}` | Update a record | `update.page` |
| GET | `/delete/{id}` | Delete a record | `user.delete` |

## Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- Node.js & npm
- MySQL (or SQLite)

### Installation

```bash
# Clone the repository
git clone <your-repo-url>
cd <project-folder>

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Copy the environment file
cp .env.example .env
php artisan key:generate
```

### Configure the database

Update your `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_app
DB_USERNAME=root
DB_PASSWORD=
```

Then run the migration to create the `users` table:

```bash
php artisan migrate
```

### Run the app

```bash
# Build frontend assets
npm run dev

# In a separate terminal, start the Laravel server
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## Usage

1. **View records** — the home page lists all users with pagination and shows stat cards for total records and role counts.
2. **Add a record** — click **Add Record**, fill in the form, and submit.
3. **View a record** — click the eye icon to see a record's full details.
4. **Edit a record** — click the pencil icon to open the pre-filled edit form.
5. **Delete a record** — click the trash icon and confirm to remove the record.

## Notes

- This project uses the Laravel **Query Builder** directly rather than Eloquent models, which is a good way to learn how Laravel talks to the database at a lower level before moving on to Eloquent.
- Roles are free-form text values (`Admin`, `Editor`, `Viewer`) validated only on the frontend `<select>` — consider adding backend validation (`$request->validate(...)`) before using this in production.
- The delete action currently uses a `GET` route for simplicity. For production use, consider switching it to a `DELETE` route with a form and `@method('DELETE')` to follow REST conventions and avoid destructive actions on GET requests.

## License

This project is open-sourced for learning purposes. Feel free to use and modify it.