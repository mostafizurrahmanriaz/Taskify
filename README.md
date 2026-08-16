# Taskify — Local Service Finder

> A Laravel-based local service marketplace that connects customers with service providers for discovering, booking, and managing local services.

Taskify is designed around a simple idea: **help users find trusted local service providers quickly while giving providers a dedicated dashboard to manage services and booking requests.**

---

## 📌 Project Overview

Taskify provides two main experiences:

- **Customers / Users** can browse services, search by keyword, filter by category, view service details, book services, and track booking status.
- **Service Providers** can complete their provider profile, create and manage services, receive booking requests, accept or reject requests, and manage completed jobs.

The project uses a role-based authentication system with a shared `users` table and separate provider profile data.

---

## 🎯 Project Goals

- Make local service discovery simple.
- Connect customers with individual service providers.
- Give providers a dedicated management dashboard.
- Provide a simple booking workflow.
- Keep the application understandable and scalable for future features.

---

## ✨ Current Features

### 👤 User / Customer Features

- User registration and login
- Role-based access for users and providers
- User dashboard
- Browse all available services
- Search services by title and description
- Filter services by category
- Paginated service listings
- Preserve search/filter parameters during pagination
- View service details
- View provider information
- Provider "About Me" information
- Service image with fallback support
- Direct service booking
- My Bookings page
- Booking status tracking
- Booking statuses:
  - Pending
  - Accepted
  - Rejected
  - Completed
- Provider contact information becomes available after a booking is accepted

### 🧑‍🔧 Provider Features

- Provider registration
- Automatic authentication after registration
- Provider setup/profile completion flow
- Provider-specific dashboard
- Provider profile connected to the authenticated user through `user_id`
- Create services
- View and manage services
- Service fields:
  - Title
  - Category
  - Price
  - Description
  - Image
- Optional service image upload
- Provider address used as the default service location
- Receive booking requests
- View booking details
- Accept booking requests
- Reject booking requests
- View customer information after accepting a booking
- Mark accepted bookings as completed
- Dashboard statistics:
  - Total Services
  - Total Bookings
  - Completed Jobs
- Recent bookings section
- Quick Actions section

---

## 🔐 Authentication & Authorization

Taskify uses a **single authentication system** based on the `users` table.

### Roles

```text
user
provider
```

A provider is also an authenticated user, with additional provider-specific information stored in the `providers` table.

### Authentication Flow

```text
Register
   ↓
Auto Login
   ↓
Check Role
   ├── user     → User Dashboard
   │
   └── provider → Provider Setup
                     ↓
                Provider Dashboard
```

### Provider Setup Flow

A provider must complete the provider setup before accessing provider-specific dashboard features.

```text
User
  │
  └── hasOne → Provider
                  │
                  └── hasMany → Services
```

---

## 🗃️ Database Structure

### `users`

Stores authentication/account information.

```text
id
name
email
password
role
created_at
updated_at
```

### `providers`

Stores provider-specific information.

```text
id
user_id
phone
address
about
profile_image
created_at
updated_at
```

### `categories`

Stores service categories such as:

```text
Plumbing
Electrical
Cleaning
Painting
Gardening
Appliance Repair
Moving
```

### `services`

Stores services offered by providers.

```text
id
provider_id
category_id
title
description
price
image
status
reviews_avg_rating
reviews_count
created_at
updated_at
```

### `bookings`

Stores customer booking requests.

```text
id
user_id
provider_id
service_id
price
status
created_at
updated_at
```

Current booking lifecycle:

```text
pending
   ↓
accepted
   ↓
completed

pending
   ↓
rejected
```

---

## 🔗 Main Laravel Relationships

### User

```php
public function provider()
{
    return $this->hasOne(Provider::class);
}

public function bookings()
{
    return $this->hasMany(Booking::class);
}
```

### Provider

