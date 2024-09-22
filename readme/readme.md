# **Decor Vista - Interior Design Management System**

### **Project Overview**
Decor Vista is a web application developed using **Laravel 10**, designed for interior design and home decor businesses. It offers an efficient platform to manage design portfolios, book consultations, manage client interactions, and streamline project management processes. The application is equipped with a user-friendly interface for customers, designers, and administrators to enhance the design workflow and client experience.

---

### **Table of Contents**
1. [Features](#features)
2. [Technologies Used](#technologies-used)
3. [Installation Guide](#installation-guide)
4. [Environment Configuration](#environment-configuration)
5. [Running the Application](#running-the-application)
6. [Usage Instructions](#usage-instructions)
7. [Folder Structure](#folder-structure)
8. [License](#license)

---

### **Features**

- **User Roles**: 
  - **Admin**: Manage users, designers, projects, and appointments.
  - **Interior Designer**: Add portfolios, manage client projects, and update status.
  - **Client/User**: Browse portfolios, book design services, and track project progress.

- **Project Management**: 
  - Add, edit, and view project details.
  - Schedule consultations and track project milestones.

- **Design Portfolio**: 
  - Upload and showcase design projects for potential clients.

- **Appointment Booking**: 
  - Schedule and manage consultations with interior designers.
  - Receive automated notifications for appointments.

- **Payment and Billing**: 
  - Clients can pay for design services directly through the platform.
  - Generate and track invoices.

- **Admin Dashboard**: 
  - Comprehensive reports on business operations, projects, client engagement, and payments.

- **Responsive Design**: 
  - Optimized for desktop, tablet, and mobile devices.

---

### **Technologies Used**
- **Framework**: Laravel 10 (PHP)
- **Frontend**: Blade templates, Bootstrap 5, HTML5, CSS, JavaScript
- **Database**: MySQL
- **Version Control**: Git
- **Notifications**: Laravel Notification for email and SMS

---

### **Installation Guide**

#### **Step 1: Clone the repository**
```bash
git clone https://github.com/yourusername/TechMaster--DecorVista.git
cd decor-vista
```

#### **Step 2: Install PHP dependencies**
Make sure you have **Composer** installed, then run:
```bash
composer install
```

#### **Step 3: Install frontend dependencies**
Make sure you have **Node.js** and **npm** installed, then run:
```bash
npm install
```

---

### **Environment Configuration**

1. **Create a `.env` file** by copying the example:
   ```bash
   cp .env.example .env
   ```
2. **Update the following variables** in the `.env` file:
   - **APP_URL**: Set your application URL.
   - **DB_DATABASE, DB_USERNAME, DB_PASSWORD**: Database connection details.
   - **MAIL_DRIVER, MAIL_HOST, MAIL_USERNAME, MAIL_PASSWORD**: Mail service configurations (for notifications).
   - **STRIPE_KEY, STRIPE_SECRET** (Optional for payment integration).

3. **Generate the application key**:
   ```bash
   php artisan key:generate
   ```

---

### **Running the Application**

#### **Step 1: Migrate and Seed the Database**
Run the following commands to set up the database:
```bash
php artisan migrate --seed
```

#### **Step 2: Start the development server**
```bash
php artisan serve
```
The app will be available at `http://localhost:8000`.

#### **Step 3: Compile frontend assets**
For development:
```bash
npm run dev
```
For production:
```bash
npm run build
```

---

### **Usage Instructions**

#### **Login/Register**
- Access the login or registration page at `/login` or `/register`.
- Depending on the user role (Admin, Designer, or Client), the dashboard and features will differ.

#### **Admin Dashboard**
- Manage designers, clients, projects, and bookings.
- View analytics and reports.
- Control application settings and user roles.

#### **Interior Designer Panel**
- Create and manage portfolios.
- Track project status and communicate with clients.
- Manage bookings and project timelines.

#### **Client Panel**
- Browse the portfolio of designers.
- Book consultations and view project progress.
- Make payments and manage invoices.

---

### **Folder Structure**

```bash
decor-vista/
│
├── app/                # Application logic (Controllers, Models)
├── bootstrap/          # Framework bootstrap files
├── config/             # Configuration files
├── database/           # Migrations, seeders, and factories
├── public/             # Publicly accessible files (index.php, assets)
├── resources/          # Views, Blade templates, Sass, JS
├── routes/             # Application routes (web.php)
├── storage/            # Logs, compiled Blade templates, etc.
├── tests/              # Unit and Feature tests
└── vendor/             # Composer dependencies
```

---





