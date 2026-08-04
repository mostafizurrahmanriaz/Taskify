@extends('layouts.user')


@push('style')

<style>
  :root {
    --primary: #FF6B6B;
    --primary-dark: #ee5a5a;
    --primary-soft: #fff0f0;
    --bg: #f8f9fa;
    --text-dark: #222b3a;
    --text-muted: #7b8494;
    --radius: 16px;
  }



  .page-wrap {
    max-width: 760px;
    margin: 0 auto;
    padding: 28px 16px 60px;
  }

  /* Header */
  .back-btn {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    background: #ffffff;
    border: 1px solid #eceef1;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-dark);
    box-shadow: 0 2px 8px rgba(20, 20, 43, 0.05);
    transition: all 0.2s ease;
    flex-shrink: 0;
  }
  .back-btn:hover {
    background: var(--primary);
    color: #fff;
    border-color: var(--primary);
    transform: translateX(-2px);
  }

  .page-title {
    font-weight: 800;
    font-size: 1.6rem;
    letter-spacing: -0.02em;
    margin-bottom: 2px;
  }

  .page-subtext {
    color: var(--text-muted);
    font-size: 0.92rem;
    margin: 0;
  }

  /* Card base */
  .card-soft {
    background: #ffffff;
    border: none;
    border-radius: var(--radius);
    box-shadow: 0 4px 18px rgba(20, 20, 43, 0.06);
    transition: box-shadow 0.25s ease, transform 0.25s ease;
    margin-bottom: 22px;
    overflow: hidden;
  }
  .card-soft:hover {
    box-shadow: 0 10px 28px rgba(20, 20, 43, 0.10);
    transform: translateY(-2px);
  }
  .card-soft .card-body { padding: 26px; }

  .card-eyebrow {
    text-transform: uppercase;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    color: var(--primary);
    margin-bottom: 14px;
  }

  /* Booking info card */
  .service-name {
    font-weight: 800;
    font-size: 1.35rem;
    margin-bottom: 2px;
  }
  .service-category {
    color: var(--text-muted);
    font-size: 0.85rem;
    margin-bottom: 14px;
  }
  .meta-row {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--text-dark);
    font-size: 0.92rem;
  }
  .meta-row i { color: var(--primary); font-size: 1rem; }

  .price-tag {
    font-weight: 800;
    font-size: 1.4rem;
    color: var(--text-dark);
    white-space: nowrap;
  }
  .price-label {
    font-size: 0.75rem;
    color: var(--text-muted);
    font-weight: 500;
  }

  /* Status badges */
  .status-badge {
    font-weight: 600;
    font-size: 0.78rem;
    padding: 7px 14px;
    border-radius: 30px;
    letter-spacing: 0.02em;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }
  .status-badge i { font-size: 0.7rem; }
  .status-pending   { background: #fff4d6; color: #a8720a; }
  .status-accepted  { background: #dcf6e6; color: #1a8a4c; }
  .status-rejected  { background: #fde3e3; color: #c92f2f; }
  .status-completed { background: #e1ebff; color: #2452c9; }

  /* Provider card */
  .avatar-circle {
    width: 58px;
    height: 58px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: #fff;
    font-weight: 700;
    font-size: 1.15rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(255, 107, 107, 0.35);
  }
  .provider-name {
    font-weight: 700;
    font-size: 1.08rem;
    margin-bottom: 2px;
  }
  .provider-role {
    color: var(--text-muted);
    font-size: 0.82rem;
  }

  .contact-info-row {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.9rem;
    color: var(--text-dark);
    padding: 10px 0;
    border-bottom: 1px solid #f1f2f5;
  }
  .contact-info-row:last-of-type { border-bottom: none; }
  .contact-info-row i {
    width: 30px;
    height: 30px;
    border-radius: 8px;
    background: var(--primary-soft);
    color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    flex-shrink: 0;
  }

  .contact-locked {
    filter: blur(4px);
    user-select: none;
    pointer-events: none;
  }
  .contact-locked-wrap { position: relative; }
  .locked-overlay {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background: rgba(255, 255, 255, 0.55);
    border-radius: 12px;
    padding: 16px;
  }
  .locked-message {
    background: #fff;
    border: 1px dashed #e3b8b8;
    border-radius: 12px;
    padding: 14px 18px;
    font-size: 0.85rem;
    color: var(--text-muted);
    max-width: 300px;
  }
  .locked-message i { color: var(--primary); font-size: 1.2rem; display: block; margin-bottom: 6px; }

  .btn-primary-soft {
    background: var(--primary);
    border: none;
    color: #fff;
    font-weight: 600;
    font-size: 0.88rem;
    border-radius: 10px;
    padding: 9px 16px;
    transition: all 0.2s ease;
  }
  .btn-primary-soft:hover { background: var(--primary-dark); color: #fff; }

  .btn-outline-soft {
    background: #fff;
    border: 1px solid #e3e6ea;
    color: var(--text-dark);
    font-weight: 600;
    font-size: 0.88rem;
    border-radius: 10px;
    padding: 9px 16px;
    transition: all 0.2s ease;
  }
  .btn-outline-soft:hover { border-color: var(--primary); color: var(--primary); }

  /* Service details card */
  .service-thumb {
    width: 100%;
    height: 170px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 16px;
  }
  .service-desc {
    color: var(--text-muted);
    font-size: 0.92rem;
    line-height: 1.6;
  }

  /* Action section */
  .action-card {
    text-align: center;
    padding: 8px 0 0;
  }
  #markCompletedBtn {
    padding: 12px 32px;
    font-size: 0.95rem;
    border-radius: 12px;
  }
  #markCompletedBtn:disabled {
    background: #d9dde3;
    border-color: #d9dde3;
    color: #8a919c;
  }

  .completed-badge {
    background: #e1ebff;
    color: #2452c9;
    font-weight: 700;
    font-size: 0.95rem;
    padding: 12px 24px;
    border-radius: 12px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }

  @media (max-width: 576px) {
    .price-block { text-align: left !important; margin-top: 12px; }
    .booking-top-row { flex-direction: column; }
  }
</style>
@endpush

@section('content')
<div class="page-wrap">

  <!-- 1. Header -->
  <div class="d-flex align-items-start gap-3 mb-4">
    <div>
      <h1 class="page-title">Booking Details</h1>
      <p class="page-subtext">Track your booking and contact provider</p>
    </div>
  </div>

  <!-- 2. Booking Info Card -->
  <div class="card card-soft">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-start booking-top-row flex-wrap">
        <div>
          <div class="service-name">{{ $booking->service->title }}</div>
          <div class="service-category">{{ $category->name }}</div>
          <div class="meta-row mb-1">
            <i class="bi bi-calendar-event"></i>
            <span>{{ $booking->created_at->format('M j, Y') }}</span>
            <i class="bi bi-clock ms-2"></i>
            <span>{{ $booking->created_at->format('h:i A ')  }}</span>
          </div>
          <span id="statusBadge" class="status-badge status-accepted mt-2">
            <i class="bi bi-check-circle-fill"></i> Accepted
          </span>
        </div>
        <div class="text-end price-block">
          <div class="price-label">Total Price</div>
          <div class="price-tag">৳{{ $booking->service->price }}</div>
        </div>
      </div>
    </div>
  </div>

  <!-- 3. Provider Info Card -->
  <div class="card card-soft">
    <div class="card-body">
      <div class="card-eyebrow">Service Provider</div>
      <div class="d-flex align-items-center gap-3 mb-3">
        <div class="avatar-circle">{{ substr($provider->name, 0, 1) }}</div>
        <div>
          <div class="provider-name">Arif</div>
          <div class="provider-role">{{ substr($booking->provider->bio, 0, 50) }}</div>
        </div>
      </div>

      <!-- Contact info -->
      <div id="contactSection">
        <div class="contact-info-row">
          <i class="bi bi-envelope-fill"></i>
          <span>{{ $provider->email }}</span>
        </div>
        <div class="contact-info-row">
          <i class="bi bi-telephone-fill"></i>
           <span>{{ $provider->number }}</span>
        </div>
        <div class="d-flex gap-2 mt-3">
          <a href="tel:+880123456789" class="btn btn-outline-soft flex-fill">
            <i class="bi bi-telephone me-1"></i> Call
          </a>
          <a href="mailto:arif@gmail.com" class="btn btn-primary-soft flex-fill">
            <i class="bi bi-envelope me-1"></i> Email
          </a>
        </div>
      </div>

      <!-- Locked state (hidden by default since status = accepted) -->
      <div id="lockedSection" class="contact-locked-wrap d-none">
        <div class="contact-locked">
          <div class="contact-info-row">
            <i class="bi bi-envelope-fill"></i>
            <span>hidden@email.com</span>
          </div>
          <div class="contact-info-row">
            <i class="bi bi-telephone-fill"></i>
            <span>+880 000000000</span>
          </div>
        </div>
        <div class="locked-overlay">
          <div class="locked-message">
            <i class="bi bi-lock-fill"></i>
            Contact will be available after provider accepts your booking
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 4. Service Details Card -->
  <div class="card card-soft">
    <div class="card-body">
      <div class="card-eyebrow">Service Details</div>
      <img src="{{ asset('/storage/images/service/'. $booking->service->image) }}"
           alt="AC Servicing" class="service-thumb">
      <div class="service-name mb-1" style="font-size:1.1rem;">{{ $booking->service->title }}</div>
      <p class="service-desc mb-2">
       {{ $booking->service->description }}
      </p>
      <div class="price-tag" style="font-size:1.15rem;">৳{{ $booking->service->price }}</div>
    </div>
  </div>

  <!-- 5. Action Section -->
  {{-- <div class="card card-soft">
    <div class="card-body action-card">
      <div id="actionArea">
        <button id="markCompletedBtn" class="btn btn-primary-soft">
          <i class="bi bi-check2-circle me-1"></i>{{ ucfirst($booking->status) }}
        </button>
      </div>
    </div>
  </div>

  <!-- Success alert (hidden until action) -->
  <div id="successAlert" class="alert alert-success d-none mt-3" role="alert">
    <i class="bi bi-check-circle-fill me-2"></i>
    Booking marked as completed successfully!
  </div> --}}

</div>
@endsection

@push('scripts')
<script>
  // ---- Dummy static data / initial state ----
  let bookingStatus = "accepted"; // pending | accepted | rejected | completed

  const markBtn = document.getElementById('markCompletedBtn');
  const statusBadge = document.getElementById('statusBadge');
  const successAlert = document.getElementById('successAlert');
  const actionArea = document.getElementById('actionArea');

  markBtn.addEventListener('click', function () {
    if (bookingStatus !== 'accepted') return;

    bookingStatus = 'completed';

    // Update badge -> blue / primary "Completed"
    statusBadge.className = 'status-badge status-completed mt-2';
    statusBadge.innerHTML = '<i class="bi bi-check-circle-fill"></i> Completed';

    // Disable button
    markBtn.disabled = true;
    markBtn.innerHTML = '<i class="bi bi-check2-circle me-1"></i> Mark as Completed';

    // Replace action area with completed badge
    actionArea.innerHTML = `
      <span class="completed-badge">
        <i class="bi bi-patch-check-fill"></i> Completed Successfully
      </span>
    `;

    // Show success alert
    successAlert.classList.remove('d-none');
    successAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

    // Auto-hide alert after a few seconds
    setTimeout(() => {
      successAlert.classList.add('d-none');
    }, 4000);
  });
</script>
@endpush

</body>
</html>