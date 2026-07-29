@extends('layouts.user')

@section('content')
<a class="skip-link" href="#main-content">Skip to service details</a>

<div class="app-shell">

  <!-- ============ App bar (navigation landmark) ============ -->
  <header class="app-header">
    <button type="button" class="icon-btn on-dark" aria-label="Go back to services list" onclick="history.back()">
      <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
    </button>
    <p class="header-title">Service Details</p>
    <div class="header-actions">
      <button type="button" class="icon-btn on-dark" aria-label="Share this service">
        <i class="fa-solid fa-share-nodes" aria-hidden="true"></i>
      </button>
      <button type="button" class="icon-btn on-dark" id="saveBtn" aria-pressed="false" aria-label="Save service to favorites">
        <i class="fa-regular fa-heart" aria-hidden="true"></i>
      </button>
    </div>
  </header>

  <nav class="breadcrumb-nav" aria-label="Breadcrumb">
    <ol>
      <li><a href="#">Home</a></li>
      <li><a href="#">Services</a></li>
      <li aria-current="page">{{ $service->title }}</li>
    </ol>
  </nav>

  <main id="main-content">

    <!-- ============ Service summary (grid area: hero) ============ -->
    <section class="service-summary section-hero" aria-labelledby="service-title">
      <div class="service-image-wrap">
        <img
          src="{{ asset('storage/images/service/'. $service->image) }}"
          alt="{{ $service->image }}">
      </div>

      <div class="service-summary-info">
        <h2 id="service-title">{{ $service->title }}</h2>
        <p class="service-price">
        ৳ {{ $service->price }} <span class="visually-hidden">starting price</span>
        </p>

        <div class="rating" role="img" aria-label="Rated 4.5 out of 5 from 20 reviews">
          <span class="stars" aria-hidden="true">★★★★☆</span>
          <span class="rating-text">4.5 (20 reviews)</span>
        </div>

        <p class="service-location">
          <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
          {{$provider->district}}
        </p>
      </div>
    </section>

    <!-- ============ About service (grid area: about) ============ -->
    <section class="section-about" aria-labelledby="about-heading">
      <h3 class="section-heading" id="about-heading">About Service</h3>
      <p class="about-copy" id="aboutCopy">
        {{ $service->description }}
      </p>
      <button type="button" class="link-toggle" id="aboutToggle" aria-expanded="false" aria-controls="aboutCopy">
        Read more
      </button>
    </section>

    <!-- ============ Provider information (grid area: aside, sticky at desktop) ============ -->
    <section class="section-provider" aria-labelledby="provider-heading">
      <h3 class="section-heading" id="provider-heading">Provider Information</h3>
<div class="provider-card">
  <div class="provider-details">
    <img class="provider-avatar"
         src="{{ asset('storage/images/profile/'. $provider->profile_image) }}"
         alt="{{ $user->name }}'s profile photo">
    <div>
      <p class="provider-name"><a href="#">{{ $user->name }}</a></p>
      <div class="rating" role="img" aria-label="Rated 5.0 out of 5 from 42 reviews" style="margin-bottom:0;">
        <span class="stars" aria-hidden="true">★★★★★</span>
        <span class="rating-text">5.0 (42 reviews)</span>
      </div>

      @if(!empty($provider->bio))
        <p class="provider-about">
          {{ \Illuminate\Support\Str::limit($provider->bio, 60) }}
        </p>
      @endif
    </div>
  </div>
  <div>
    <button type="button" class="btn-book" id="bookBtn" aria-busy="false" data-service="{{ $service->id }}">
      <span class="spinner" aria-hidden="true"></span>
      <span class="btn-label-default">Book Now</span>
      <span class="btn-label-loading">Booking…</span>
    </button>
    <p class="form-feedback" id="bookFeedback" role="status" aria-live="polite"></p>
  </div>
