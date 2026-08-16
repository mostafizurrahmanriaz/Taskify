@extends('layouts.provider')

@section('content')

<header class="page-header">
    <h1>Dashboard</h1>
    <p>Track your services and respond to new bookings.</p>
</header>


{{-- =========================================================
     STAT CARDS
========================================================= --}}
<section class="dashboard-section" aria-label="Account summary">

    <div class="stat-grid">

        {{-- Total Services --}}
        <a class="stat-card" href="{{ route('provider.services') }}">

            <span class="stat-card__icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <rect x="3" y="7" width="18" height="13" rx="2"></rect>
                    <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                </svg>
            </span>

            <span class="stat-card__body">
                <span class="stat-card__label">Total Services</span>
                <span class="stat-card__value">{{ $total_services }}</span>
            </span>

        </a>


        {{-- Total Bookings --}}
        <a class="stat-card" href="{{ route('provider.bookings') }}">

            <span class="stat-card__icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <rect x="3" y="4" width="18" height="17" rx="2"></rect>
                    <path d="M3 9h18M8 2v4M16 2v4"></path>
                </svg>
            </span>

            <span class="stat-card__body">
                <span class="stat-card__label">Total Bookings</span>
                <span class="stat-card__value">{{ $total_bookings }}</span>
            </span>

        </a>


        {{-- Completed Jobs --}}
        <a class="stat-card" href="{{ route('provider.bookings') }}?status=completed">

            <span class="stat-card__icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M8 12.5l2.5 2.5L16 9.5"></path>
                </svg>
            </span>

            <span class="stat-card__body">
                <span class="stat-card__label">Completed Jobs</span>
                <span class="stat-card__value">{{ $total_completed }}</span>
            </span>

        </a>

    </div>

</section>


{{-- =========================================================
     RECENT BOOKINGS
========================================================= --}}
<section class="dashboard-panel" aria-labelledby="recent-bookings-heading">

    <div class="dashboard-panel__header">
        <div>
            <h2 id="recent-bookings-heading">Recent Bookings</h2>
            <p>Latest booking requests from your customers.</p>
        </div>

        <a href="{{ route('provider.bookings') }}" class="panel-link">
            View all
            <span aria-hidden="true">→</span>
        </a>
    </div>


    @if($bookings->isNotEmpty())

        <ul class="booking-list">

            @foreach ($bookings as $booking)

                <li class="booking-list__item">

                    <a class="booking-item"
                       href="{{ route('provider.booking.view', $booking->id) }}">

                        <span class="booking-item__info">

                            <span class="booking-item__service">
                                {{ $booking->service->title }}
                            </span>

                            <span class="booking-item__date">
                                {{ $booking->created_at->format('M d, Y') }}
                            </span>

                        </span>


                        {{-- Status --}}
                        @if($booking->status === 'pending')

                            <span class="booking-status booking-status--pending">
                                <svg viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     aria-hidden="true">
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M12 7v5l3 3"></path>
                                </svg>
                                Pending
                            </span>

                        @elseif($booking->status === 'accepted')

                            <span class="booking-status booking-status--accepted">
                                <svg viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     aria-hidden="true">
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M8 12.5l2.5 2.5L16 9.5"></path>
                                </svg>
                                Accepted
                            </span>

                        @elseif($booking->status === 'completed')

                            <span class="booking-status booking-status--completed">
                                <svg viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     aria-hidden="true">
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M8 12.5l2.5 2.5L16 9.5"></path>
                                </svg>
                                Completed
                            </span>

                        @elseif($booking->status === 'rejected')

                            <span class="booking-status booking-status--rejected">
                                <svg viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     aria-hidden="true">
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M9 9l6 6M15 9l-6 6"></path>
                                </svg>
                                Rejected
                            </span>

                        @endif

                    </a>

                </li>

            @endforeach

        </ul>

    @else

        <div class="booking-empty">
            <div class="booking-empty__icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round"
                     aria-hidden="true">
                    <rect x="3" y="4" width="18" height="17" rx="2"></rect>
                    <path d="M3 9h18M8 2v4M16 2v4"></path>
                </svg>
            </div>

            <h3>No bookings yet</h3>
            <p>
                Bookings will appear here when customers book your services.
            </p>

            <a href="{{ route('provider.services.create') }}"
               class="empty-action">
                Add a Service
            </a>
        </div>

    @endif

</section>


