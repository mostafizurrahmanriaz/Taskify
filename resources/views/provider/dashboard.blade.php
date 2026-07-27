@extends('layouts.provider')

@section('content')
    <header class="page-header">
      <h1>Dashboard</h1>
      <p>Track your services and respond to new bookings.</p>
    </header>

    <!-- ==================== STAT CARDS ==================== -->
    <section aria-label="Account summary">
      <div class="stat-grid">

        <a class="stat-card" href="#">
          <span class="stat-card__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <rect x="3" y="7" width="18" height="13" rx="2"></rect>
              <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
            </svg>
          </span>
          <span class="stat-card__body">
            <span class="stat-card__label">Total Services</span>
            <span class="stat-card__value">12</span>
          </span>
        </a>

        <a class="stat-card" href="#">
          <span class="stat-card__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <rect x="3" y="4" width="18" height="17" rx="2"></rect>
              <path d="M3 9h18M8 2v4M16 2v4"></path>
            </svg>
          </span>
          <span class="stat-card__body">
            <span class="stat-card__label">Total Bookings</span>
            <span class="stat-card__value">148</span>
          </span>
        </a>

        <a class="stat-card" href="#">
          <span class="stat-card__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <circle cx="12" cy="12" r="9"></circle>
              <path d="M8 12.5l2.5 2.5L16 9.5"></path>
            </svg>
          </span>
          <span class="stat-card__body">
            <span class="stat-card__label">Completed Jobs</span>
            <span class="stat-card__value">132</span>
          </span>
        </a>

      </div>
    </section>

    <!-- ==================== RECENT BOOKINGS ==================== -->
    <section class="panel" aria-labelledby="recent-bookings-heading">
      <div class="panel__header">
        <h2 id="recent-bookings-heading">Recent Bookings</h2>
      </div>

      <ul class="booking-list">
        <li>
          <a class="booking-item" href="#">
            <span class="booking-item__info">
              <span class="booking-item__service">Deep Home Cleaning — 3BR Apartment</span>
              <span class="booking-item__date">Jul 25, 2026</span>
            </span>
            <span class="badge badge--pending">
              <svg class="badge__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="12" cy="12" r="9"></circle>
                <path d="M12 7v5l3 3"></path>
              </svg>
              Pending
            </span>
          </a>
        </li>
        <li>
          <a class="booking-item" href="#">
            <span class="booking-item__info">
              <span class="booking-item__service">AC Repair &amp; Gas Refill</span>
              <span class="booking-item__date">Jul 23, 2026</span>
            </span>
            <span class="badge badge--accepted">
              <svg class="badge__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="12" cy="12" r="9"></circle>
                <path d="M8 12.5l2.5 2.5L16 9.5"></path>
              </svg>
              Accepted
            </span>
          </a>
        </li>
        <li>
          <a class="booking-item" href="#">
            <span class="booking-item__info">
              <span class="booking-item__service">Bathroom Plumbing Fix</span>
              <span class="booking-item__date">Jul 20, 2026</span>
            </span>
            <span class="badge badge--completed">
              <svg class="badge__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="12" cy="12" r="10" fill="currentColor" stroke="none"></circle>
                <path d="M8 12.5l2.5 2.5L16 9.5" stroke="#000000" stroke-width="2"></path>
              </svg>
              Completed
            </span>
          </a>
        </li>
      </ul>
    </section>

    <!-- ==================== COMPONENT STATES REFERENCE ==================== -->
    <section class="showcase" aria-labelledby="showcase-heading">
      <h2 id="showcase-heading">Component States Reference</h2>
      <p>Hover, focus-visible, and active are live via CSS pseudo-classes above — tab through the sidebar and cards to see them. Disabled, loading, and error can't be triggered without a backend, so they're rendered explicitly below for review.</p>

      <div class="showcase__group">
        <h3>Stat card — disabled, loading, error</h3>
        <div class="showcase__row">
          <div class="showcase__cell">
            <span class="showcase__cell-label">Disabled (plan-gated stat)</span>
            <div class="stat-card is-disabled" aria-disabled="true">
              <span class="stat-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <rect x="3" y="11" width="18" height="10" rx="2"></rect>
                  <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
              </span>
              <span class="stat-card__body">
                <span class="stat-card__label">Repeat Clients</span>
                <span class="stat-card__value">Upgrade to view</span>
              </span>
            </div>
          </div>

          <div class="showcase__cell">
            <span class="showcase__cell-label">Loading</span>
            <div class="stat-card is-loading" aria-busy="true">
              <span class="stat-card__icon"></span>
              <span class="stat-card__skeleton-body">
                <span class="skeleton-line skeleton-line--label"></span>
                <span class="skeleton-line skeleton-line--value"></span>
              </span>
            </div>
          </div>

          <div class="showcase__cell">
            <span class="showcase__cell-label">Error</span>
            <div class="stat-card is-error">
              <span class="stat-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M12 3l10 18H2L12 3z"></path>
                  <path d="M12 10v4M12 17h.01"></path>
                </svg>
              </span>
              <span>
                <span class="stat-card__error-text">Couldn't load</span><br />
                <button class="stat-card__retry" type="button">Retry</button>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="showcase__group">
        <h3>Booking row — loading, error, empty</h3>
        <div class="panel">
          <div class="booking-item is-loading" aria-busy="true">
            <span class="booking-item__info">
              <span class="skeleton-line skeleton-line--label"></span>
            </span>
          </div>
          <div class="booking-item booking-item--error-row" role="alert">
            Bookings couldn't load.
            <button class="retry-btn" type="button">Retry</button>
          </div>
          <div class="empty-state">
            <p>No bookings yet.</p>
            <p>Bookings will appear here as customers book your services.</p>
          </div>
        </div>
      </div>

      <div class="showcase__group">
        <h3>Status badges — grayscale-safe by icon + label</h3>
        <div class="showcase__row">
          <span class="badge badge--pending">
            <svg class="badge__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 3"></path></svg>
            Pending
          </span>
          <span class="badge badge--accepted">
            <svg class="badge__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M8 12.5l2.5 2.5L16 9.5"></path></svg>
            Accepted
          </span>
          <span class="badge badge--completed">
            <svg class="badge__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10" fill="currentColor" stroke="none"></circle><path d="M8 12.5l2.5 2.5L16 9.5" stroke="#000000" stroke-width="2"></path></svg>
            Completed
          </span>
          <span class="badge badge--error">
            <svg class="badge__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3l10 18H2L12 3z"></path><path d="M12 10v4M12 17h.01"></path></svg>
            Sync failed
          </span>
        </div>
      </div>

    </section>
@endsection