</div>
    </section>

    <!-- ============ Service reviews (grid area: reviews) ============ -->
    <section class="section-reviews" aria-labelledby="reviews-heading">
      <div class="reviews-toolbar">
        <h3 class="section-heading" id="reviews-heading">Service Reviews</h3>
        <a class="see-all" href="#">See all reviews</a>
      </div>

      <ul class="review-list" id="reviewList">
        <li class="review-item">
          <img class="review-avatar"
               src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&h=100&fit=crop"
               alt="">
          <div class="review-body">
            <p class="review-name">Sarah Johnson</p>
            <div class="rating" role="img" aria-label="Rated 5 out of 5">
              <span class="stars" aria-hidden="true">★★★★★</span>
            </div>
            <p class="review-text">
              Showed up on time and fixed the leak under our sink in under an hour. Explained everything clearly
              before starting. Would book again.
            </p>
          </div>
        </li>

        <li class="review-item">
          <img class="review-avatar"
               src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?w=100&h=100&fit=crop"
               alt="">
          <div class="review-body">
            <p class="review-name">Marcus Lee</p>
            <div class="rating" role="img" aria-label="Rated 4 out of 5">
              <span class="stars" aria-hidden="true">★★★★☆</span>
            </div>
            <p class="review-text">
              Good work overall, replaced an old valve without any mess. Arrived slightly later than the booked
              window but called ahead to let me know.
            </p>
          </div>
        </li>

        <li class="review-item" hidden>
          <img class="review-avatar"
               src="https://pbs.twimg.com/profile_images/1828452192107253760/LgHYdkkd_400x400.jpg"
               alt="">
          <div class="review-body">
            <p class="review-name">Shradha Khapra</p>
            <div class="rating" role="img" aria-label="Rated 5 out of 5">
              <span class="stars" aria-hidden="true">★★★★★</span>
            </div>
            <p class="review-text">
              Second time booking John for our building. Professional, tidy, and reasonably priced. Highly
              recommend for co-op and rental units.
            </p>
          </div>
        </li>
      </ul>

      <p class="empty-state" id="reviewsEmptyState">No reviews yet — be the first to book and share your experience.</p>

      <button type="button" class="btn-load-more" id="loadMoreBtn">Load more reviews</button>
    </section>

  </main>
</div>
@endsection

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>

:root{
  /* Typography */
  --font-family-primary: 'Manrope', -apple-system, BlinkMacSystemFont, sans-serif;
  --font-size-base: 16px;
  --font-weight-base: 400;
  --line-height-base: 25.6px;

  --font-size-xs: 15.2px;
  --font-size-sm: 16px;
  --font-size-md: 17.6px;
  --font-size-lg: 19.2px;
  --font-size-xl: 20px;
  --font-size-2xl: 20.8px;
  --font-size-3xl: 22.4px;
  --font-size-4xl: 24px;

  --font-weight-medium: 500;
  --font-weight-semibold: 600;
  --font-weight-bold: 700;

  /* Color — brand palette from DESIGN.md */
  --color-text-primary: #ffffff;   /* on dark surfaces */
  --color-text-secondary: #334155; /* body copy on light surfaces */
  --color-text-tertiary: #0f172a;  /* headings on light surfaces */
  --color-text-inverse: #343a40;   /* text on tinted surfaces */
  --color-surface-base: #000000;   /* dark chrome (app bar) */
  --color-surface-strong: #fefefe; /* card surfaces */

  /* Accent — derived from brand shadow hue (rgba(255,107,107,*)),
     shifted to a solid value that clears 4.5:1 against white text. */
  --color-accent: #d6302f;
  --color-accent-hover: #c0392b;
  --color-accent-active: #a5281f;
  --color-accent-disabled: #f1a8a1;
  --color-accent-tint: rgba(255,107,107,0.12);

  /* Semantic feedback (declared once, referenced everywhere) */
  --color-success: #1e7a34;
  --color-error: #b3261e;
  --color-error-tint: rgba(179,38,30,0.08);
  --color-border: rgba(15,23,42,0.10);
  --color-border-strong: rgba(15,23,42,0.18);

  /* Spacing scale */
  --space-1: 5px;
  --space-2: 8px;
  --space-3: 12px;
  --space-4: 14px;
  --space-5: 16px;
  --space-6: 24px;
  --space-7: 32px;
  --space-8: 40px;

  /* Radius */
  --radius-xs: 6px;
  --radius-sm: 12px;
  --radius-md: 20px;
  --radius-lg: 50px;

  /* Shadow */
  --shadow-1: rgba(15, 23, 42, 0.08) 0px 2px 8px 0px;
  --shadow-2: rgba(255, 107, 107, 0.25) 0px 4px 12px 0px;
  --shadow-3: rgba(255, 107, 107, 0.3) 0px 4px 16px 0px;
  --shadow-4: rgba(255, 107, 107, 0.4) 0px 6px 20px 0px;

  /* Motion */
  --motion-instant: 150ms;
  --motion-fast: 200ms;
  --motion-normal: 300ms;
  --motion-ease: cubic-bezier(0.2, 0, 0, 1);

  /* Responsive layout tokens — reference the spacing scale only,
     never introduce one-off values. Overridden per breakpoint below. */
  --shell-max-width: 480px;
  --shell-px: var(--space-5);
}