```php
public function user()
{
    return $this->belongsTo(User::class);
}

public function services()
{
    return $this->hasMany(Service::class);
}

public function bookings()
{
    return $this->hasMany(Booking::class);
}
```

### Service

```php
public function provider()
{
    return $this->belongsTo(Provider::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}
```

### Booking

```php
public function user()
{
    return $this->belongsTo(User::class);
}

public function provider()
{
    return $this->belongsTo(Provider::class);
}

public function service()
{
    return $this->belongsTo(Service::class);
}
```

---

## 🔄 Booking Workflow

```text
Customer
   ↓
Browse Services
   ↓
View Service Details
   ↓
Book Now
   ↓
Booking Created
(status = pending)
   ↓
Provider Dashboard
   ↓
Accept OR Reject
   │
   ├── Reject → rejected
   │
   └── Accept
          ↓
       accepted
          ↓
   Provider performs service
          ↓
       completed
```

### Contact Visibility

```text
Pending   → Contact hidden
Accepted  → Contact visible
Rejected  → Contact hidden
Completed → Contact remains available
```

---

## 🔍 Search & Filtering

The service listing supports Laravel GET-based filtering.

Example:

```text
/services?search=Plumbing+Sanitary+Service&category=3&page=2
```

Current search/filter functionality includes:

- Search by service title
- Search by service description
- Category filtering
- Pagination
- Query-string preservation

Example:

```php
$services = $query
    ->paginate(6)
    ->withQueryString();
```

---

## 📄 Service Listing

The All Services page uses a marketplace-style layout:

```text
┌──────────────────────────────────────────┐
│ Search + Sort                            │
├─────────────┬────────────────────────────┤
│ Filters     │ Service Cards              │
│ Category    │ Service Cards              │
│ Price       │ Service Cards              │
│ Location    │                            │
│             │ Pagination                 │
└─────────────┴────────────────────────────┘
```

Service cards follow the homepage Featured Services visual style:

- Service image
- Service title
- Location/provider information
- Rating
- Price
- View Details button
- Responsive layout
- Hover interactions

---

## 💰 Pricing

The current MVP uses a **fixed-price model**.

Examples:

```text
AC Servicing             ৳2600
Plumbing Service         ৳1800
Home Cleaning            ৳1000
```

The price is stored in the `services` table.

---

## 🖼️ Service Images

Service images are optional.

When a provider does not upload an image, a default/fallback service image can be displayed so service cards never appear broken or empty.

---

## 🎨 UI / Design

Taskify uses a clean marketplace/dashboard visual style.

### Primary Brand Color

```text
#FF6B6B
```

The primary color is mainly used for:

- Primary actions
- Active states
- Highlights
- Icons
- Hover states
- Important booking actions

### Provider Dashboard

The provider dashboard is management-focused rather than a copy of the public homepage.

```text
Sidebar
   ↓
Dashboard
   ↓
Statistics
   ↓
Recent Bookings
   ↓
Quick Actions
   ↓
Small Dashboard Footer
```

---

## 🧰 Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel / PHP |
| Frontend | Blade, HTML, CSS, Bootstrap 5 where required |
| JavaScript | Vanilla JavaScript |
| Database | MySQL |
| Package Manager | Composer / NPM |
| Version Control | Git / GitHub |

---

## 📁 Project Structure

```text
app/
├── Http/
│   ├── Controllers/
│   └── Middleware/
├── Models/
└── ...

database/
├── migrations/
└── seeders/

resources/
├── views/
│   ├── layouts/
│   ├── user/
│   ├── provider/
│   └── ...
└── ...

routes/
└── web.php

public/
├── images/
└── ...

storage/
└── app/
```

---

## 🚀 Installation

### 1. Clone the repository

```bash
git clone https://github.com/YOUR-USERNAME/taskify.git
cd taskify
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install frontend dependencies

```bash
npm install
```

### 4. Create environment file

```bash
cp .env.example .env
```

Windows:

```bash
copy .env.example .env
```

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Configure database

Update `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taskify
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Run migrations

