@extends('layouts.provider')
@section('content')

<div class="panel">
  <div class="panel-header">
    <h1>My Services</h1>
    <button class="add-btn" type="button">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Add New Service
    </button>
  </div>

  <!-- Desktop table -->
  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th>Service</th>
          <th>Category</th>
          <th>Price</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="service-name">Plumbing Service</td>
          <td class="category">Plumbing</td>
          <td class="price">$25 <span>/ hour</span></td>
          <td><span class="status">Active</span></td>
          <td>
            <div class="actions">
              <button class="icon-btn edit" aria-label="Edit Plumbing Service">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"/><path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>
              </button>
              <button class="icon-btn delete" aria-label="Delete Plumbing Service">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
              </button>
            </div>
          </td>
        </tr>
        <tr>
          <td class="service-name">Electrical Repair</td>
          <td class="category">Electrical</td>
          <td class="price">$40 <span>/ hour</span></td>
          <td><span class="status">Active</span></td>
          <td>
            <div class="actions">
              <button class="icon-btn edit" aria-label="Edit Electrical Repair">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"/><path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>
              </button>
              <button class="icon-btn delete" aria-label="Delete Electrical Repair">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
              </button>
            </div>
          </td>
        </tr>
        <tr>
          <td class="service-name">AC Repair</td>
          <td class="category">Cleaning</td>
          <td class="price">$45 <span>/ hour</span></td>
          <td><span class="status">Active</span></td>
          <td>
            <div class="actions">
              <button class="icon-btn edit" aria-label="Edit AC Repair">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"/><path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>
              </button>
              <button class="icon-btn delete" aria-label="Delete AC Repair">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Mobile cards -->
  <div class="cards">
    <div class="service-card">
      <div class="row-top">
        <div>
          <div class="name">Plumbing Service</div>
          <div class="cat">Plumbing</div>
        </div>
        <span class="status">Active</span>
      </div>
      <div class="row-bottom">
        <div class="price">$25 <span style="color:var(--muted); font-weight:500; font-size:0.85rem;">/ hour</span></div>
        <div class="actions">
          <button class="icon-btn edit" aria-label="Edit Plumbing Service">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"/><path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>
          </button>
          <button class="icon-btn delete" aria-label="Delete Plumbing Service">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
          </button>
        </div>
      </div>
    </div>

    <div class="service-card">
      <div class="row-top">
        <div>
          <div class="name">Electrical Repair</div>
          <div class="cat">Electrical</div>
        </div>
        <span class="status">Active</span>
      </div>
      <div class="row-bottom">
        <div class="price">$40 <span style="color:var(--muted); font-weight:500; font-size:0.85rem;">/ hour</span></div>
        <div class="actions">
          <button class="icon-btn edit" aria-label="Edit Electrical Repair">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"/><path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>
          </button>
          <button class="icon-btn delete" aria-label="Delete Electrical Repair">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
          </button>
        </div>
      </div>
    </div>

    <div class="service-card">
      <div class="row-top">
        <div>
          <div class="name">AC Repair</div>
          <div class="cat">Cleaning</div>
        </div>
        <span class="status">Active</span>
      </div>
      <div class="row-bottom">
        <div class="price">$45 <span style="color:var(--muted); font-weight:500; font-size:0.85rem;">/ hour</span></div>
        <div class="actions">
          <button class="icon-btn edit" aria-label="Edit AC Repair">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"/><path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>
          </button>
          <button class="icon-btn delete" aria-label="Delete AC Repair">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('style')