/* -------- Breakpoints: mobile (base) < 576 tablet-sm < 768 tablet < 992 desktop -------- */
@media (min-width: 576px){
  :root{ --shell-max-width: 620px; }
}
@media (min-width: 768px){
  :root{ --shell-max-width: 760px; --shell-px: var(--space-6); }
}
@media (min-width: 992px){
  :root{ --shell-max-width: 1120px; --shell-px: var(--space-8); }
}
@media (max-width: 359.98px){
  :root{ --shell-px: var(--space-3); }
  body{ padding: var(--space-5) var(--space-2); }
}

@media (prefers-reduced-motion: reduce){
  *{ animation-duration: 0.001ms !important; transition-duration: 0.001ms !important; }
}


/* Screen-reader-only utility */
.visually-hidden{
  position: absolute !important;
  width: 1px; height: 1px;
  padding: 0; margin: -1px;
  overflow: hidden;
  clip: rect(0,0,0,0);
  white-space: nowrap;
  border: 0;
}

/* Universal focus-visible rule — every interactive element must show it. */
a:focus-visible,
button:focus-visible,
[tabindex]:focus-visible{
  outline: 3px solid var(--color-text-tertiary);
  outline-offset: 2px;
  border-radius: var(--radius-xs);
}
/* On dark surfaces, the same-color ring would vanish — flip to white. */
.on-dark:focus-visible{
  outline-color: var(--color-text-primary);
}

.skip-link{
  position: absolute;
  top: -60px;
  left: var(--space-4);
  background: var(--color-surface-base);
  color: var(--color-text-primary);
  padding: var(--space-3) var(--space-5);
  border-radius: var(--radius-xs);
  z-index: 100;
  transition: top var(--motion-fast) var(--motion-ease);
}
.skip-link:focus{ top: var(--space-4); }

/* ============================================================
   LAYOUT SHELL — fluid card that scales across breakpoints
   ============================================================ */
.app-shell{
  max-width: var(--shell-max-width);
  margin: 0 auto;
  background: var(--color-surface-strong);
  border-radius: var(--radius-md);
  overflow: hidden;
  box-shadow: var(--shadow-1);
  transition: max-width var(--motion-normal) var(--motion-ease);
}

/* App bar — component: navigation (1) ------------------------ */
.app-header{
  background: var(--color-surface-base);
  color: var(--color-text-primary);
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: var(--space-3);
  padding: var(--shell-px);
}
.app-header .header-actions{ display:flex; gap: var(--space-2); }
.icon-btn{
  width: 44px; height: 44px; /* min touch target */
  border-radius: var(--radius-sm);
  border: 1px solid rgba(255,255,255,0.16);
  background: rgba(255,255,255,0.06);
  color: var(--color-text-primary);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-size: var(--font-size-lg);
  cursor: pointer;
  flex-shrink: 0;
  transition: background var(--motion-fast) var(--motion-ease),
              transform var(--motion-instant) var(--motion-ease);
}
.icon-btn:active{ transform: scale(0.96); background: rgba(255,255,255,0.2); }
.icon-btn[disabled]{ opacity: 0.4; cursor: not-allowed; }

