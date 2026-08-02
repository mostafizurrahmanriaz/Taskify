<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name='csrf-token' content={{ csrf_token() }} />
<title>Dashboard — Taskify Provider</title>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="/css/provider-dashboard.css" />
@stack('style')
</head>
<body>

<a class="skip-link" href="#main-content">Skip to main content</a>

<header class="mobile-topbar">
  <button class="hamburger-btn" type="button" id="menuToggle" aria-expanded="false" aria-controls="primarySidebar" aria-label="Open navigation menu">
    <svg class="hamburger-btn__icon hamburger-btn__icon--open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
      <path d="M3 6h18M3 12h18M3 18h18"></path>
    </svg>
    <svg class="hamburger-btn__icon hamburger-btn__icon--close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
      <path d="M6 6l12 12M18 6L6 18"></path>
    </svg>
  </button>
  <span class="mobile-topbar__brand">Taskify</span>
</header>

<div class="sidebar-backdrop" id="sidebarBackdrop" aria-hidden="true"></div>

<div class="app-shell">

  <!-- ==================== SIDEBAR NAVIGATION ==================== -->
  <nav class="sidebar" aria-label="Primary" id="primarySidebar">
    <div class="sidebar__top">
      <div class="sidebar__brand">Taskify</div>
      <button class="sidebar__close-btn" type="button" id="menuClose" aria-label="Close navigation menu">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M6 6l12 12M18 6L6 18"></path>
        </svg>
      </button>
    </div>

    <ul class="sidebar__nav">
      <li>
        <a class="nav-link" href="{{ route('provider.dashboard') }}" aria-current="page">
          <svg class="nav-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="3" y="3" width="7" height="9" rx="1.5"></rect>
            <rect x="14" y="3" width="7" height="5" rx="1.5"></rect>
            <rect x="14" y="12" width="7" height="9" rx="1.5"></rect>
            <rect x="3" y="16" width="7" height="5" rx="1.5"></rect>
          </svg>
          <span class="nav-link__label">Dashboard</span>
        </a>
      </li>
      <li>
        <a class="nav-link" href="{{ route('provider.services') }}">
          <svg class="nav-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="3" y="7" width="18" height="13" rx="2"></rect>
            <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
          </svg>
          <span class="nav-link__label">My Services</span>
        </a>
      </li>
      <li>
        <a class="nav-link" href="{{ route('provider.services.create') }}">
          <svg class="nav-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="12" cy="12" r="9"></circle>
            <path d="M12 8v8M8 12h8"></path>
          </svg>
          <span class="nav-link__label">Add Service</span>
        </a>
      </li>
      <li>
        <a class="nav-link" href="{{ route('provider.bookings') }}">
          <svg class="nav-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="3" y="4" width="18" height="17" rx="2"></rect>
            <path d="M3 9h18M8 2v4M16 2v4"></path>
          </svg>
          <span class="nav-link__label">Bookings</span>
        </a>
      </li>
      <li>
        <a class="nav-link" href="#">
          <svg class="nav-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="12" cy="8" r="4"></circle>
            <path d="M4 21c0-4 3.6-7 8-7s8 3 8 7"></path>
          </svg>
          <span class="nav-link__label">Profile</span>
        </a>
      </li>
    </ul>

    <div class="sidebar__logout-wrap">
      <a class="nav-link" href="#">
        <svg class="nav-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
          <path d="M10 17l5-5-5-5M15 12H3"></path>
        </svg>
       <span class="nav-link__label" onclick="window.location.href='/logout'">Logout</span>
      </a>
    </div>
  </nav>

  <!-- ==================== MAIN CONTENT ==================== -->
  <main class="main" id="main-content">
    @yield('content')
  </main>
</div>


<script>
  (function () {
    var sidebar = document.getElementById('primarySidebar');
    var backdrop = document.getElementById('sidebarBackdrop');
    var openBtn = document.getElementById('menuToggle');
    var closeBtn = document.getElementById('menuClose');
    var mobileQuery = window.matchMedia('(max-width: 767px)');

    function focusableItems() {
      return sidebar.querySelectorAll('a[href], button:not([disabled])');
    }

    function onKeydown(e) {
      if (e.key === 'Escape') {
        closeDrawer();
        return;
      }
      if (e.key === 'Tab') {
        var items = focusableItems();
        if (!items.length) return;
        var first = items[0];
        var last = items[items.length - 1];
        if (e.shiftKey && document.activeElement === first) {
          e.preventDefault();
          last.focus();
        } else if (!e.shiftKey && document.activeElement === last) {
          e.preventDefault();
          first.focus();
        }
      }
    }

    function openDrawer() {
      sidebar.classList.add('is-open');
      backdrop.classList.add('is-visible');
      openBtn.setAttribute('aria-expanded', 'true');
      sidebar.removeAttribute('inert');
      document.body.classList.add('no-scroll');
      document.addEventListener('keydown', onKeydown);
      if (closeBtn) closeBtn.focus();
    }

    function closeDrawer(options) {
      var returnFocus = !options || options.returnFocus !== false;
      sidebar.classList.remove('is-open');
      backdrop.classList.remove('is-visible');
      openBtn.setAttribute('aria-expanded', 'false');
      document.body.classList.remove('no-scroll');
      document.removeEventListener('keydown', onKeydown);
      if (mobileQuery.matches) {
        sidebar.setAttribute('inert', '');
      }
      if (returnFocus) openBtn.focus();
    }

    openBtn.addEventListener('click', function () {
      if (sidebar.classList.contains('is-open')) {
        closeDrawer();
      } else {
        openDrawer();
      }
    });

    closeBtn.addEventListener('click', function () {
      closeDrawer();
    });

    backdrop.addEventListener('click', function () {
      closeDrawer();
    });

    sidebar.querySelectorAll('.nav-link').forEach(function (link) {
      link.addEventListener('click', function () {
        if (mobileQuery.matches) closeDrawer({ returnFocus: false });
      });
    });

    function syncForViewport() {
      if (mobileQuery.matches) {
        if (!sidebar.classList.contains('is-open')) {
          sidebar.setAttribute('inert', '');
        }
      } else {
        sidebar.removeAttribute('inert');
        sidebar.classList.remove('is-open');
        backdrop.classList.remove('is-visible');
        openBtn.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('no-scroll');
      }
    }

    syncForViewport();
    mobileQuery.addEventListener('change', syncForViewport);
  })();
</script>
@stack('scripts')
</body>
</html>