<style>
      :root{
    --blue:#2f5df5;
    --blue-dark:#274bd1;
    --ink:#151a2e;
    --muted:#8a8fa3;
    --line:#eef0f5;
    --green-bg:#e2f6ea;
    --green-text:#1f9d55;
    --red:#ef4444;
    --red-bg:#fdecec;
    --card:#ffffff;
    --page-bg:#eef1f7;
  }
 

 
  .panel{
    width:100%;
    max-width:1080px;
    background:var(--card);
    border-radius:20px;
    box-shadow:0 20px 45px -20px rgba(30,42,90,0.18), 0 2px 8px rgba(30,42,90,0.04);
    padding:36px 40px 20px;
  }
 
  .panel-header{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:16px;
    margin-bottom:28px;
    flex-wrap:wrap;
  }
 
  .panel-header h1{
    font-size:1.9rem;
    font-weight:800;
    color:var(--ink);
    margin:0;
    letter-spacing:-0.02em;
  }
 
  .add-btn{
    background:linear-gradient(180deg, var(--blue), var(--blue-dark));
    color:#fff;
    border:none;
    padding:12px 22px;
    border-radius:12px;
    font-size:0.95rem;
    font-weight:600;
    cursor:pointer;
    box-shadow:0 10px 20px -8px rgba(47,93,245,0.55);
    transition:transform .15s ease, box-shadow .15s ease;
    display:inline-flex;
    align-items:center;
    gap:8px;
  }
  .add-btn:hover{ transform:translateY(-1px); box-shadow:0 14px 24px -8px rgba(47,93,245,0.6); }
  .add-btn:active{ transform:translateY(0); }
  .add-btn svg{ width:16px; height:16px; }
 
  /* ===== Table (desktop) ===== */
  .table-wrap{
    border:1px solid var(--line);
    border-radius:16px;
    overflow:hidden;
  }
 
  table{
    width:100%;
    border-collapse:collapse;
  }
 
  thead th{
    background:#fbfbfd;
    text-align:left;
    font-size:0.85rem;
    font-weight:700;
    color:#333a4d;
    padding:16px 20px;
    border-bottom:1px solid var(--line);
  }
  thead th:last-child{ text-align:left; }
 
  tbody td{
    padding:20px;
    font-size:0.95rem;
    color:var(--ink);
    border-bottom:1px solid var(--line);
    vertical-align:middle;
  }
  tbody tr:last-child td{ border-bottom:none; }
  tbody tr{ transition:background .15s ease; }
  tbody tr:hover{ background:#fafbff; }
 
  .service-name{ font-weight:700; }
  .category{ color:var(--muted); font-weight:500; }
  .price{ font-weight:700; color:var(--ink); }
  .price span{ font-weight:500; color:var(--muted); font-size:0.85rem; }
 
  .status{
    display:inline-block;
    background:var(--green-bg);
    color:var(--green-text);
    font-size:0.8rem;
    font-weight:700;
    padding:6px 14px;
    border-radius:999px;
  }
 
  .actions{
    display:flex;
    gap:10px;
    align-items:center;
  }
 
  .icon-btn{
    width:34px;
    height:34px;
    border-radius:9px;
    border:1px solid var(--line);
    background:#fff;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    transition:transform .15s ease, background .15s ease, border-color .15s ease;
  }
  .icon-btn svg{ width:16px; height:16px; }
  .icon-btn.edit svg{ stroke:var(--ink); }
  .icon-btn.delete svg{ stroke:var(--red); }
  .icon-btn.edit:hover{ background:#f2f5ff; border-color:#cdd8ff; transform:translateY(-1px); }
  .icon-btn.delete:hover{ background:var(--red-bg); border-color:#f8c9c9; transform:translateY(-1px); }
 
  /* ===== Mobile card layout ===== */
  .cards{ display:none; }
 
  @media (max-width: 720px){
    .panel{ padding:24px 18px 16px; border-radius:16px; }
    .panel-header h1{ font-size:1.5rem; }
    .add-btn{ padding:10px 16px; font-size:0.88rem; }
 
    .table-wrap{ display:none; }
    .cards{ display:flex; flex-direction:column; gap:14px; }
 
    .service-card{
      border:1px solid var(--line);
      border-radius:14px;
      padding:16px 18px;
      display:flex;
      flex-direction:column;
      gap:10px;
      background:#fff;
    }
 
    .service-card .row-top{
      display:flex;
      justify-content:space-between;
      align-items:flex-start;
    }
 
    .service-card .name{
      font-weight:700;
      font-size:1.02rem;
      color:var(--ink);
    }
    .service-card .cat{
      color:var(--muted);
      font-size:0.85rem;
      margin-top:2px;
    }
 
    .service-card .row-mid{
      display:flex;
      justify-content:space-between;
      align-items:center;
    }
 
    .service-card .price{ font-size:1rem; }
 
    .service-card .row-bottom{
      display:flex;
      justify-content:space-between;
      align-items:center;
      padding-top:6px;
      border-top:1px solid var(--line);
    }
  }
 
  @media (max-width: 380px){
    .panel-header{ gap:12px; }
    .add-btn{ width:100%; justify-content:center; }
  }
</style>
@endpush