@extends('layouts.user')

@section('content')
 <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10 mx-auto text-center">
                    <h1>Find Trusted Local Services Near You</h1>
                    <p>Connect with skilled professionals in your area. From home repairs to personal services, we've got you covered.</p>
                    
                    <div class="search-box">
                        <input type="text" placeholder="What service do you need?" class="flex-grow-1">
                        <select class="form-select">
                            <option selected>All Categories</option>
                            <option>Cleaning</option>
                            <option>Plumbing</option>
                            <option>Electrician</option>
                            <option>Carpentry</option>
                            <option>Painting</option>
                            <option>Moving</option>
                            <option>Gardening</option>
                        </select>
                        <button class="btn-search">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Categories Section -->

<section class="categories-section" id="services">
        <div class="container">
            <h2 class="section-title">Popular Categories</h2>
            
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-water"></i>
                        </div>
                        <h3>Cleaning</h3>
                        <p class="category-count">150+ services</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-wrench-adjustable"></i>
                        </div>
                        <h3>Plumbing</h3>
                        <p class="category-count">98+ services</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-lightning-charge-fill"></i>
                        </div>
                        <h3>Electrician</h3>
                        <p class="category-count">120+ services</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-hammer"></i>
                        </div>
                        <h3>Carpentry</h3>
                        <p class="category-count">85+ services</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-paint-bucket"></i>
                        </div>
                        <h3>Painting</h3>
                        <p class="category-count">110+ services</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h3>Moving</h3>
                        <p class="category-count">75+ services</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-tree-fill"></i>
                        </div>
                        <h3>Gardening</h3>
                        <p class="category-count">92+ services</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-tools"></i>
                        </div>
                        <h3>Handyman</h3>
                        <p class="category-count">135+ services</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Featured Services Section -->
   <section class="featured-section">
        <div class="container">
            <h2 class="section-title">Featured Services</h2>
            
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=400&h=300&fit=crop" alt="House Cleaning" class="service-image">
                        <div class="service-body">
                            <h3 class="service-title">Professional House Cleaning</h3>
                            <div class="service-location">
                                <i class="bi bi-geo-alt"></i>
                                <span>New York, NY</span>
                            </div>
                            <div class="service-price">$80/hr</div>
                            <button class="btn-details">View Details</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <img src="https://images.unsplash.com/photo-1607472586893-edb57bdc0e39?w=400&h=300&fit=crop" alt="Plumbing Service" class="service-image">
                        <div class="service-body">
                            <h3 class="service-title">Expert Plumbing Repair</h3>
                            <div class="service-location">
                                <i class="bi bi-geo-alt"></i>
                                <span>Los Angeles, CA</span>
                            </div>
                            <div class="service-price">$120/hr</div>
                            <button class="btn-details">View Details</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <img src="https://images.unsplash.com/photo-1621905251918-48416bd8575a?w=400&h=300&fit=crop" alt="Electrician Service" class="service-image">
                        <div class="service-body">
                            <h3 class="service-title">Licensed Electrician</h3>
                            <div class="service-location">
                                <i class="bi bi-geo-alt"></i>
                                <span>Chicago, IL</span>
                            </div>
                            <div class="service-price">$95/hr</div>
                            <button class="btn-details">View Details</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <img src="https://images.unsplash.com/photo-1597855040071-57071cd49c78?w=400&h=300&fit=crop" alt="Carpentry Service" class="service-image">
                        <div class="service-body">
                            <h3 class="service-title">Custom Carpentry Work</h3>
                            <div class="service-location">
                                <i class="bi bi-geo-alt"></i>
                                <span>Houston, TX</span>
                            </div>
                            <div class="service-price">$85/hr</div>
                            <button class="btn-details">View Details</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?w=400&h=300&fit=crop" alt="Painting Service" class="service-image">
                        <div class="service-body">
                            <h3 class="service-title">Interior Painting Service</h3>
                            <div class="service-location">
                                <i class="bi bi-geo-alt"></i>
                                <span>Phoenix, AZ</span>
                            </div>
                            <div class="service-price">$70/hr</div>
                            <button class="btn-details">View Details</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <img src="https://images.unsplash.com/photo-1558904541-efa843a96f01?w=400&h=300&fit=crop" alt="Garden Maintenance" class="service-image">
                        <div class="service-body">
                            <h3 class="service-title">Garden Maintenance</h3>
                            <div class="service-location">
                                <i class="bi bi-geo-alt"></i>
                                <span>Miami, FL</span>
                            </div>
                            <div class="service-price">$65/hr</div>
                            <button class="btn-details">View Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <div class="container">
            <h2 class="section-title">How It Works</h2>
            
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <h3>Search Service</h3>
                        <p>Browse through hundreds of local services or search for exactly what you need</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-4">
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <h3>Book Service</h3>
                        <p>Choose your preferred service provider, select a time slot, and confirm your booking</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-4">
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <h3>Get Work Done</h3>
                        <p>Sit back and relax while professionals complete the job to your satisfaction</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Are you a service provider?</h2>
                    <p>Join thousands of professionals earning on their own terms. Start offering your services today!</p>
                    <button class="btn-cta">Start Selling</button>
                </div>
            </div>
        </div>
    </section>
@endsection