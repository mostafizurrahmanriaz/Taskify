# Taskify — Local Service Marketplace

> A Laravel-based marketplace designed to solve a simple business problem: making it easier for customers to discover local services while giving service providers a structured way to manage their services and booking requests.

Taskify is a portfolio project focused on **business workflow, role-based access, service discovery, and booking management** — not just CRUD screens.

---

## Why I Built Taskify

Many local service businesses can have two sides of the same problem:

**Customers**
- Struggle to find relevant local services quickly.
- Need a simple way to compare service information.
- Want to know the status of a booking request.

**Service Providers**
- Need a place to publish and manage their services.
- Need to manage incoming booking requests.
- Should not expose customer/contact information before a booking is accepted.
- Need a simple dashboard to track services and jobs.

### The product idea

Taskify connects these two sides through a simple workflow:

```text
Customer
   ↓
Discover a service
   ↓
View service/provider
   ↓
Create booking request
   ↓
Provider reviews request
   ↓
Accept / Reject
   ↓
Accepted → contact information becomes available
   ↓
Service completed
```

The goal is to turn a manual, disconnected process into one manageable web application.

---

## Business Problems Solved

### 1. Difficult service discovery

**Problem:** Customers need to search through local services instead of relying only on informal recommendations.

**Solution:** Taskify provides:
- Service search
- Category filtering
- Paginated listings
- Service detail pages
- Provider information

---

### 2. Unstructured provider management

**Problem:** A service provider needs somewhere to manage multiple services and incoming requests.

**Solution:** Each provider gets a dedicated dashboard where they can:
- Complete their provider profile
- Create services
- Manage services
- Receive booking requests
- Accept or reject requests
- Mark accepted jobs as completed

---

### 3. Unclear booking workflow

**Problem:** A booking request needs a clear lifecycle so both sides know what happens next.

**Solution:** Taskify uses an explicit booking state machine:

```text
pending
   ├──→ accepted → completed
   │
   └──→ rejected
```

This gives the marketplace a predictable workflow for both customers and providers.

---

### 4. Contact information should not be exposed too early

**Problem:** Customer/provider contact information may need to remain private until a request is approved.

**Solution:** Taskify controls contact visibility based on booking status:

```text
Pending   → Hidden
Accepted  → Visible
Rejected  → Hidden
Completed → Remains available
```

This is a business rule implemented at the application level, not just a UI decision.

---

## Core Product Features

### Customer

- Registration and login
- Browse services
- Search by title and description
- Filter by category
- Paginated results
- Preserve search/filter parameters during pagination
- View service details
- View provider information
- Book services
- View personal bookings
- Track booking status

### Provider

- Provider registration
- Automatic login after registration
- Provider setup flow
- Provider dashboard
- Create and manage services
- Optional service image upload
- Receive booking requests
- Accept or reject requests
- View customer information after acceptance
- Mark accepted bookings as completed
- View dashboard statistics and recent bookings

---

## Product Workflow

### Customer Journey

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
Book
   ↓
Track Booking Status
```

### Provider Journey

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
View Customer Contact (after acceptance)
   ↓
Complete Job
```

---

## Main Business Rules

Taskify demonstrates several rules that matter in a real marketplace.

### Role-based access

The application uses a shared `users` table with two roles:

```text
user
provider
```

A provider is still an authenticated user, with additional provider-specific information stored separately.

### Provider ownership

A provider can manage only their own services and booking-related data.

### Booking ownership

Private booking information is shown only when the authenticated user is authorized to access it.

### Contact visibility

Provider/customer contact information becomes available only after the provider accepts the booking.

### Provider location

A provider's address is used as the default service location.

---

## Application Architecture

The core relationships are:

```text
User
 ├── hasOne → Provider
 └── hasMany → Booking

Provider
 ├── belongsTo → User
 ├── hasMany → Service
 └── hasMany → Booking

Service
 ├── belongsTo → Provider
 └── belongsTo → Category

Booking
 ├── belongsTo → User
 ├── belongsTo → Provider
 └── belongsTo → Service
```

### Core data model

