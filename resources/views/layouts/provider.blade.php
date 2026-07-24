<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Dashboard - Taskify</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/provider-dashboard.css">
</head>
<body>
    
    <div class="dashboard-wrapper">
        
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h4 class="sidebar-logo"><span class="logo-task">Task</span><span class="logo-ify">ify</span></h4>
            </div>
            
            <nav class="sidebar-nav">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#dashboard">
                            <i class="bi bi-speedometer2"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#my-services">
                            <i class="bi bi-briefcase"></i>
                            <span>My Services</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#add-service">
                            <i class="bi bi-plus-circle"></i>
                            <span>Add Service</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bookings">
                            <i class="bi bi-calendar-check"></i>
                            <span>Bookings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profile">
                            <i class="bi bi-person"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="nav-item mt-auto">
                        <a class="nav-link" href="#logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            
            <!-- Header -->
            <header class="content-header">
                <h2 class="page-title">Dashboard</h2>
            </header>
            
            <!-- Stats Cards Section -->
            <section class="stats-section">
                <div class="row g-4">
                    
                    <!-- Total Services Card -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="bi bi-briefcase-fill"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number">12</h3>
                                <p class="stat-label">Total Services</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Total Bookings Card -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="bi bi-calendar-check-fill"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number">25</h3>
                                <p class="stat-label">Total Bookings</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Completed Card -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number">15</h3>
                                <p class="stat-label">Completed</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
            
            <!-- Recent Bookings Section -->
            <section class="bookings-section">
                <div class="bookings-card">
                    
                    <div class="bookings-header">
                        <h4 class="bookings-title">Recent Bookings</h4>
                    </div>
                    
                    <div class="bookings-list">
                        
                        <!-- Booking Item 1 -->
                        <div class="booking-item">
                            <div class="booking-info">
                                <h5 class="booking-service">Plumbing Repair</h5>
                                <p class="booking-date">
                                    <i class="bi bi-calendar3"></i>
                                    May 12, 2026
                                </p>
                            </div>
                            <div class="booking-status">
                                <span class="badge status-pending">Pending</span>
                            </div>
                        </div>
                        
                        <!-- Booking Item 2 -->
                        <div class="booking-item">
                            <div class="booking-info">
                                <h5 class="booking-service">Electrical Installation</h5>
                                <p class="booking-date">
                                    <i class="bi bi-calendar3"></i>
                                    May 10, 2026
                                </p>
                            </div>
                            <div class="booking-status">
                                <span class="badge status-accepted">Accepted</span>
                            </div>
                        </div>
                        
                        <!-- Booking Item 3 -->
                        <div class="booking-item">
                            <div class="booking-info">
                                <h5 class="booking-service">AC Maintenance</h5>
                                <p class="booking-date">
                                    <i class="bi bi-calendar3"></i>
                                    May 8, 2026
                                </p>
                            </div>
                            <div class="booking-status">
                                <span class="badge status-completed">Completed</span>
                            </div>
                        </div>
                        
                        <!-- Booking Item 4 -->
                        <div class="booking-item">
                            <div class="booking-info">
                                <h5 class="booking-service">Home Cleaning</h5>
                                <p class="booking-date">
                                    <i class="bi bi-calendar3"></i>
                                    May 5, 2026
                                </p>
                            </div>
                            <div class="booking-status">
                                <span class="badge status-completed">Completed</span>
                            </div>
                        </div>
                        
                        <!-- Booking Item 5 -->
                        <div class="booking-item">
                            <div class="booking-info">
                                <h5 class="booking-service">Carpentry Work</h5>
                                <p class="booking-date">
                                    <i class="bi bi-calendar3"></i>
                                    May 3, 2026
                                </p>
                            </div>
                            <div class="booking-status">
                                <span class="badge status-accepted">Accepted</span>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="bookings-footer">
                        <a href="#all-bookings" class="btn btn-primary-custom">
                            View All Bookings
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    
                </div>
            </section>
            
        </main>
        
    </div>
    
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
