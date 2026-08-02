@extends('layouts.provider')

@section('content')
<div class="page">
  <div class="dashboard-card">

    <header class="card-header">
      <div>
        <h1>Bookings</h1>
        <p class="subtitle" id="subtitle">Manage incoming service requests</p>
      </div>
    </header>

    <nav class="tabs" id="tabs">
      <button class="tab active" data-tab="all">All<span class="tab-count" id="count-all"></span></button>
      <button class="tab" data-tab="pending">Pending<span class="tab-count" id="count-pending"></span></button>
      <button class="tab" data-tab="accepted">Accepted<span class="tab-count" id="count-accepted"></span></button>
      <button class="tab" data-tab="completed">Completed<span class="tab-count" id="count-completed"></span></button>
    </nav>

    <div class="list-head">
      <span class="lh-customer">Customer</span>
      <span class="lh-meta">
        <span class="lh-date">Date &amp; time</span>
        <span class="lh-status">Status</span>
        <span class="lh-actions">Actions</span>
      </span>
    </div>

    <div class="bookings-list" id="bookingsList"></div>
    <p class="empty-state" id="emptyState" hidden>No bookings in this category.</p>
    
  </div>
</div>
@endsection

@push('style')

<style>
  :root{
    --bg:#EEF0F6;
    --card-bg:#FFFFFF;
    --border:#E8E9F1;
    --text-primary:#1B1E2B;
    --text-secondary:#6D7180;
    --text-tertiary:#9DA1AF;
    --accent:#4A47D3;
    --accent-soft:#EEEDFB;
 
    --pending-bg:#FDF3D6;
    --pending-text:#9A6700;
    --accepted-bg:#DEF6E4;
    --accepted-text:#1E8A4C;
    --completed-bg:#EEFBF2;
    --completed-text:#4CA575;
    --rejected-bg:#FCEAEA;
    --rejected-text:#C0392B;
 
    --accept-btn:#22C55E;
    --accept-btn-hover:#17A34A;
    --reject-btn:#EF4444;
    --reject-btn-hover:#DC2626;
    --complete-btn:#4A47D3;
    --complete-btn-hover:#3B38B3;
 
    --radius-lg:20px;
    --radius-md:12px;
    --radius-sm:9px;
    --shadow-card: 0 20px 45px -20px rgba(30,32,60,0.18), 0 2px 8px rgba(30,32,60,0.04);
  }
 

  .page{
    width:100%;
    max-width:860px;
    margin: auto;
  }
 
  .dashboard-card{
    background:var(--card-bg);
    border-radius:var(--radius-lg);
    box-shadow:var(--shadow-card);
    padding:32px 32px 12px;
    border:1px solid var(--border);
  }
 
  /* ---------- Header ---------- */
  .card-header{
    display:flex;
    align-items:flex-end;
    justify-content:space-between;
    margin-bottom:24px;
    gap:16px;
  }
 
  .card-header h1{
    font-family:'Manrope', sans-serif;
    font-size:26px;
    font-weight:800;
    letter-spacing:-0.02em;
    margin:0 0 4px;
  }
 
  .card-header .subtitle{
    margin:0;
    font-size:14px;
    color:var(--text-secondary);
  }
 
  /* ---------- Tabs ---------- */
  .tabs{
    display:flex;
    gap:4px;
    border-bottom:1px solid var(--border);
    margin-bottom:8px;
    overflow-x:auto;
    scrollbar-width:none;
  }
  .tabs::-webkit-scrollbar{ display:none; }
 
  .tab{
    font-family:'Manrope', sans-serif;
    background:none;
    border:none;
    cursor:pointer;
    padding:10px 16px 14px;
    font-size:14.5px;
    font-weight:600;
    color:var(--text-secondary);
    position:relative;
    white-space:nowrap;
    transition:color .15s ease;
  }
 
  .tab .tab-count{
    font-weight:600;
    color:var(--text-tertiary);
    margin-left:3px;
  }
 
  .tab:hover{ color:var(--text-primary); }
 
  .tab.active{ color:var(--accent); }
  .tab.active .tab-count{ color:var(--accent); opacity:0.75; }
 
  .tab.active::after{
    content:"";
    position:absolute;
    left:16px;
    right:16px;
    bottom:-1px;
    height:2.5px;
    border-radius:2px;
    background:var(--accent);
  }
 
  /* ---------- List head (desktop labels) ---------- */
  .list-head{
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:16px 4px 8px;
    font-size:12px;
    font-weight:600;
    letter-spacing:0.03em;
    text-transform:uppercase;
    color:var(--text-tertiary);
  }
  .list-head .lh-customer{ flex:1 1 220px; }
  .list-head .lh-meta{ display:flex; align-items:center; gap:24px; }
  .list-head .lh-date{ width:150px; }
  .list-head .lh-status{ width:96px; }
  .list-head .lh-actions{ width:84px; text-align:right; }
 
  /* ---------- Rows ---------- */
  .bookings-list{ display:flex; flex-direction:column; }
 
  .booking-row{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:16px;
    padding:16px 4px;
    border-top:1px solid var(--border);
    transition:background-color .15s ease;
  }
  .booking-row:hover{ background:#FAFAFD; }
 
  .row-info{
    display:flex;
    align-items:center;
    gap:12px;
    flex:1 1 220px;
    min-width:0;
  }
 
  .avatar{
    flex:0 0 auto;
    width:42px;
    height:42px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:'Manrope', sans-serif;
    font-weight:700;
    font-size:14px;
  }
 
  .row-text{ min-width:0; }
  .row-text .cust-name{
    font-family:'Manrope', sans-serif;
    font-weight:700;
    font-size:14.5px;
    color:var(--text-primary);
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
  }
  .row-text .cust-service{
    font-size:12.5px;
    color:var(--text-secondary);
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
  }
 
  .row-meta{
    display:flex;
    align-items:center;
    gap:24px;
    flex:0 0 auto;
  }
 
  .row-date{
    width:150px;
    font-size:13.5px;
    color:var(--text-secondary);
  }
 
  .badge{
    width:96px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    padding:6px 10px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
    letter-spacing:0.01em;
  }
  .badge.pending{ background:var(--pending-bg); color:var(--pending-text); }
  .badge.accepted{ background:var(--accepted-bg); color:var(--accepted-text); }
  .badge.completed{ background:var(--completed-bg); color:var(--completed-text); }
  .badge.rejected{ background:var(--rejected-bg); color:var(--rejected-text); }
 
  .row-actions{
    width:84px;
    display:flex;
    justify-content:flex-end;
    gap:8px;
  }
 
  .icon-btn{
    width:34px;
    height:34px;
    border:none;
    border-radius:var(--radius-sm);
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    font-size:14px;
    color:#fff;
    transition:transform .12s ease, box-shadow .12s ease, background-color .12s ease;
  }
  .icon-btn:active{ transform:scale(0.94); }
 
  .icon-btn.accept{ background:var(--accept-btn); }
  .icon-btn.accept:hover{ background:var(--accept-btn-hover); transform:translateY(-1px); box-shadow:0 6px 14px -4px rgba(34,197,94,0.55); }
 
  .icon-btn.reject{ background:var(--reject-btn); }
  .icon-btn.reject:hover{ background:var(--reject-btn-hover); transform:translateY(-1px); box-shadow:0 6px 14px -4px rgba(239,68,68,0.55); }
 
  .icon-btn.complete{ background:var(--complete-btn); width:auto; padding:0 12px; font-size:12px; font-weight:700; font-family:'Manrope',sans-serif; }
  .icon-btn.complete:hover{ background:var(--complete-btn-hover); transform:translateY(-1px); box-shadow:0 6px 14px -4px rgba(74,71,211,0.5); }
 
  .no-action{
    font-size:12px;
    color:var(--text-tertiary);
  }
 
  /* ---------- Empty state ---------- */
  .empty-state{
    text-align:center;
    padding:48px 12px 40px;
    color:var(--text-secondary);
    font-size:14px;
  }
 
  /* ---------- Responsive ---------- */
  @media (max-width:640px){
    body{ padding:28px 12px; }
    .dashboard-card{ padding:22px 18px 8px; border-radius:16px; }
    .card-header h1{ font-size:22px; }
 
    .list-head{ display:none; }
 
    .booking-row{
      flex-direction:column;
      align-items:stretch;
      gap:12px;
      padding:16px 2px;
    }
 
    .row-meta{
      flex-wrap:wrap;
      gap:10px 12px;
      width:100%;
    }
 
    .row-date{ order:1; width:auto; flex:1 1 100%; }
    .badge{ order:2; }
    .row-actions{ order:3; width:auto; margin-left:auto; }
  }
</style>  
@endpush
@push('scripts')
  <script>
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let bookings = [];
       //get data
    fetch('/provider/all-booking', {
      method: 'GET',
      headers: {
        "X-CSRF-TOKEN": token
      }
    })
    .then(res => res.json())
    .then(data => {
      data.forEach((booking) => {
        bookings.push(booking);
         let currentFilter = "all";
 
  // ---------- Avatar helpers ----------
  const avatarPalette = [
    { bg: "#DCE3FE", fg: "#3548C9" },
    { bg: "#FBE0EC", fg: "#C23B76" },
    { bg: "#DDF3E6", fg: "#1F8A4C" },
    { bg: "#FDECD2", fg: "#B26A00" },
    { bg: "#E4E1FB", fg: "#5B45C9" },
    { bg: "#DDF2F1", fg: "#0E7C7B" }
  ];
 
function getInitials(name) {
  // Ensure name exists and is a string; otherwise, return an empty string
  if (typeof name !== 'string') return "";
  
  return name.trim().split(/\s+/).map(w => w[0]).slice(0, 2).join("").toUpperCase();
}
 
function getAvatarColor(name) {
  // Fallback to empty string if name is null or undefined
  const safeName = name || "";
  let sum = 0;
  for (let i = 0; i < safeName.length; i++) sum += safeName.charCodeAt(i);
  return avatarPalette[sum % avatarPalette.length];
}
 
  // ---------- Rendering ----------
  const listEl = document.getElementById("bookingsList");
  const emptyEl = document.getElementById("emptyState");
  const subtitleEl = document.getElementById("subtitle");
 
  function statusLabel(status){
    return status.charAt(0).toUpperCase() + status.slice(1);
  }
 
  function buildActions(booking){
    if (booking.status === "pending"){
      return `
      <button class="icon-btn complete" onclick=window.location.href='/provider/bookings/${booking.id}' data-action="complete" data-id="${booking.id}" >View</button>
      `;
    }
    if (booking.status === "accepted"){
      return `<button class="icon-btn complete" onclick=window.location.href='/provider/bookings/${booking.id}' data-action="complete" data-id="${booking.id}" >View</button>`;
    }
    return `<span class="no-action">—</span>`;
  }
 
  function renderBookings(filter){
    
    currentFilter = filter;
    const filtered = filter === "all" ? bookings : bookings.filter(b => b.status === filter);
 
    listEl.innerHTML = "";
 
    if (filtered.length === 0){
      emptyEl.hidden = false;
      return;
    }
    emptyEl.hidden = true;
 
    filtered.forEach(booking => {
      const date = new Date(booking.created_at.replace(' ', 'T'));
      const color = getAvatarColor(booking.user.name);
      const row = document.createElement("div");
      row.className = "booking-row";
      row.dataset.id = booking.id;
 
      row.innerHTML = `
        <div class="row-info">
          <div class="avatar" style="background:${color.bg}; color:${color.fg};">${getInitials(booking.user.name)}</div>
          <div class="row-text">
            <div class="cust-name">${booking.user.name}</div>
            <div class="cust-service">${booking.service.title}</div>
          </div>
        </div>
        <div class="row-meta">
          <span class="row-date">${date.toDateString() }</span>
          <span class="badge ${booking.status}">${statusLabel(booking.status)}</span>
          <div class="row-actions">${buildActions(booking)}</div>
        </div>
      `;
 
      listEl.appendChild(row);
    });
  }
 
  function updateCounts(){
    const counts = { pending: 0, accepted: 0, completed: 0, rejected: 0 };
    bookings.forEach(b => { if (counts[b.status] !== undefined) counts[b.status]++; });
 
    document.getElementById("count-all").textContent = ` (${bookings.length})`;
    document.getElementById("count-pending").textContent = ` (${counts.pending})`;
    document.getElementById("count-accepted").textContent = ` (${counts.accepted})`;
    document.getElementById("count-completed").textContent = ` (${counts.completed})`;
 
    subtitleEl.textContent = `${counts.pending} awaiting response · ${bookings.length} total bookings`;
  }
 
  function updateStatus(id, newStatus){
    const booking = bookings.find(b => b.id === Number(id));
    if (!booking) return;
    booking.status = newStatus;
    updateCounts();
    renderBookings(currentFilter);
  }
 
  // ---------- Event delegation for action buttons ----------
  listEl.addEventListener("click", (e) => {
    const btn = e.target.closest(".icon-btn");
    if (!btn) return;
    const id = btn.dataset.id;
    const action = btn.dataset.action;
 
    if (action === "accept") updateStatus(id, "accepted");
    else if (action === "reject") updateStatus(id, "rejected");
    // else if (action === "complete") updateStatus(id, "completed");
  });
 
  // ---------- Tab switching ----------
  document.getElementById("tabs").addEventListener("click", (e) => {
    const tab = e.target.closest(".tab");
    if (!tab) return;
    document.querySelectorAll(".tab").forEach(t => t.classList.remove("active"));
    tab.classList.add("active");
    renderBookings(tab.dataset.tab);
  });
 
  // ---------- Init ----------
  updateCounts();
  renderBookings("all");


      })
    })

</script>
@endpush