.header-title{
  font-size: var(--font-size-lg);
  font-weight: var(--font-weight-semibold);
  color: var(--color-text-primary);
  margin: 0;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

/* Breadcrumb link row ----------------------------------------- */
.breadcrumb-nav{
  padding: var(--space-4) var(--shell-px) 0;
}
.breadcrumb-nav ol{
  list-style: none;
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-1);
  margin: 0; padding: 0;
  font-size: var(--font-size-xs);
  color: var(--color-text-inverse);
}
.breadcrumb-nav a{
  color: var(--color-text-inverse);
  text-decoration: none;
  border-radius: var(--radius-xs);
}
.breadcrumb-nav li:not(:last-child)::after{ content: "/"; margin: 0 var(--space-1); color: var(--color-border-strong); }
.breadcrumb-nav li[aria-current="page"]{ color: var(--color-text-tertiary); font-weight: var(--font-weight-medium); }

main{ padding: var(--shell-px); }

/* ============================================================
   SERVICE SUMMARY — component: card
   ============================================================ */
.service-summary{
  display: flex;
  flex-direction: column;
  gap: var(--space-4);
  margin-bottom: var(--space-6);
}
.service-image-wrap{
  border-radius: var(--radius-sm);
  overflow: hidden;
  aspect-ratio: 16 / 10;
  background: #e2e5ea;
  flex-shrink: 0;
}
.service-image-wrap img{
  width: 100%; height: 100%;
  object-fit: cover;
  display: block;
}

.service-summary-info h2{
  font-size: var(--font-size-3xl);
  font-weight: var(--font-weight-bold);
  color: var(--color-text-tertiary);
  margin: 0 0 var(--space-2);
}
.service-price{
  font-size: var(--font-size-2xl);
  font-weight: var(--font-weight-bold);
  color: var(--color-accent);
  margin: 0 0 var(--space-3);
}

.rating{
  display: inline-flex;
  align-items: center;
  gap: var(--space-2);
  margin-bottom: var(--space-3);
}
.rating .stars{
  color: var(--color-accent);
  font-size: var(--font-size-sm);
  letter-spacing: 2px;
}
.rating .rating-text{
  font-size: var(--font-size-xs);
  color: var(--color-text-inverse);
  font-weight: var(--font-weight-medium);
}

.service-location{
  display: flex;
  align-items: center;
  gap: var(--space-2);
  font-size: var(--font-size-sm);
  color: var(--color-text-inverse);
  margin: 0;
}
.service-location i{ color: var(--color-accent); }

/* ============================================================
   GENERIC SECTION HEADING
   ============================================================ */
main > section + section{ margin-top: var(--space-7); }
.section-heading{
  font-size: var(--font-size-xl);
  font-weight: var(--font-weight-bold);
  color: var(--color-text-tertiary);
  margin: 0 0 var(--space-4);
  padding-bottom: var(--space-3);
  border-bottom: 1px solid var(--color-border);
}

/* ============================================================
   ABOUT SERVICE — long-content handling
   ============================================================ */
.about-copy{
  font-size: var(--font-size-sm);
  color: var(--color-text-secondary);
  margin: 0 0 var(--space-3);
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
  max-width: 68ch; /* comfortable measure once columns get wide */
}
.about-copy.is-expanded{
  -webkit-line-clamp: unset;
  overflow: visible;
}
.link-toggle{
  background: none;
  border: none;
  padding: var(--space-1) 0;
  font-size: var(--font-size-sm);
  font-weight: var(--font-weight-semibold);
  color: var(--color-accent);
  cursor: pointer;
  border-radius: var(--radius-xs);
}
.link-toggle:active{ color: var(--color-accent-active); }

