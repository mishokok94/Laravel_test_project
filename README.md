# Laravel Web Application

This is a Laravel-based web application with an admin panel powered by [Filament](https://filamentphp.com/) for managing users and currency exchange rates. The project is containerized using Docker and Laravel Sail.

##  Features

- Authentication system (registration, login, logout)
- Admin panel for managing users (only accessible to admins) (coming soon with updates )
- Currency exchange rate management
- RESTful API structure
- Fully containerized with **Docker + Laravel Sail**
- Uses **MySQL** as the database

---

## ✅ **Requirements**

Before setting up the project, ensure you have the following installed on your system:

- **Docker** (latest version) → [Install Docker](https://docs.docker.com/get-docker/)
- **Docker Compose** (included in Docker Desktop)
- **Git** → [Install Git](https://git-scm.com/)
- **Make** (for automation)  
  - On macOS: `brew install make`
  - On Ubuntu: `sudo apt install make`
  - On Windows (via WSL): `sudo apt install make`

---

## 🔧 **Installation & Setup**

Follow these steps to set up and start the project:

### **
1️⃣ Clone the repository**
git clone git@github.com:mishokok94/Laravel_test_project.git

### **
cd Laravel_test_project

2️⃣ Copy the environment file  

cp .env.example .env

Then, update the .env file with the required database credentials and API keys:

# Database Configuration  

DB_CONNECTION=mysql  

DB_HOST=mysql  

DB_PORT=3306  

DB_DATABASE=laravel  

DB_USERNAME=sail  

DB_PASSWORD=password  


# Admin Credentials for Filament Panel
ADMIN_USER=admin-filament@example.com  

ADMIN_PASSWORD=USDeurMDL18-19-20

# Exchange Rate API Key
# To generate your unique API key, go to https://app.exchangerate-api.com/dashboard
EXCHANGE_RATE_API_KEY=b560dc8736746b7019582474



3️⃣ Install dependencies

make composer-install


4️⃣ Start the application

make init


This will:
	•	Build and start Docker containers
	•	Generate the application key
	•	Run database migrations and seeders
	•	Link storage
	•	Clear caches and routes
	•	Install NPM dependencies
	•	Start the development server
	•	Fetch currency exchange rates


 5️⃣ Open the application in your browser

 http://localhost


 For the Filament admin panel, visit:

 http://localhost/admin

 🛠 Useful Commands

 Command

make start  

make stop  

make restart  

make migrate  

make seed  

make npm  

make npm-dev  

make composer-install  



👤 Admin Credentials

After seeding the database, you can log into the admin panel using:
	•	Email: admin-filament@example.com  
 
	•	Password: USDeurMDL18-19-20  
 