{{-- =========================================================
     QUICK ACTIONS
========================================================= --}}
<section class="quick-actions">

    <div class="quick-actions-header">

        <div>
            <h2>Quick Actions</h2>
            <p>Manage your services and bookings from one place.</p>
        </div>

    </div>


    <div class="quick-actions-grid">

        {{-- Add Service --}}
        <a href="{{ route('provider.services.create') }}"
           class="quick-action-card">

            <span class="quick-action-icon">
                <i class="bi bi-plus-lg"></i>
            </span>

            <span class="quick-action-content">
                <span class="quick-action-title">Add New Service</span>
                <span class="quick-action-description">
                    Create a new service for customers to discover.
                </span>
            </span>

            <span class="quick-action-arrow" aria-hidden="true">
                <i class="bi bi-arrow-right"></i>
            </span>

        </a>


        {{-- My Services --}}
        <a href="{{ route('provider.services') }}"
           class="quick-action-card">

            <span class="quick-action-icon">
                <i class="bi bi-briefcase"></i>
            </span>

            <span class="quick-action-content">
                <span class="quick-action-title">My Services</span>
                <span class="quick-action-description">
                    View and manage all your services.
                </span>
            </span>

            <span class="quick-action-arrow" aria-hidden="true">
                <i class="bi bi-arrow-right"></i>
            </span>

        </a>


        {{-- Bookings --}}
        <a href="{{ route('provider.bookings') }}"
           class="quick-action-card">

            <span class="quick-action-icon">
                <i class="bi bi-calendar-check"></i>
            </span>

            <span class="quick-action-content">
                <span class="quick-action-title">View Bookings</span>
                <span class="quick-action-description">
                    Review customer requests and manage bookings.
                </span>
            </span>

            <span class="quick-action-arrow" aria-hidden="true">
                <i class="bi bi-arrow-right"></i>
            </span>

        </a>

    </div>

</section>


{{-- =========================================================
     SMALL DASHBOARD FOOTER
========================================================= --}}
<footer class="dashboard-footer">

    <span>© {{ date('Y') }} Taskify</span>

    <span>Provider Dashboard</span>

</footer>

@endsection


@push('style')

<style>

/* =========================================================
   PAGE HEADER
========================================================= */

.page-header {
    margin-bottom: 28px;
}

.page-header h1 {
    margin: 0 0 6px;
    color: #0f172a;
    font-size: 28px;
    font-weight: 700;
}

.page-header p {
    margin: 0;
    color: #64748b;
    font-size: 15px;
}


/* =========================================================
   GENERAL SECTION
========================================================= */

.dashboard-section {
    margin-bottom: 24px;
}


/* =========================================================
   STAT CARDS
========================================================= */

.stat-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 20px;
}

.stat-card {
    display: flex;
    align-items: center;
    gap: 16px;

    min-height: 108px;
    padding: 22px;

    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;

    color: #0f172a;
    text-decoration: none;

    box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);

    transition:
        transform 0.25s ease,
        border-color 0.25s ease,
        box-shadow 0.25s ease;
}

.stat-card:hover {
    transform: translateY(-3px);
    border-color: #ff6b6b;
    box-shadow: 0 10px 24px rgba(255, 107, 107, 0.10);
    color: #0f172a;
}

.stat-card:focus-visible,
.quick-action-card:focus-visible,
.booking-item:focus-visible,
.panel-link:focus-visible,
.empty-action:focus-visible {
    outline: 3px solid rgba(255, 107, 107, 0.35);
    outline-offset: 3px;
}

.stat-card__icon {
    width: 46px;
    height: 46px;
    min-width: 46px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f8fafc;
    border-radius: 12px;

    color: #0f172a;
}

.stat-card__icon svg {
    width: 22px;
    height: 22px;
}

.stat-card__body {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.stat-card__label {
    font-size: 14px;
    color: #334155;
}

.stat-card__value {
    font-size: 23px;
    line-height: 1;
    font-weight: 700;
    color: #0f172a;
}


/* =========================================================
   PANEL
========================================================= */

.dashboard-panel {
    margin-top: 24px;

    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;

    overflow: hidden;

    box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
}

.dashboard-panel__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;

    padding: 20px 24px;

    border-bottom: 1px solid #e5e7eb;
}

.dashboard-panel__header h2 {
    margin: 0 0 4px;

    color: #0f172a;
    font-size: 19px;
    font-weight: 600;
}

.dashboard-panel__header p {
    margin: 0;

    color: #64748b;
    font-size: 13px;
}

.panel-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;

    color: #ff6b6b;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
}

.panel-link:hover {
    color: #e8534f;
}


/* =========================================================
   BOOKING LIST
========================================================= */

.booking-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.booking-list__item {
    border-bottom: 1px solid #e5e7eb;
}

.booking-list__item:last-child {
    border-bottom: none;
}

.booking-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;

    padding: 20px 24px;

    color: #0f172a;
    text-decoration: none;

    transition: background-color 0.2s ease;
}

.booking-item:hover {
    background: #fffafa;
    color: #0f172a;
}

.booking-item__info {
    display: flex;
    flex-direction: column;
    gap: 5px;
    min-width: 0;
}

.booking-item__service {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;

    color: #0f172a;
    font-size: 15px;
    font-weight: 600;
}