/* ============================================================
   PROVIDER INFORMATION — component: card
   ============================================================ */
.provider-card{
  display: flex;
  align-items: center;
  gap: var(--space-4);
  flex-wrap: wrap;
  background: var(--color-surface-strong);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-sm);
  padding: var(--space-5);
  box-shadow: var(--shadow-1);
}
.provider-avatar{
  width: 56px; height: 56px;
  border-radius: 50%;
  object-fit: cover;
  flex-shrink: 0;
}
.provider-details{ flex: 1 1 160px; min-width: 0; }
.provider-name{
  margin: 0 0 var(--space-1);
  font-size: var(--font-size-md);
  font-weight: var(--font-weight-semibold);
  color: var(--color-text-tertiary);
}
.provider-name a{
  color: inherit;
  text-decoration: none;
}

/* ============================================================
   BUTTON — Book Now
   States: default, hover, focus-visible, active, disabled, loading, error
   ============================================================ */
.btn-book{
  --_bg: var(--color-accent);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: var(--space-2);
  min-width: 140px;
  width: 100%;
  padding: var(--space-3) var(--space-6);
  background: var(--_bg);
  color: var(--color-text-primary);
  font-family: inherit;
  font-size: var(--font-size-sm);
  font-weight: var(--font-weight-semibold);
  border: none;
  border-radius: var(--radius-lg);
  cursor: pointer;
  box-shadow: var(--shadow-2);
  transition: background var(--motion-fast) var(--motion-ease),
              box-shadow var(--motion-fast) var(--motion-ease),
              transform var(--motion-instant) var(--motion-ease);
}
.btn-book:active{ background: var(--color-accent-active); box-shadow: var(--shadow-4); transform: translateY(1px); }
.btn-book[disabled]{
  background: var(--color-accent-disabled);
  box-shadow: none;
  cursor: not-allowed;
}
.btn-book[aria-busy="true"]{ cursor: progress; }
.btn-book .spinner{
  width: 14px; height: 14px;
  border-radius: 50%;
  border: 2px solid rgba(255,255,255,0.4);
  border-top-color: var(--color-text-primary);
  animation: spin var(--motion-normal) linear infinite;
  display: none;
}
.btn-book[aria-busy="true"] .spinner{ display: inline-block; }
.btn-book[aria-busy="true"] .btn-label-default,
.btn-book:not([aria-busy="true"]) .btn-label-loading{ display: none; }
@keyframes spin{ to{ transform: rotate(360deg); } }

.form-feedback{
  margin-top: var(--space-3);
  font-size: var(--font-size-xs);
  display: flex;
  align-items: center;
  gap: var(--space-2);
  border-radius: var(--radius-xs);
  padding: var(--space-2) var(--space-3);
}
.form-feedback[data-tone="success"]{ color: var(--color-success); background: rgba(30,122,52,0.08); }
.form-feedback[data-tone="error"]{ color: var(--color-error); background: var(--color-error-tint); }
.form-feedback:empty{ display: none; padding: 0; margin: 0; }

/* ============================================================
   REVIEWS — component: list
   ============================================================ */
.reviews-toolbar{
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: var(--space-3);
  margin-bottom: var(--space-4);
  padding-bottom: var(--space-3);
  border-bottom: 1px solid var(--color-border);
}
.reviews-toolbar .section-heading{ border: none; padding: 0; margin: 0; }
.reviews-toolbar .see-all{
  font-size: var(--font-size-xs);
  font-weight: var(--font-weight-semibold);
  color: var(--color-accent);
  text-decoration: none;
  border-radius: var(--radius-xs);
  flex-shrink: 0;
}

