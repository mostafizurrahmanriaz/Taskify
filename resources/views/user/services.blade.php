@extends('layouts.user')


@section('content')

<!-- ============================================================
     MAIN SECTION
============================================================ -->
<div class="container py-4 py-lg-5">

  <div class="page-heading mb-4">
    <h1>All Services</h1>
    <p class="mb-0">Browse trusted home service providers near you.</p>
  </div>

  <!-- Mobile-only filter toggle (sidebar becomes a slide-in panel below lg) -->
  <button class="btn btn-outline-dark d-lg-none mb-3" type="button"
          data-bs-toggle="offcanvas" data-bs-target="#filterSidebar" aria-controls="filterSidebar">
    <i class="bi bi-sliders"></i> Filters
  </button>

  <div class="row g-4">

    <!-- ============ LEFT SIDEBAR (col-lg-3) ============ -->
    <div class="col-lg-3">
      <div class="offcanvas-lg offcanvas-start" tabindex="-1" id="filterSidebar" aria-labelledby="filterSidebarLabel">

        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="filterSidebarLabel">Filters</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#filterSidebar" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body d-block">
          <div class="filter-card">

            <!-- Accepting new customers toggle -->
            <div class="form-check form-switch mb-1">
              <input class="form-check-input" type="checkbox" role="switch" id="acceptingNew" checked>
              <label class="form-check-label fw-semibold" for="acceptingNew">Accepting new customers</label>
            </div>

            <hr>

            <!-- Categories -->
            <p class="filter-heading">Categories</p>
            <form method="GET" action="{{ route('services.search') }}">

            <div class="form-check">
              <input class="form-check-input" type="radio" value="" name="category"  onchange="this.form.submit()" id="catAll" @if(!request('category')) checked @endif>
              <label class="form-check-label" for="catAll">All Categories</label>
              {{-- <label class="form-check-label" for="catAll">All Categories <span class="text-muted">(24)</span></label> --}}
            </div>
            @foreach ($categories as $category)
            <div class="form-check">
              <input class="form-check-input" type="radio" name="category" value="{{ $category->id }}" id="{{ $category->id }}" onchange="this.form.submit()" {{ request('category') == $category->id ? 'checked': '' }} />
              <label class="form-check-label" for="{{ $category->name }}">{{ $category->name }}</label>
            </div>     
            @endforeach
            </form>

            <hr>

            <!-- Price Range -->
            <p class="filter-heading">Price Range</p>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="price1">
              <label class="form-check-label" for="price1">Under ৳500</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="price2" checked>
              <label class="form-check-label" for="price2">৳500 – ৳1,000</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="price3">
              <label class="form-check-label" for="price3">৳1,000 – ৳2,000</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="price4">
              <label class="form-check-label" for="price4">৳2,000+</label>
            </div>

            <hr>

            <!-- Location -->
            <p class="filter-heading">Location</p>
            <select class="form-select mb-4" id="locationFilter">
              <option selected>All Locations</option>
              <option>Gulshan</option>
              <option>Dhanmondi</option>
              <option>Uttara</option>
              <option>Mirpur</option>
              <option>Banani</option>
              <option>Motijheel</option>
              <option>Mohammadpur</option>
              <option>Bashundhara</option>
            </select>

            <button type="button" class="btn btn-outline-secondary w-100 rounded-pill" id="clearFiltersBtn">
              Clear All Filters
            </button>

          </div>
        </div>
      </div>
    </div>

    <!-- ============ RIGHT CONTENT (col-lg-9) ============ -->
    <div class="col-lg-9">

      <!-- Top bar: search + sort -->
      <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between mb-3">
        <form method="GET" action="{{ route('services.search') }}" style="width: 100%;">
        <div class="search-box flex-grow-1" style="min-width:220px;">
         <button class="btn border-0 bg-transparent p-0 shadow-none"> <i  class="bi bi-search"></i></button>
          <input type="search" class="form-control" id="search_input" name="search" value="{{ request('search') }}" placeholder="Search services...">
        </div>
        </form>
        <select class="form-select sort-select" id="sortSelect" aria-label="Sort services">
          <option>Highest Ratings</option>
          <option>Most Booked</option>
          <option>Newest</option>
        </select>
      </div>

      <!-- Active filters -->
      <div class="d-flex flex-wrap align-items-center gap-2 mb-3" id="activeFilters">
        <span class="filter-tag">Price: ৳500 – ৳1,000 <button type="button" aria-label="Remove filter" onclick="this.closest('.filter-tag').remove()">×</button></span>
        <span class="filter-tag">Accepting new customers <button type="button" aria-label="Remove filter" onclick="this.closest('.filter-tag').remove()">×</button></span>
        <a class="clear-all-link" id="clearAllLink">Clear all</a>
      </div>

         
      <!-- Service grid: 3 desktop / 2 tablet / 1 mobile -->
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="serviceGrid">

        <!-- Page  -->

        @forelse ($services as $service)
        <div class="col">
          <div class="card service-card h-100">
            <div class="service-card-img-wrap">
              <img src="{{ asset('/storage/images/service/'.$service->image) }}" alt="Technician servicing an air conditioning unit">
            </div>
            <div class="card-body">
              <h3 class="service-title">{{ $service->title }}</h3>
              <p class="service-location"><i class="bi bi-geo-alt-fill"></i> {{ $service->provider->user->name }}</p>
              <div class="service-rating">
                <span class="stars">★★★★☆</span>
                <span class="rating-text">({{ $service->reviews_avg_rating }})</span>
              </div>
              <p class="service-price">৳{{ $service->price }}</p>
              <a href="{{ route('services.details', $service->id) }}" class="btn-view-details">View Details</a>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center py-5" style="margin:auto">
        <i class="bi bi-search" style="font-size:40px; color:#ccc;"></i>
        
        <h4 class="mt-3">No services found</h4>

        <p class="text-muted">
            Try searching with different keywords or category
        </p>

        <a href="{{ route('services.search') }}" class="btn btn-outline-danger mt-2">
            Reset Search
        </a>
      </div>
        @endforelse

      <!-- Empty state — hidden by default; shown only when a filter yields zero matches -->
      {{-- <div class="empty-state text-center py-5 d-none" id="emptyState">
        <i class="bi bi-emoji-frown display-4"></i>
        <h5 class="mt-3 mb-1">No services found</h5>
        <p class="text-muted mb-3">Try adjusting your filters or search terms.</p>
        <button type="button" class="btn btn-outline-dark rounded-pill">Reset Filters</button>
      </div> --}}

      </div>
      <!-- /#serviceGrid -->

                  <!-- Pagination -->
    <br>
        {{ $services->links() }}




    </div>
  </div>
