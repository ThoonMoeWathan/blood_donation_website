# 🩸 Blood Donation Website

A Laravel-based web platform that facilitates blood donation activities by connecting donors, hospitals, and administrators. This system provides features for managing blood banks, donors, events, appointments, and more.

---

## 🌐 Features

### 🔓 Public Access
- View homepage
- View event details
- User login and registration

### 🔐 Admin Panel
- Dashboard overview
- Manage blood categories & inventory
- Manage blood banks and doctors
- Create and manage events
- View & manage user accounts (donors, companies)
- Manage blood donation requests and appointments
- Handle contact form submissions
- View and manage fund donations

### 👤 User Portal
- Donor registration and profile management
- Book appointments
- Request blood
- Submit inquiries via contact form
- View events
- Donate fund through Credit Card Payment Page

---

## 🧰 Tech Stack

- **Framework**: Laravel
- **Frontend**: Blade Templates, HTML, CSS, Bootstrap
- **Database**: MySQL
- **Authentication**: Laravel Breeze / Auth
- **Other Tools**: Laravel Jetstream, Composer, NPM, Laravel Artisan CLI

---

## 🚀 Installation

1. **Clone the repository**
```bash
git clone https://github.com/yourusername/blood-donation-app.git
cd blood-donation-app
```

2. **Install dependencies**

```bash
composer install
npm install && npm run dev
```

3. **Environment setup**

**Copy paste "env.example" and rename it to ".env"**
```bash
php artisan key:generate
php artisan storage:link
```
4. **Configure database in .env and run migrations**

```bash
php artisan migrate --seed
```
5. **Start the development server**

```bash
php artisan serve
```

---
## 👤 User Roles

**Admin:** Full access to backend management (blood data, users, events, etc.)

**Registered Donor:** Limited access (request blood, appointments, account settings)

**Guest Users:** Can view events and register/login

---
## 📁 Project Structure
app/Http/Controllers/ – **All controller logic**

resources/views/ – **Blade view files**

routes/web.php – **Web route declarations**

database/seeders/ – **Seeder files for initial data**

public/ – **Public assets (images, styles)**

---


