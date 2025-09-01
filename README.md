# Edu System Setup Instructions

## Requirements
- PHP >= 8.1
- Composer
- Node.js & npm (for frontend assets)
- mysql
- laravel/framework: 12.0
## Installation

1. **Clone the repository:**
	```bash
	git clone <your-repo-url>
	cd edu_system/edu_application
	```

2. **Install PHP dependencies:**
	```bash
	composer install
	```

3. **Install Node.js dependencies:**
	```bash
	npm install
	npm run build
	```

4. **Copy .env file and set up environment:**
	```bash
	cp .env.example .env
	# Edit .env to set your DB and mail settings
	```

5. **Generate application key:**
	```bash
	php artisan key:generate
	```

6. **Run migrations to set up the database:**
	```bash
	php artisan migrate
	```

	Or, to refresh and seed:
	```bash
	php artisan migrate:refresh --seed
	```

7. **(Optional) Run SQL file for DB setup:**
	If you prefer SQL, import `database/schema.sql` into your database.

8. **Start the development server:**
	```bash
	php artisan serve
	```

9. **Access the app:**
	Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

-- Login in password for admin
    admin@gmail.com
    admin123
-- Login in password for student you can register and login
    kavishka
    admin123

## Additional Commands
- To run the cron job for deleting completed classes:
  ```bash
  php artisan app:delete-completed-classes
  ```
- To run the API use this command
 ```bash
  http://127.0.0.1:8000/api/students/subscriptions
  ```

## Notes
- Update mail settings in `.env` for email notifications.
- ## Authentication
  
This project uses [Laravel Breeze] for authentication.