.booking-item__date {
    color: #64748b;
    font-size: 13px;
}


/* =========================================================
   BOOKING STATUS
========================================================= */

.booking-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;

    padding: 8px 13px;

    border-radius: 999px;

    font-size: 13px;
    font-weight: 500;

    white-space: nowrap;
}

.booking-status svg {
    width: 15px;
    height: 15px;
}

.booking-status--pending {
    background: #fff1f2;
    color: #be123c;
}

.booking-status--accepted {
    background: #f1f5f9;
    color: #334155;
}

.booking-status--completed {
    background: #000000;
    color: #ffffff;
}

.booking-status--rejected {
    background: #fee2e2;
    color: #b91c1c;
}


/* =========================================================
   EMPTY BOOKING STATE
========================================================= */

.booking-empty {
    padding: 48px 24px;
    text-align: center;
}

.booking-empty__icon {
    width: 52px;
    height: 52px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin: 0 auto 14px;

    background: #f8fafc;
    border-radius: 14px;

    color: #64748b;
}

.booking-empty__icon svg {
    width: 24px;
    height: 24px;
}

.booking-empty h3 {
    margin: 0 0 6px;

    color: #0f172a;
    font-size: 17px;
    font-weight: 600;
}

.booking-empty p {
    margin: 0 0 18px;

    color: #64748b;
    font-size: 14px;
}

.empty-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 10px 18px;

    background: #ff6b6b;
    color: #ffffff;

    border-radius: 999px;

    font-size: 14px;
    font-weight: 600;
    text-decoration: none;

    transition: background-color 0.2s ease;
}

.empty-action:hover {
    background: #e8534f;
    color: #ffffff;
}


/* =========================================================
   QUICK ACTIONS
========================================================= */

.quick-actions {
    margin-top: 24px;
    padding: 24px;

    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;

    box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
}

.quick-actions-header {
    margin-bottom: 18px;
}

.quick-actions-header h2 {
    margin: 0 0 5px;

    color: #0f172a;
    font-size: 19px;
    font-weight: 600;
}

.quick-actions-header p {
    margin: 0;

    color: #64748b;
    font-size: 13px;
}

.quick-actions-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 14px;
}

.quick-action-card {
    position: relative;

    display: flex;
    align-items: center;
    gap: 13px;

    min-height: 96px;
    padding: 17px;

    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;

    color: #0f172a;
    text-decoration: none;

    transition:
        transform 0.25s ease,
        border-color 0.25s ease,
        box-shadow 0.25s ease;
}

.quick-action-card:hover {
    transform: translateY(-3px);

    border-color: #ff6b6b;

    box-shadow: 0 8px 20px rgba(255, 107, 107, 0.10);

    color: #0f172a;
}

.quick-action-icon {
    width: 44px;
    height: 44px;
    min-width: 44px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 11px;

    background: rgba(255, 107, 107, 0.10);
    color: #ff6b6b;

    font-size: 18px;
}

.quick-action-content {
    min-width: 0;
    padding-right: 20px;
}

.quick-action-title {
    display: block;

    margin-bottom: 4px;

    color: #0f172a;
    font-size: 14px;
    font-weight: 600;
}

.quick-action-description {
    display: block;

    color: #64748b;
    font-size: 12.5px;
    line-height: 1.45;
}

.quick-action-arrow {
    position: absolute;
    right: 16px;

    color: #94a3b8;

    transition:
        transform 0.2s ease,
        color 0.2s ease;
}

.quick-action-card:hover .quick-action-arrow {
    color: #ff6b6b;
    transform: translateX(3px);
}


/* =========================================================
   FOOTER
========================================================= */

.dashboard-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;

    margin-top: 32px;
    padding: 18px 2px 8px;

    border-top: 1px solid #e5e7eb;

    color: #64748b;
    font-size: 12px;
}

.dashboard-footer-right {
    color: #94a3b8;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1000px) {

    .stat-grid,
    .quick-actions-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

}

@media (max-width: 700px) {

    .stat-grid,
    .quick-actions-grid {
        grid-template-columns: 1fr;
    }

    .dashboard-panel__header {
        align-items: flex-start;
    }

    .booking-item {
        align-items: flex-start;
    }

    .booking-status {
        margin-top: 2px;
    }

}

@media (max-width: 500px) {

    .page-header h1 {
        font-size: 24px;
    }

    .stat-card {
        min-height: 96px;
        padding: 18px;
    }

    .dashboard-panel__header,
    .booking-item,
    .quick-actions {
        padding-left: 18px;
        padding-right: 18px;
    }

    .booking-item {
        gap: 12px;
    }

    .booking-item__service {
        white-space: normal;
    }

    .dashboard-footer {
        flex-direction: column;
        align-items: flex-start;
    }

}

</style>

@endpush