.review-list{
  list-style: none;
  margin: 0;
  padding: 0;
}
.review-item{
  display: flex;
  gap: var(--space-3);
  padding: var(--space-4) 0;
  border-bottom: 1px solid var(--color-border);
}
.review-item:last-of-type{ border-bottom: none; }
.review-item[hidden]{ display: none; }
.review-avatar{
  width: 40px; height: 40px;
  border-radius: 50%;
  object-fit: cover;
  flex-shrink: 0;
}
.review-body{ min-width: 0; }
.review-name{
  margin: 0 0 var(--space-1);
  font-size: var(--font-size-sm);
  font-weight: var(--font-weight-semibold);
  color: var(--color-text-tertiary);
}
.review-text{
  margin: var(--space-1) 0 0;
  font-size: var(--font-size-xs);
  color: var(--color-text-secondary);
  max-width: 62ch;
}

.empty-state{
  text-align: center;
  padding: var(--space-6) var(--space-4);
  border: 1px dashed var(--color-border-strong);
  border-radius: var(--radius-sm);
  color: var(--color-text-inverse);
  font-size: var(--font-size-sm);
  display: none;
}
.empty-state.is-visible{ display: block; }

.btn-load-more{
  width: 100%;
  margin-top: var(--space-3);
  padding: var(--space-3);
  background: transparent;
  border: 1px solid var(--color-border-strong);
  border-radius: var(--radius-sm);
  color: var(--color-text-tertiary);
  font-family: inherit;
  font-weight: var(--font-weight-semibold);
  font-size: var(--font-size-sm);
  cursor: pointer;
  transition: background var(--motion-fast) var(--motion-ease), border-color var(--motion-fast) var(--motion-ease);
}
.btn-load-more:active{ background: rgba(255,107,107,0.2); }
.btn-load-more[hidden]{ display: none; }

/* ============================================================
   HOVER — pointer-only. Never applied on touch, so a tap can't
   get stuck in a hover state on phones/tablets.
   ============================================================ */
@media (hover: hover) and (pointer: fine){
  .icon-btn:hover{ background: rgba(255,255,255,0.14); }
  .btn-book:hover{ background: var(--color-accent-hover); box-shadow: var(--shadow-3); }
  .link-toggle:hover{ color: var(--color-accent-hover); text-decoration: underline; }
  .btn-load-more:hover{ background: var(--color-accent-tint); border-color: var(--color-accent); }
  .breadcrumb-nav a:hover{ color: var(--color-accent); text-decoration: underline; }
  .provider-name a:hover{ color: var(--color-accent); text-decoration: underline; }
  .reviews-toolbar .see-all:hover{ color: var(--color-accent-hover); text-decoration: underline; }
}

/* ============================================================
   RESPONSIVE — tablet-sm (>=576px)
   Hero image moves beside the title/price/rating block.
   ============================================================ */
@media (min-width: 576px){
  .service-summary{ flex-direction: row; align-items: stretch; }
  .service-image-wrap{ flex: 0 0 44%; aspect-ratio: auto; }
  .service-summary-info{ flex: 1; padding-top: var(--space-1); }
  .provider-card{ flex-wrap: nowrap; }
}

/* ============================================================
   RESPONSIVE — tablet (>=768px)
   More breathing room, larger headline, capped image height.
   ============================================================ */
@media (min-width: 768px){
  .service-summary-info h2{ font-size: var(--font-size-4xl); }
  .service-image-wrap{ max-height: 300px; }
  .header-title{ font-size: var(--font-size-xl); }
  .review-item{ gap: var(--space-4); }
}

/* ============================================================
   RESPONSIVE — desktop (>=992px)
   Two-column layout: primary content + sticky booking sidebar.
   Reading order in the DOM stays hero → about → provider →
   reviews, so keyboard and screen-reader order is unaffected —
   only the visual placement changes via grid-area.
   ============================================================ */