```text
users
 ├── id
 ├── name
 ├── email
 ├── password
 └── role

providers
 ├── id
 ├── user_id
 ├── phone
 ├── address
 ├── about
 └── profile_image

categories
 ├── id
 └── name

services
 ├── id
 ├── provider_id
 ├── category_id
 ├── title
 ├── description
 ├── price
 ├── image
 ├── status
 ├── reviews_avg_rating
 └── reviews_count

bookings
 ├── id
 ├── user_id
 ├── provider_id
 ├── service_id
 ├── price
 ├── status
 └── timestamps
```

---

## Example: Search & Discovery

The service listing supports GET-based search and filtering.

Example:

```text
/services?search=Plumbing+Sanitary+Service&category=3&page=2
```

Laravel pagination keeps the active query parameters:

```php
$services = $query
    ->paginate(6)
    ->withQueryString();
```

This means users can move between pages without losing their current search/filter state.

---

## Example: Booking State

A newly created booking starts as:

```text
pending
```

The provider can then:

```text
pending → accepted
pending → rejected
accepted → completed
```

This provides a simple and predictable workflow that can later be extended with notifications, scheduling, payments, or messaging.

---

## Security & Authorization

The application follows these rules:

- Authentication is required for protected pages.
- Access is controlled by user role.
- Provider ownership is checked before managing services/bookings.
- `user_id` is taken from the authenticated session rather than trusting frontend input.
- Booking ownership is checked before private booking information is displayed.
- Contact information is restricted until booking acceptance.
- CSRF protection is used for POST requests.

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel / PHP |
| Frontend | Blade, HTML, CSS |
| UI | Bootstrap 5 where required |
| JavaScript | Vanilla JavaScript |
| Database | MySQL |
| Package Manager | Composer / NPM |
| Version Control | Git / GitHub |

---

## Project Structure

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
```

---

## Run Locally

### 1. Clone

```bash
git clone https://github.com/YOUR-USERNAME/taskify.git
cd taskify
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Configure environment

```bash
cp .env.example .env
```

Windows:

```bash
copy .env.example .env
```

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Configure MySQL

Update `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taskify
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Migrate

```bash
php artisan migrate
```

If seeders are available:

```bash
php artisan db:seed
```

### 7. Create storage link

```bash
php artisan storage:link
```

### 8. Start the application

```bash
php artisan serve
```

Then open:

```text
http://127.0.0.1:8000
```

For frontend development:

```bash
npm run dev
```

---

## Current MVP Scope

The current MVP focuses on:

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

### Planned improvements

These are future features, not completed core features:

- Reviews and ratings
- User/provider messaging
- Booking date and time scheduling
- Notifications
- Favorites
- Provider analytics
- Online payments
- Provider verification
- Mobile/API support
- Admin dashboard
- Platform reporting and analytics
- More dynamic AJAX/Livewire interactions

---

## What This Project Demonstrates

This project demonstrates more than Laravel syntax.

### Product thinking
I translated a real-world marketplace scenario into application workflows and business rules.

### Backend development
- Authentication
- Role-based access
- Eloquent relationships
- Search and filtering
- Pagination
- Booking lifecycle management
- Authorization checks

### Business logic
- Provider/customer role separation
- Booking state transitions
- Ownership rules
- Conditional contact visibility

### Full-stack execution
- Database design
- Laravel backend
- Blade-based frontend
- Responsive marketplace/dashboard UI
- File/image handling

---

## Why This Project Matters in a Portfolio

Taskify represents the type of work I want to do for real businesses:

> **Take a business workflow, translate it into software, and build the rules that make the workflow work.**

The technology is Laravel, PHP, MySQL, Blade, and JavaScript.

The more important part is the ability to turn:

```text
Business Problem
      ↓
Workflow
      ↓
Business Rules
      ↓
Database Design
      ↓
Application Logic
      ↓
Usable Product
```

---

## Project Status

🟡 **MVP / Active Development**

The core marketplace and booking workflow is implemented. Additional marketplace capabilities are planned for future iterations.

---

## Author

**Mostafizur Rahman**

Laravel Developer

**Focus:** Laravel Development • API Development • AI Automation • SaaS

---

## License

This project is currently a learning/portfolio development project.

If published as open source, add a license such as MIT.
