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
    @foreach ($services as $service)
    <div class="col-lg-4 col-md-6">
        <div class="service-card">
            <img src="{{ asset('/storage/images/service/'.$service->image) }}" alt="{{ $service->title }}" class="service-image">
            <div class="service-body">
                <h3 class="service-title">{{ $service->title }}</h3>
                <div class="service-location">
                    <i class="bi bi-geo-alt"></i>
                    <span>{{ $service->provider->district }}</span>
                </div>

                <div class="service-rating">
                    @php
                        $avg = $service->reviews_avg_rating ?? 0;
                        $full = floor($avg);
                        $half = ($avg - $full) >= 0.5;
                    @endphp
                    <div class="stars">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $full)
                                <i class="bi bi-star-fill"></i>
                            @elseif ($half && $i == $full + 1)
                                <i class="bi bi-star-half"></i>
                            @else
                                <i class="bi bi-star"></i>
                            @endif
                        @endfor
                    </div>
                    @if ($service->reviews_count > 0)
                        <span class="rating-score">{{ number_format($avg, 1) }}</span>
                        <span class="rating-count">({{ $service->reviews_count }})</span>
                    @else
                        <span class="rating-count">No reviews yet</span>
                    @endif
                </div>

                <div class="service-price">৳ {{ $service->price }}</div>
                <button class="btn-details" onclick="window.location.href='/user/service-details/{{ $service->id }}'">View Details</button>
            </div>
        </div>
    </div>
    @endforeach
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

@push('style')
    <style>
        .service-rating {
    display: flex;
    align-items: center;
    gap: 6px;
    margin: 4px 0 10px;
}
.service-rating .stars {
    color: #f0997b;
    font-size: 14px;
    display: flex;
    gap: 2px;
}
.service-rating .rating-score {
    font-size: 13px;
    font-weight: 600;
    color: #1e293b;
}
.service-rating .rating-count {
    font-size: 12px;
    color: #6b7280;
}
    </style>
@endpush