</div>

@endsection

@push('style')
<style>
  :root{
    --brand: #FF6B6B;
    --brand-dark: #e8534f;
    --dark: #0f172a;
    --dark-hover: #1e293b;
    --muted: #64748b;
    --star: #f59e0b;
    --border-soft: #eef0f3;
  }



  .btn-brand{
    background: var(--brand);
    border: none;
    color: #fff;
    font-weight: 600;
    border-radius: 50px;
    padding: .5rem 1.25rem;
  }
  .btn-brand:hover{ background: var(--brand-dark); color: #fff; }

  /* =========================================================
     PAGE HEADING
  ========================================================= */
  .page-heading h1{ font-weight: 800; font-size: 1.75rem; }
  .page-heading p{ color: var(--muted); }

  /* =========================================================
     SIDEBAR FILTER
  ========================================================= */
  .filter-card{
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(15,23,42,.06);
    padding: 1.5rem;
  }
  .filter-heading{
    font-size: .78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .04em;
    color: var(--muted);
    margin-bottom: .75rem;
  }
  .filter-card hr{ margin: 1.25rem 0; border-color: var(--border-soft); }
  .form-check{ margin-bottom: .55rem; }
  .form-check-input:checked{ background-color: var(--dark); border-color: var(--dark); }
  .form-check-input:focus{ box-shadow: 0 0 0 .2rem rgba(15,23,42,.15); }
  .form-switch .form-check-input:checked{ background-color: var(--brand); border-color: var(--brand); }
  .form-check-label{ color: var(--dark); font-size: .92rem; }
  .form-check-label .text-muted{ font-size: .82rem; }

  #filterSidebar .offcanvas-header{ border-bottom: 1px solid var(--border-soft); }

  /* =========================================================
     TOP BAR — search + sort
  ========================================================= */
  .search-box{ position: relative; box-shadow: none; }
  .search-box i{
    position: absolute;
    left: 32px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--muted);
  }
  .search-box .form-control{
    padding-left: 49px;
    border-radius: 50px;
    border: 1px solid #e2e5ea;
  }
  .search-box .form-control:focus{
    border-color: var(--brand);
    box-shadow: 0 0 0 .2rem rgba(255,107,107,.15);
  }
  .sort-select{
    border-radius: 50px;
    border: 1px solid #e2e5ea;
    min-width: 190px;
  }

  /* =========================================================
     ACTIVE FILTER TAGS
  ========================================================= */
  .filter-tag{
    display: inline-flex;
    align-items: center;
    gap: .4rem;
    background: #fff1f1;
    color: var(--brand-dark);
    border: 1px solid #ffd7d7;
    border-radius: 50px;
    padding: .3rem .8rem;
    font-size: .8rem;
    font-weight: 600;
  }
  .filter-tag button{
    background: none;
    border: none;
    color: var(--brand-dark);
    font-weight: 700;
    line-height: 1;
    padding: 0;
    cursor: pointer;
    font-size: .95rem;
  }
  .clear-all-link{
    font-size: .85rem;
    color: var(--muted);
    text-decoration: underline;
    cursor: pointer;
  }
  .clear-all-link:hover{ color: var(--dark); }

  /* =========================================================
     SERVICE CARD — matches "Featured Services" homepage style
     + modern hover interaction (lift, scale, shadow, image zoom)
  ========================================================= */
  .service-card{
    border: 2px solid transparent;
    border-radius: 15px;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 4px 16px rgba(15,23,42,.07);
    transition: all 0.3s ease;
  }
  .service-card:hover{
    border-color: var(--brand);
    transform: translateY(-5px) scale(1.03);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
  }


  .service-card-img-wrap{
    height: 200px;
    overflow: hidden;
  }
  .service-card-img-wrap img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
  }
  .service-card:hover .service-card-img-wrap img{
    transform: scale(1.05);
  }

  .service-card .card-body{
    display: flex;
    flex-direction: column;
    padding: 1.25rem;
  }
  .service-title{
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: .35rem;
  }
  .service-location{
    font-size: .85rem;
    color: var(--muted);
    display: flex;
    align-items: center;
    gap: .3rem;
    margin-bottom: .5rem;
  }
  .service-location i{ color: var(--brand); }
  .service-rating{
    display: flex;
    align-items: center;
    gap: .4rem;
    margin-bottom: .6rem;
  }
  .service-rating .stars{ color: var(--star); font-size: .85rem; letter-spacing: 1px; }
  .service-rating .stars.no-rating{ color: #dcdfe4; }
  .service-rating .rating-text{ font-size: .8rem; color: var(--muted); }
  .service-price{
    font-size: 1.4rem;
    font-weight: 800;
    color: var(--brand);
    margin-bottom: 1rem;
  }
  .service-price small{ font-size: .75rem; font-weight: 500; color: var(--muted); }

  /* =========================================================
     VIEW DETAILS BUTTON — default dark, hover flips to brand
  ========================================================= */
  .btn-view-details{
    margin-top: auto;
    width: 100%;
    background: var(--dark);
    color: #fff;
    border: none;
    border-radius: 50px;
    padding: .65rem 1rem;
    font-weight: 600;
    font-size: .92rem;
    text-align: center;
    text-decoration: none;
    transition: all 0.3s ease;
  }
  .btn-view-details:hover{
    background: var(--brand);
    color: #fff;
    transform: scale(1.02);
  }

  /* =========================================================
     EMPTY STATE
  ========================================================= */
  .empty-state{
    background: #fff;
    border: 1px dashed #dfe3e8;
    border-radius: 16px;
  }
  .empty-state i{ color: #cbd2d9; }

  /* =========================================================
     PAGINATION — custom classes (not Bootstrap's .pagination,
     so nothing needs fighting Bootstrap's default styles)
  ========================================================= */
  .pg-list{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: .6rem;
    margin: 0;
    padding: 0;
    list-style: none;
  }
  .pg-btn{
    min-width: 42px;
    height: 42px;
    padding: 0 .5rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ddd;
    border-radius: 10px;
    background: #fff;
    color: var(--dark);
    font-weight: 600;
    font-size: .95rem;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  .pg-btn:hover{
    background-color: #ffe5e5;
    border-color: #ffe5e5;
    color: var(--dark);
  }
  .pg-btn.active{
    background-color: var(--brand);
    border-color: var(--brand);
    color: #fff;
  }
  .pg-btn:disabled{
    opacity: .4;
    cursor: not-allowed;
    background: #fff;
  }
  .pg-btn:disabled:hover{ background: #fff; border-color: #ddd; }
  .pg-btn:focus-visible{
    outline: 3px solid var(--dark);
    outline-offset: 2px;
  }

  @media (max-width: 991.98px){
    .filter-card{ box-shadow: none; padding: 0; }
  }
</style>
@endpush

@push('scripts')
  <script>
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    document.querySelector('#search_icon').addEventListener('click', function(){
      this.form.submit();
    })
  </script>
@endpush