@media (min-width: 992px){
  main{
    display: grid;
    grid-template-columns: 1fr 360px;
    grid-template-areas:
      "hero   hero"
      "about  aside"
      "reviews aside";
    column-gap: var(--space-8);
    row-gap: var(--space-8);
  }
  main > section{ margin-top: 0; }

  .section-hero{ grid-area: hero; margin-bottom: 0; }
  .section-about{ grid-area: about; }
  .section-provider{ grid-area: aside; align-self: start; position: sticky; top: var(--space-6); }
  .section-reviews{ grid-area: reviews; }

  .service-image-wrap{ max-height: 340px; }

  .provider-card{
    flex-direction: column;
    align-items: stretch;
    text-align: left;
  }
  .provider-details{ display: flex; align-items: center; gap: var(--space-3); }
  .provider-avatar{ width: 48px; height: 48px; }
}

@media (min-width: 1280px){
  :root{ --shell-max-width: 1180px; }
  .service-image-wrap{ max-height: 380px; }
}
</style>
@endpush

@push('scripts')

<script>
  // -------- About Service: read more / read less (long-content) --------
  const aboutCopy = document.getElementById('aboutCopy');
  const aboutToggle = document.getElementById('aboutToggle');
  aboutToggle.addEventListener('click', () => {
    const expanded = aboutCopy.classList.toggle('is-expanded');
    aboutToggle.setAttribute('aria-expanded', String(expanded));
    aboutToggle.textContent = expanded ? 'Read less' : 'Read more';
  });

  // -------- Save / favorite toggle (pointer + keyboard via native button) --------
  const saveBtn = document.getElementById('saveBtn');
  saveBtn.addEventListener('click', () => {
    const pressed = saveBtn.getAttribute('aria-pressed') === 'true';
    saveBtn.setAttribute('aria-pressed', String(!pressed));
    saveBtn.setAttribute('aria-label', !pressed ? 'Remove service from favorites' : 'Save service to favorites');
    saveBtn.querySelector('i').className = !pressed ? 'fa-solid fa-heart' : 'fa-regular fa-heart';
  });

  // -------- Book Now: default / loading / success / error states --------
  const bookBtn = document.getElementById('bookBtn');
  const bookFeedback = document.getElementById('bookFeedback');

  bookBtn.addEventListener('click', () => {

    const serviceId = bookBtn.dataset.service
    bookBtn.disabled = true;
    bookBtn.setAttribute('aria-busy', 'true');
    bookFeedback.textContent = '';
    bookFeedback.removeAttribute('data-tone');

    window.setTimeout(() => {
      const succeeded = Math.random() > 0.2; // demo only
      bookBtn.setAttribute('aria-busy', 'false');
      bookBtn.disabled = false;

      const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
     
      fetch('/user/booking-service', {
        method: 'POST',
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": token
        },
        body: JSON.stringify({
          'service_id' : serviceId
        })
        })
        .then(function(response){
          return response.json()
        }).then(function(result){

      if (result.status == 200) {
        bookFeedback.dataset.tone = 'success';
        bookFeedback.innerHTML = '<i class="fa-solid fa-circle-check" aria-hidden="true"></i> Booking request sent successfully';
      } else {
        bookFeedback.dataset.tone = 'error';
        bookFeedback.setAttribute('role', 'alert');
        bookFeedback.innerHTML = '<i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i> Booking failed. Please try again.';
      }

        })
     
    }, 1200);
  });

  // -------- Reviews: load more (overflow handling) --------
  const loadMoreBtn = document.getElementById('loadMoreBtn');
  loadMoreBtn.addEventListener('click', () => {
    document.querySelectorAll('#reviewList .review-item[hidden]').forEach(item => item.removeAttribute('hidden'));
    loadMoreBtn.setAttribute('hidden', '');
  });

  // -------- Empty-state demonstration (no live data source on this static page) --------
  // If a real data source returns zero reviews, toggle this instead of rendering the list.
  const reviewList = document.getElementById('reviewList');
  const emptyState = document.getElementById('reviewsEmptyState');
  if (reviewList.children.length === 0) {
    emptyState.classList.add('is-visible');
    loadMoreBtn.setAttribute('hidden', '');
  }
</script>

@endpush

