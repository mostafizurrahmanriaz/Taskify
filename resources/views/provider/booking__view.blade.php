@extends('layouts.provider')


@section('content')

  <header class="header">
    <div class="header-inner">

      <div class="header-titles">
        <h1>Booking Details</h1>
        <p class="header-sub">Booking <span id="bookingIdText"></span></p>
      </div>
    </div>
  </header>

  <main class="page-container">
    <div class="main-grid">

      <!-- Booking Card -->
      <section class="card" id="card-booking">
        <div class="card-header-row">
          <div>
            <h2 class="service-name" id="serviceNameHeading"></h2>
            <span class="category-pill">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41 11 3.83A2 2 0 0 0 9.59 3.24H4a1 1 0 0 0-1 1v5.59a2 2 0 0 0 .59 1.41l9.58 9.59a2 2 0 0 0 2.83 0l4.59-4.59a2 2 0 0 0 0-2.83Z"/><circle cx="7.5" cy="7.5" r="1.2" fill="currentColor" stroke="none"/></svg>
              <span id="categoryText"></span>
            </span>
          </div>
          <span class="status-badge" id="statusBadge"></span>
        </div>

        <div class="divider"></div>

        <div class="info-row">
          <div class="info-item">
            <div class="info-icon">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2.5"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
            </div>
            <div>
              <p class="info-label">Date</p>
              <p class="info-value" id="bookingDate"></p>
            </div>
          </div>
          <div class="info-item">
            <div class="info-icon">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9.5"/><path d="M12 7v5l3.2 2"/></svg>
            </div>
            <div>
              <p class="info-label">Time</p>
              <p class="info-value" id="bookingTime"></p>
            </div>
          </div>
        </div>

        <p class="requested-note" id="requestedNote"></p>
      </section>

      <!-- Customer Card -->
      <section class="card" id="card-customer">
        <h3 class="card-title">Customer</h3>
        <div class="customer-top">
          <div class="avatar" id="customerAvatar"></div>
          <div>
            <p class="customer-name" id="customerName"></p>
            <p class="customer-tag" id="customerTag"></p>
          </div>
        </div>

        <div class="contact-list">
          <div class="contact-rows" id="contactRows">
            <div class="contact-row">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2.5"/><path d="m22 6-10 7L2 6"/></svg>
              <span id="customerEmail"></span>
            </div>
            <div class="contact-row">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92Z"/></svg>
              <span id="customerPhone"></span>
            </div>
          </div>
          <div class="contact-overlay" id="contactOverlay">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="10" rx="2.5"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <p>Contact available after accepting booking</p>
          </div>
        </div>
      </section>

      <!-- Service Info Card -->
      <section class="card" id="card-service">
        <h3 class="card-title">Service Info</h3>
        <div class="service-top">
          <h4 class="service-title" id="serviceTitle"></h4>
          <p class="service-price" id="servicePrice"></p>
        </div>
        <div class="chip-row">
          <span class="chip">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9.5"/><path d="M12 7v5l3.2 2"/></svg>
            <span id="serviceDuration"></span>
          </span>
          <span class="chip" id="serviceCategoryChip"></span>
        </div>
        <p class="service-desc" id="serviceDescription"></p>
      </section>

      <!-- Action Section -->
      <section class="card" id="card-action">
        <h3 class="card-title">Next Step</h3>
        <div id="actionBody"></div>
      </section>

    </div>
  </main>

  <div class="toast-container" id="toastContainer"></div>

@endsection

