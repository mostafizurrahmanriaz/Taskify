<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Taskify - Find Trusted Local Services Near You</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/style.css">
    @stack('style')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><span>Task</span>ify</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-4">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    @if (Auth::check())
                        <a class="nav-link" href="{{ route('booking.history') }}">My Bookings</a>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signUp') }}">Become a Pro</a>
                    </li>
                    @endif
                </ul>
                
                <div class="d-flex gap-2">
                    @if (Auth::check())
                    <a href="{{ route('logout') }}" style="color: #343a40"><button class="btn btn-register">Logout</button></a> 
                    @else
                    <a href="{{ route('login') }}" style="color: #343a40"><button class="btn btn-register">Login</button></a> 
                    <a href="{{ route('signUp') }}" style="color: #343a40"><button class="btn btn-register">Register</button></a> 
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!--  dynamic content will appear here -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="navbar-brand"><span style="color: var(--primary-coral);">Task</span>ify</h5>
                    <p style="color: rgba(255, 255, 255, 0.7);">
                        Connecting people with trusted local service providers. Quality services at your fingertips.
                    </p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Company</h5>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Services</h5>
                    <ul class="footer-links">
                        <li><a href="#">Browse Services</a></li>
                        <li><a href="#">Top Rated</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Pricing</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Support</h5>
                    <ul class="footer-links">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Safety</a></li>
                        <li><a href="#">Terms</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Providers</h5>
                    <ul class="footer-links">
                        <li><a href="#">Become a Pro</a></li>
                        <li><a href="#">Pro Resources</a></li>
                        <li><a href="#">Success Stories</a></li>
                        <li><a href="#">Partner</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2026 Taskify. All rights reserved. Designed with ❤️ for local communities.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

</body>
</html>