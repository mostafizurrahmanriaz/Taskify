@extends('layouts.user')

@section('content')
<div class="container py-4 py-md-5">

  <!-- Page header -->
  <div class="mb-4">
    <h1 class="page-title h3 mb-1">My Bookings</h1>
    <p class="page-subtitle mb-0">Track and manage all your service bookings in one place.</p>
  </div>

  <!-- Filters -->
  <div class="filter-pills d-flex flex-wrap gap-2 mb-4">
    <button class="btn active" data-filter="all">All</button>
    <button class="btn" data-filter="pending">Pending</button>
    <button class="btn" data-filter="accepted">Accepted</button>
    <button class="btn" data-filter="rejected">Rejected</button>
  </div>

  <!-- Bookings list -->
  @if($booking__list->isNotEmpty())
  <div class="d-flex flex-column gap-3" id="bookingsList">
    @foreach ($booking__list as $booking)
    <div class="booking-card" data-status="{{ $booking->status }}">
      <img src="{{ asset('/storage/images/service/'. $booking->service->image) }}" class="booking-img" alt="{{ $booking->service->title }}">
      <div class="booking-body">
        <div>
          <div class="service-title">{{ $booking->service->title }}</div>
          <div class="meta-line"><i class="bi bi-person"></i>{{ $booking->provider->user->name }}</div>
          <div class="meta-line"><i class="bi bi-calendar3"></i> {{$booking->created_at->format('M d, Y · h:i A') }}</div>
        </div>
        <div class="booking-side">
          <div class="price">৳ {{ $booking->service->price }}</div>
          <span class="status-badge status-{{ $booking->status }}">{{ $booking->status }}</span>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @else

  <!-- Empty state (hidden by default) -->
  <div  class="text-center py-5">
    <i class="bi bi-calendar-x" style="font-size: 2rem; color: #C7CBD1;"></i>
    <p class="text-muted mt-2 mb-0">No bookings found for this filter.</p>
  </div>

   @endif

</div>

@endsection

@push('style')
    <style>
  :root {
    --primary: #FF6B6B;
    --primary-dark: #E85A5A;
    --primary-tint: #FFF0F0;
    --ink: #1F2933;
    --muted: #6B7280;
    --bg: #F7F7F9;
    --card-border: #EEEEF1;
  }



  /* Top bar */
  .topbar {
    background: #ffffff;
    border-bottom: 1px solid var(--card-border);
  }
  .brand {
    font-weight: 700;
    font-size: 1.15rem;
    color: var(--ink);
  }
  .brand span { color: var(--primary); }
  .user-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--primary-tint);
    color: var(--primary-dark);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: .85rem;
  }

  /* Page header */
  .page-title { font-weight: 700; letter-spacing: -0.02em; }
  .page-subtitle { color: var(--muted); font-size: .95rem; }

  /* Filter pills */
  .filter-pills .btn {
    border-radius: 50px;
    font-size: .85rem;
    font-weight: 500;
    padding: .4rem 1rem;
    border: 1px solid var(--card-border);
    background: #fff;
    color: var(--muted);
  }
  .filter-pills .btn.active {
    background: var(--primary);
    border-color: var(--primary);
    color: #fff;
  }

  /* Booking card */
  .booking-card {
    background: #fff;
    border: 1px solid var(--card-border);
    border-radius: 14px;
    overflow: hidden;
    display: flex;
    transition: box-shadow .15s ease, transform .15s ease;
  }
  .booking-card:hover {
    box-shadow: 0 6px 20px rgba(31, 41, 51, 0.07);
    transform: translateY(-1px);
  }

  .booking-img {
    width: 150px;
    min-width: 150px;
    height: auto;
    object-fit: cover;
  }

  .booking-body {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding: 1.1rem 1.25rem;
    flex-wrap: wrap;
  }

  .service-title {
    font-weight: 600;
    font-size: 1.02rem;
    margin-bottom: .35rem;
  }

  .meta-line {
    font-size: .85rem;
    color: var(--muted);
    display: flex;
    align-items: center;
    gap: .35rem;
    margin-bottom: .2rem;
  }
  .meta-line i { font-size: .85rem; color: #9CA3AF; }

  .booking-side {
    text-align: right;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: .5rem;
    min-width: 110px;
  }

  .price {
    font-weight: 700;
    font-size: 1.05rem;
    color: var(--primary-dark);
  }

  /* Status badges */
  .status-badge {
    font-size: .75rem;
    font-weight: 600;
    padding: .35rem .7rem;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    gap: .3rem;
  }
  .status-badge::before {
    content: "";
    width: 6px;
    height: 6px;
    border-radius: 50%;
  }
  .status-pending {
    background: #FEF3C7;
    color: #B45309;
  }
  .status-pending::before { background: #B45309; }

  .status-accepted {
    background: #DCFCE7;
    color: #15803D;
  }
  .status-accepted::before { background: #15803D; }

  .status-rejected {
    background: #FEE2E2;
    color: #DC2626;
  }
  .status-rejected::before { background: #DC2626; }

  /* Responsive: stack on mobile */
  @media (max-width: 576px) {
    .booking-card { flex-direction: column; }
    .booking-img { width: 100%; height: 160px; }
    .booking-body { flex-direction: column; align-items: flex-start; }
    .booking-side { align-items: flex-start; flex-direction: row; justify-content: space-between; width: 100%; }
  }
</style>
@endpush

@push('scripts')
<script>
  const filterButtons = document.querySelectorAll('.filter-pills .btn');
  const cards = document.querySelectorAll('.booking-card');
  // const emptyState = document.getElementById('emptyState');
 
  filterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      filterButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
 
      const filter = btn.dataset.filter;
      let visibleCount = 0;
 
      cards.forEach(card => {
        const match = filter === 'all' || card.dataset.status === filter;
        card.style.display = match ? 'flex' : 'none';
        if (match) visibleCount++;
      });
 
    //  emptyState.classList.toggle('d-none', visibleCount !== 0);
    });
  });
</script>
@endpush 