@push('style')
<style>
  /* ---------- Reset & Tokens ---------- */
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
 
  :root{
    --primary:#FF6B6B;
    --primary-dark:#ef5555;
    --primary-light:#FFEFEF;
    --bg:#f8f9fa;
    --card:#ffffff;
    --text:#181b25;
    --text-secondary:#68707e;
    --text-tertiary:#9aa1ac;
    --border:#eef1f4;
 
    --shadow-sm: 0 1px 2px rgba(16,24,40,0.04);
    --shadow-md: 0 4px 14px rgba(16,24,40,0.06), 0 1px 2px rgba(16,24,40,0.04);
    --shadow-lg: 0 16px 36px rgba(16,24,40,0.09), 0 2px 8px rgba(16,24,40,0.05);
 
    --radius-lg:20px;
    --radius-md:14px;
    --radius-sm:10px;
 
    --pending-bg:#FFF6E0;   --pending-text:#9a6b00; --pending-dot:#f5a623;
    --accepted-bg:#e5f9ee;  --accepted-text:#12805c; --accepted-dot:#22c55e;
    --rejected-bg:#fdecec;  --rejected-text:#c0392b; --rejected-dot:#ef4444;
    --completed-bg:#eaf1fe; --completed-text:#1d5fd9; --completed-dot:#3b82f6;
  }
 
 
 
  svg{ display:block; flex-shrink:0; }
  button{ font-family:inherit; cursor:pointer; border:none; background:none; }
 
  :focus-visible{
    outline:2px solid var(--primary);
    outline-offset:2px;
    border-radius:6px;
  }
 
  /* ---------- Layout shells ---------- */
  .header{
    position:sticky;
    top:0;
    z-index:20;
    background:rgba(248,249,250,0.85);
    backdrop-filter:blur(10px);
    -webkit-backdrop-filter:blur(10px);
    border-bottom:1px solid var(--border);
  }
  .header-inner{
    max-width:1040px;
    margin:0 auto;
    padding:18px 24px;
    display:flex;
    align-items:center;
    gap:16px;
  }
  .back-btn{
    width:40px; height:40px;
    display:flex; align-items:center; justify-content:center;
    border-radius:50%;
    background:var(--card);
    box-shadow:var(--shadow-sm);
    color:var(--text);
    transition:transform .18s ease, box-shadow .18s ease, color .18s ease, background .18s ease;
  }
  .back-btn:hover{
    transform:translateX(-2px);
    box-shadow:var(--shadow-md);
    color:var(--primary);
  }
  .back-btn:active{ transform:translateX(-2px) scale(0.94); }
 
  .header-titles h1{
    font-size:20px;
    font-weight:800;
    letter-spacing:-0.01em;
  }
  .header-sub{
    font-size:13px;
    color:var(--text-tertiary);
    margin-top:2px;
    font-weight:500;
  }
 
  .page-container{
    max-width:1040px;
    margin:0 auto;
    padding:28px 24px 120px;
  }
 
  .main-grid{
    display:grid;
    grid-template-columns: 1fr;
    grid-template-areas:
      "booking"
      "customer"
      "service"
      "action";
    gap:20px;
  }
 
  @media (min-width: 900px){
    .main-grid{
      grid-template-columns: 1.6fr 1fr;
      grid-template-areas:
        "booking  customer"
        "service  action";
      align-items:start;
    }
  }
 
  /* ---------- Card base ---------- */
  .card{
    background:var(--card);
    border-radius:var(--radius-lg);
    border:1px solid var(--border);
    box-shadow:var(--shadow-md);
    padding:24px;
    transition:box-shadow .25s ease, transform .25s ease;
  }
  .card:hover{
    box-shadow:var(--shadow-lg);
  }
 
  .card-title{
    font-size:13px;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:.06em;
    color:var(--text-tertiary);
    margin-bottom:16px;
  }
 
  /* ---------- Booking card ---------- */
  #card-booking{ grid-area:booking; }
 
  .card-header-row{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    gap:14px;
    flex-wrap:wrap;
  }
 
  .service-name{
    font-size:21px;
    font-weight:800;
    letter-spacing:-0.01em;
    margin-bottom:8px;
  }
 
  .category-pill{
    display:inline-flex;
    align-items:center;
    gap:6px;
    font-size:12.5px;
    font-weight:600;
    color:var(--primary-dark);
    background:var(--primary-light);
    padding:5px 10px;
    border-radius:999px;
  }
 
  .divider{
    height:1px;
    background:var(--border);
    margin:20px 0;
  }
 
  .info-row{
    display:flex;
    gap:28px;
    flex-wrap:wrap;
  }
  .info-item{
    display:flex;
    align-items:center;
    gap:12px;
  }
  .info-icon{
    width:38px; height:38px;
    border-radius:10px;
    background:var(--bg);
    color:var(--primary);
    display:flex; align-items:center; justify-content:center;
  }
  .info-label{
    font-size:11.5px;
    color:var(--text-tertiary);
    font-weight:600;
    text-transform:uppercase;
    letter-spacing:.04em;
  }
  .info-value{
    font-size:14.5px;
    font-weight:700;
    color:var(--text);
    margin-top:1px;
  }
 
  .requested-note{
    margin-top:18px;
    font-size:12.5px;
    color:var(--text-tertiary);
    font-weight:500;
  }
 
  /* ---------- Status badge ---------- */
  .status-badge{
    display:inline-flex;
    align-items:center;
    gap:7px;
    padding:7px 13px;
    border-radius:999px;
    font-size:12.5px;
    font-weight:700;
    white-space:nowrap;
  }
  .status-dot{
    width:7px; height:7px;
    border-radius:50%;
  }
  .status-pending{ background:var(--pending-bg); color:var(--pending-text); }
  .status-pending .status-dot{ background:var(--pending-dot); animation:pulse 1.6s ease-in-out infinite; }
 
  .status-accepted{ background:var(--accepted-bg); color:var(--accepted-text); }
  .status-accepted .status-dot{ background:var(--accepted-dot); }
 
  .status-rejected{ background:var(--rejected-bg); color:var(--rejected-text); }
  .status-rejected .status-dot{ background:var(--rejected-dot); }
 
  .status-completed{ background:var(--completed-bg); color:var(--completed-text); }
  .status-completed .status-dot{ background:var(--completed-dot); }
 
  @keyframes pulse{
    0%, 100%{ box-shadow:0 0 0 0 rgba(245,166,35,.45); }
    50%{ box-shadow:0 0 0 5px rgba(245,166,35,0); }
  }
 
  /* ---------- Customer card ---------- */
  #card-customer{ grid-area:customer; }
 
  .customer-top{
    display:flex;
    align-items:center;
    gap:14px;
    margin-bottom:20px;
  }
  .avatar{
    width:52px; height:52px;
    border-radius:50%;
    background:linear-gradient(135deg, var(--primary), #ff9a8b);
    color:#fff;
    display:flex; align-items:center; justify-content:center;
    font-weight:800;
    font-size:16px;
    letter-spacing:.02em;
    box-shadow:0 6px 14px rgba(255,107,107,.35);
  }
  .customer-name{ font-size:16px; font-weight:700; }
  .customer-tag{ font-size:12.5px; color:var(--text-tertiary); margin-top:2px; font-weight:500; }
 
  .contact-list{ position:relative; }
  .contact-rows{
    display:flex;
    flex-direction:column;
    gap:12px;
    transition:filter .3s ease, opacity .3s ease;
  }
  .contact-rows.is-locked{
    filter:blur(6px);
    opacity:.55;
    user-select:none;
    pointer-events:none;
  }
  .contact-row{
    display:flex;
    align-items:center;
    gap:10px;
    font-size:13.5px;
    font-weight:600;
    color:var(--text);
  }
  .contact-row svg{ color:var(--text-tertiary); }
 
  .contact-overlay{
    position:absolute;
    inset:0;
    display:none;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-align:center;
    gap:8px;
    padding:14px;
  }
  .contact-overlay.is-visible{ display:flex; }
  .contact-overlay svg{ color:var(--text-tertiary); }
  .contact-overlay p{
    font-size:12.5px;
    font-weight:600;
    color:var(--text-secondary);
    max-width:200px;
    line-height:1.4;
  }
 
  /* ---------- Service info card ---------- */
  #card-service{ grid-area:service; }
 
  .service-top{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    gap:14px;
    flex-wrap:wrap;
    margin-bottom:14px;
  }
  .service-title{ font-size:16px; font-weight:700; max-width:60%; }
  .service-price{
    font-size:22px;
    font-weight:800;
    color:var(--primary);
    letter-spacing:-0.01em;
  }
 
  .chip-row{
    display:flex;
    gap:8px;
    flex-wrap:wrap;
    margin-bottom:16px;
  }
  .chip{
    display:inline-flex;
    align-items:center;
    gap:6px;
    font-size:12px;
    font-weight:600;
    color:var(--text-secondary);
    background:var(--bg);
    border:1px solid var(--border);
    padding:6px 10px;
    border-radius:999px;
  }
 
  .service-desc{
    font-size:13.5px;
    line-height:1.65;
    color:var(--text-secondary);
  }
 
  /* ---------- Action card ---------- */
  #card-action{ grid-area:action; display:flex; flex-direction:column; }
 
  .btn{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    width:100%;
    padding:13px 18px;
    border-radius:var(--radius-sm);
    font-size:14px;
    font-weight:700;
    transition:transform .15s ease, box-shadow .15s ease, background .15s ease, filter .15s ease;
  }
  .btn:active{ transform:scale(0.98); }
 
  .btn-primary{
    background:var(--primary);
    color:#fff;
    box-shadow:0 8px 18px rgba(255,107,107,.32);
  }
  .btn-primary:hover{ filter:brightness(1.05); box-shadow:0 10px 22px rgba(255,107,107,.4); transform:translateY(-1px); }
 
  .btn-outline{
    background:#fff;
    color:var(--text);
    border:1.5px solid var(--border);
  }
  .btn-outline:hover{ border-color:var(--rejected-dot); color:var(--rejected-text); background:var(--rejected-bg); }
 
  .btn-row{ display:flex; gap:10px; }
 
  .action-note{
    font-size:12.5px;
    color:var(--text-tertiary);
    font-weight:500;
    text-align:center;
    margin-top:12px;
    line-height:1.5;
  }
 
  .success-badge{
    display:flex;
    align-items:center;
    gap:10px;
    background:var(--completed-bg);
    color:var(--completed-text);
    padding:14px 16px;
    border-radius:var(--radius-sm);
    font-weight:700;
    font-size:13.5px;
  }
  .success-badge svg{ flex-shrink:0; }
 
  .completed-timestamp{
    font-size:12px;
    color:var(--text-tertiary);
    margin-top:10px;
    font-weight:500;
  }
 
  .empty-state{
    display:flex;
    flex-direction:column;
    align-items:center;
    text-align:center;
    gap:10px;
    padding:8px 4px 4px;
    color:var(--text-secondary);
  }
  .empty-state svg{ color:var(--text-tertiary); }
  .empty-state p{ font-size:13px; font-weight:600; line-height:1.5; }
 
  /* ---------- Toasts ---------- */
  .toast-container{
    position:fixed;
    bottom:88px;
    right:20px;
    display:flex;
    flex-direction:column;
    gap:10px;
    z-index:100;
  }
  .toast{
    display:flex;
    align-items:center;
    gap:10px;
    background:var(--text);
    color:#fff;
    padding:12px 16px;
    border-radius:var(--radius-sm);
    font-size:13px;
    font-weight:600;
    box-shadow:var(--shadow-lg);
    animation:toast-in .25s ease forwards;
    max-width:280px;
  }
  .toast.success{ background:#12805c; }
  .toast.error{ background:#c0392b; }
  .toast.leaving{ animation:toast-out .25s ease forwards; }
  .toast-dot{ width:7px; height:7px; border-radius:50%; background:#fff; flex-shrink:0; }
 
  @keyframes toast-in{
    from{ opacity:0; transform:translateY(10px) scale(.96); }
    to{ opacity:1; transform:translateY(0) scale(1); }
  }
  @keyframes toast-out{
    from{ opacity:1; transform:translateY(0); }
    to{ opacity:0; transform:translateY(10px); }
  }
 
  /* ---------- Demo toolbar ---------- */
  .demo-bar{
    position:fixed;
    left:0; right:0; bottom:0;
    z-index:90;
    background:#14151c;
    border-top:1px solid rgba(255,255,255,.08);
    padding:10px 20px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:14px;
    flex-wrap:wrap;
  }
  .demo-label{
    font-size:11px;
    font-weight:700;
    color:rgba(255,255,255,.45);
    text-transform:uppercase;
    letter-spacing:.06em;
  }
  .demo-buttons{ display:flex; gap:8px; flex-wrap:wrap; }
  .demo-btn{
    font-size:12px;
    font-weight:700;
    color:rgba(255,255,255,.75);
    background:rgba(255,255,255,.08);
    padding:7px 13px;
    border-radius:999px;
    transition:background .15s ease, color .15s ease;
  }
  .demo-btn:hover{ background:rgba(255,255,255,.16); color:#fff; }
  .demo-btn.is-active{ background:var(--primary); color:#fff; }
 
  /* ---------- Responsive tweaks ---------- */
  @media (max-width:560px){
    .header-inner{ padding:14px 16px; }
    .page-container{ padding:20px 16px 130px; }
    .card{ padding:18px; }
    .service-name{ font-size:19px; }
    .service-title{ max-width:100%; }
    .service-top{ flex-direction:column; gap:4px; }
    .info-row{ gap:20px; }
    .demo-bar{ justify-content:flex-start; overflow-x:auto; }
  }
 
  @media (prefers-reduced-motion: reduce){
    *{ animation-duration:0.001ms !important; animation-iteration-count:1 !important; transition-duration:0.001ms !important; }
  }
</style>
@endpush


@push('scripts')
    <script>
      
(function(){
  "use strict";

   let booking = {}
   let currentStatus = '';
   let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

   async function getData() {
   const response = await fetch('/provider/booking/view__data/'+{{ $id }});
   const data = await response.json();


   currentStatus = data.booking.status;

   const dbdate = data.booking.created_at;

    const formatted = new Date(dbdate).toLocaleDateString("en-US", {
        month: "short",
        day: "numeric",
        year: "numeric"
      });
     const datetime = data.booking.created_at;

    // Convert to ISO format by replacing the space with "T"
     const date = new Date(datetime.replace(" ", "T"));

    const time = date.toLocaleTimeString("en-US", {
    hour: "numeric",
    minute: "2-digit",
    hour12: true
   });


    Object.assign(booking, {
    id: data.booking.id,
    serviceName: data.booking.service.title,
    category: data.category.name,
    date: formatted,
    time: time,
    requested: "Requested on "+formatted,
    price: data.booking.service.price,
    description: data.booking.service.description,
    customer: {
      name: data.booking.user.name,
      email: data.booking.user.email,
      phone: data.booking.user.number
    }
    })

      /* ---------------- Populate static content ---------------- */
  function populateStaticData(){
    el("bookingIdText").textContent = '#'+booking.id;
    el("serviceNameHeading").textContent = booking.serviceName;
    el("categoryText").textContent = booking.category;
    el("bookingDate").textContent = booking.date;
    el("bookingTime").textContent = booking.time;
    el("requestedNote").textContent = booking.requested;
 
    el("customerAvatar").textContent = initials(booking.customer.name);
    el("customerName").textContent = booking.customer.name;

    el("customerEmail").textContent = booking.customer.email;
    el("customerPhone").textContent = booking.customer.phone;

 
    el("serviceTitle").textContent = booking.serviceName;
    el("servicePrice").textContent = '৳ '+booking.price;

    el("serviceCategoryChip").textContent = booking.category;
    el("serviceDescription").textContent = booking.description;
  }
       populateStaticData()
        const statusLabels = {
    pending: "Pending",
    accepted: "Accepted",
    rejected: "Rejected",
    completed: "Completed"
  };
 


  let completedAt = null;
 
  /* ---------------- Icons ---------------- */
  const icon = {
    check: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9.5"/><path d="m8.5 12.3 2.4 2.4 4.8-5"/></svg>',
    x: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>',
    hourglass: '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2h12M6 22h12M6 2c0 5 12 5 12 10s-12 5-12 10M18 2c0 5-12 5-12 10s12 5 12 10"/></svg>',
    ban: '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9.5"/><path d="m5.5 5.5 13 13"/></svg>',
    checkCircle: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9.5"/><path d="m8.5 12.3 2.4 2.4 4.8-5"/></svg>'
  };
 
  /* ---------------- Helpers ---------------- */
  function initials(name){
    return name.split(" ").filter(Boolean).map(w => w[0]).join("").slice(0,2).toUpperCase();
  }
 
  function el(id){ return document.getElementById(id); }
 

  /* ---------------- Render: status badge ---------------- */
  function renderStatusBadge(){
    const badge = el("statusBadge");
    badge.className = "status-badge status-" + currentStatus;
    badge.innerHTML = '<span class="status-dot"></span>' + statusLabels[currentStatus];
  }
 
  /* ---------------- Render: contact lock ---------------- */
  function renderContact(){
    const unlocked = currentStatus === "accepted" || currentStatus === "completed";
    el("contactRows").classList.toggle("is-locked", !unlocked);
    el("contactOverlay").classList.toggle("is-visible", !unlocked);
  }
 
  /* ---------------- Render: action section ---------------- */
  function renderAction(){
    const body = el("actionBody");
 
    if (currentStatus === "pending"){
      body.innerHTML =
        '<div class="btn-row">' +
          '<button class="btn btn-primary" id="acceptBtn" >' + icon.check + ' Accept</button>' +
          '<button class="btn btn-outline" id="rejectBtn">' + icon.x + ' Reject</button>' +
        '</div>' +
        '<p class="action-note">Accept to unlock the customer\u2019s contact details.</p>';
      el("acceptBtn").addEventListener("click", () => {
      
        fetch('/provider/booking/'+booking.id, {
          method: 'PUT', 
          headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': token
          },
          body: JSON.stringify({
            id: booking.id,
            status :'accepted'
          })
        })
        .then(res => res.json())
        .then(data => {
          if(data == 'success'){
             setStatus("accepted", "Booking accepted — contact info unlocked", "success")
          }else{
            alert(data)
          }
        })
      });
      el("rejectBtn").addEventListener("click", () =>  {
      fetch('/provider/booking/'+booking.id, {
          method: 'PUT', 
          headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': token
          },
          body: JSON.stringify({
            id: booking.id,
            status :'rejected'
          })
        })
        .then(res => res.json())
        .then(data => {
          if(data == 'success'){
                    setStatus("rejected", "Booking rejected", "error")
          }else{
            alert(data)
          }
        })
      });
 
    } else if (currentStatus === "accepted"){
      body.innerHTML =
        '<button class="btn btn-primary" id="completeBtn">' + icon.check + ' Mark as Completed</button>' +
        '<p class="action-note">Once the service is done, mark this booking as completed.</p>';
      el("completeBtn").addEventListener("click", () => {
        completedAt = new Date();

             fetch('/provider/booking/'+booking.id, {
          method: 'PUT', 
          headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': token
          },
          body: JSON.stringify({
            id: booking.id,
            status :'completed'
          })
        })
        .then(res => res.json())
        .then(data => {
          if(data == 'success'){
              setStatus("completed", "Booking marked as completed", "success");
          }else{
            alert(data)
          }
        })
      });
 
    } else if (currentStatus === "rejected"){
      body.innerHTML =
        '<div class="empty-state">' + icon.ban +
        '<p>This booking was rejected and no further action is required.</p></div>';
 
    } else if (currentStatus === "completed"){
      const ts = completedAt ? completedAt : new Date();
      const formatted = ts.toLocaleString(undefined, { month:"short", day:"numeric", year:"numeric", hour:"numeric", minute:"2-digit" });
      body.innerHTML =
        '<div class="success-badge">' + icon.checkCircle + ' Completed Successfully</div>' +
        '<p class="completed-timestamp">Completed on ' + formatted + '</p>';
    }
  }

    /* ---------------- Central state setter ---------------- */
  function setStatus(newStatus, toastMessage, toastType){
    currentStatus = newStatus;
    renderStatusBadge();
    renderContact();
    renderAction();

    if (toastMessage) showToast(toastMessage, toastType);
  }
  renderStatusBadge();
    renderContact();
    renderAction();

      /* ---------------- Toasts ---------------- */
  function showToast(message, type){
    const container = el("toastContainer");
    const toast = document.createElement("div");
    toast.className = "toast" + (type ? " " + type : "");
    toast.innerHTML = '<span class="toast-dot"></span><span>' + message + '</span>';
    container.appendChild(toast);
    setTimeout(() => {
      toast.classList.add("leaving");
      setTimeout(() => toast.remove(), 250);
    }, 2600);
  }
 
  }

 

 
 
 



 
  // /* ---------------- Wire up demo toolbar & back button ---------------- */
  // function bindGlobalControls(){
  //   el("demoButtons").addEventListener("click", (e) => {
  //     const btn = e.target.closest(".demo-btn");
  //     if (!btn) return;
  //     const status = btn.dataset.status;
  //     if (status === currentStatus) return;
  //     if (status === "completed") completedAt = new Date();
  //     setStatus(status, "Status set to " + statusLabels[status] + " (demo)");
  //   });
 
  //   el("backBtn").addEventListener("click", () => {
  //     showToast("Back button — demo only");
  //   });
  // }
 
  /* ---------------- Init ---------------- */
  document.addEventListener("DOMContentLoaded", function(){
    getData()
    // populateStaticData();
    // renderStatusBadge();
    // renderContact();
    // renderAction();
    // syncDemoButtons();
    // bindGlobalControls();
  });
})();
 
 
   </script>
@endpush