```bash
php artisan migrate
```

If seeders are available:

```bash
php artisan db:seed
```

### 8. Create storage link

```bash
php artisan storage:link
```

### 9. Start Laravel

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

For frontend development:

```bash
npm run dev
```

---

## 🧪 Main Workflow Test

### Customer

```text
Register
↓
Login
↓
Browse Services
↓
Search / Filter
↓
View Service
↓
Book Service
↓
My Bookings
↓
Track Status
```

### Provider

```text
Register
↓
Provider Setup
↓
Provider Dashboard
↓
Create Service
↓
Receive Booking
↓
Accept / Reject
↓
View Customer Contact
↓
Complete Job
```

---

## 📊 Provider Dashboard Metrics

### Total Services

Number of services belonging to the logged-in provider.

### Total Bookings

Number of booking requests received by the provider.

### Completed Jobs

Number of provider bookings with:

```text
status = completed
```

### Recent Bookings

The dashboard displays the latest booking requests so providers can quickly see what needs attention.

---

## ⭐ Reviews & Ratings

### Current Status

Service cards support rating/review display fields such as:

```text
4.8 (24 reviews)
```

For the current MVP, rating values may be manually populated as demo data.

### 🔜 Coming Soon — Review System

A complete review system is planned for a future update.

Planned workflow:

```text
Booking Completed
      ↓
Customer leaves review
      ↓
1–5 star rating
      ↓
Optional written feedback
      ↓
Average rating updated
```

The review feature is **planned for an upcoming update** and is not yet part of the completed core workflow.

---

## 🔒 Security & Authorization

The application follows these principles:

- Authentication required for protected pages
- Role-based authorization
- Provider ownership checks for services and bookings
- `user_id` comes from the authenticated session rather than frontend input
- Booking ownership is checked before showing private booking information
- Provider/customer contact information is restricted until booking acceptance
- CSRF protection for POST requests

---

## 🧠 Important Architecture Decisions

### Provider ≠ Service

One provider can offer multiple services:

```text
Provider
   ├── AC Servicing
   ├── Plumbing
   ├── Electrical Repair
   └── Cleaning
```

### Category belongs to Service

`category_id` is stored on `services` because each service belongs to a category.

```text
Service
   ↓
Category
```

### Provider belongs to User

Provider business/profile information is kept separate from authentication data:

```text
User
   ↓
Provider
```

---

## 📌 Project Status

```text
🟡 MVP / Active Development
```

Core development focus:

```text
Authentication
    ↓
Provider Setup
    ↓
Service Management
    ↓
Service Discovery
    ↓
Search & Filtering
    ↓
Booking
    ↓
Provider Booking Management
    ↓
Booking Completion
```

### Upcoming

```text
⭐ Reviews & Ratings
💬 Messaging / Chat
📅 Scheduling
🔔 Notifications
📍 Advanced Location Search
```

---

## 🔮 Future Improvements

- ⭐ Complete review and rating system
- 💬 User-provider messaging/chat
- 📅 Booking date and time scheduling
- 🔔 Notifications
- ❤️ Favorite services
- 📈 Provider analytics
- 💳 Online payments
- 🛡️ Provider verification
- 📱 Mobile/API support
- 🧑‍💼 Admin dashboard
- 📊 Platform reports and analytics
- ⚡ More dynamic AJAX/Livewire interactions

---

## 👨‍💻 Author

**Mostafizur Rahman**

Laravel Developer

**Taskify — Local Service Finder System**

---

## 📄 License

This project is currently a learning/portfolio development project.

If you publish it as open source, add your chosen license (for example, MIT License).

---

## ⭐ Support the Project

If you find Taskify useful or interesting, consider giving the repository a ⭐ on GitHub.

More features are planned for upcoming updates, including the **Reviews & Ratings system**.
