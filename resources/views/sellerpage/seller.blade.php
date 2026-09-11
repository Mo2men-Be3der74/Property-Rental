<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PropertyHub &mdash; Seller Dashboard</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    >
    <link rel="stylesheet" href="{{ asset('checkout/assets/css/seller.css') }}">
</head>
<body>
    <nav class="seller-navbar">
        <div class="nav-container">
            <a href="{{ url('/') }}" class="nav-brand">
                <div class="brand-icon">
                    <i class="fa-solid fa-building-user"></i>
                </div>
                <span class="brand-name">PropertyHub</span>
            </a>
            <div class="nav-search">
                <div class="search-input-wrapper">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search properties, guests..." aria-label="Search properties">
                    <span class="search-kbd">⌘K</span>
                </div>
            </div>
            <div class="nav-actions">
                <a href="#" class="nav-link">Explore</a>
                <a href="{{route('seller.create')}}" class="nav-link">Become a Host</a>
                <a href="{{ route('seller.index') }}" class="nav-link">Seller Hub</a>
                <div class="superhost-badge">
                    <span class="dot-green"></span>
                    <span>Superhost Active</span>
                </div>
                <a href="#" class="icon-btn" title="Saved Favorites" aria-label="Saved Favorites">
                    <i class="fa-regular fa-heart"></i>
                </a>
                <a href="#" class="icon-btn" title="Notifications" aria-label="Notifications">
                    <i class="fa-regular fa-bell"></i>
                    <span class="notification-dot"></span>
                </a>

                <div class="nav-profile">
                    <img
                        src="{{ asset($user->img) }}"
                        alt="{{ $user->name }}"
                        class="profile-avatar"
                        onerror="this.style.display='none';"
                    >
                    <div class="profile-info">
                        <span class="profile-name">{{ $user->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="dashboard-content">

        <section class="dashboard-hero">
            <div class="hero-left">
                <h1 class="hero-title">Welcome back, {{ $user->name }}</h1>
                <p class="hero-subtitle">
                    Manage your properties, view booking requests, and track your revenue across your architectural residences.
                </p>
            </div>

            <div class="hero-actions">
                <button type="button" class="btn-secondary-custom">
                    <i class="fa-solid fa-arrow-down-to-bracket"></i>
                    <span>Export Report</span>
                </button>
                <a href="{{ route('seller.create') }}" class="btn-primary-custom">
                    <i class="fa-solid fa-plus"></i>
                    <span>New Listing</span>
                </a>
            </div>
        </section>

        <section class="managed-listings-card">
            <div class="listings-header">
                <div class="listings-title-group">
                    <h2>Active &amp; Managed Listings</h2>
                    <p>Real-time rates and occupancy indicators.</p>
                </div>
            </div>
            <div class="listings-table-container">
                <table class="listings-table">
                    <thead>
                        <tr>
                            <th style="width: 60%;">PROPERTY</th>
                            <th style="width: 25%;">MONTHLY RATE</th>
                            <th style="width: 15%; text-align: right;">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($flats as $flat)
                            <tr>
                                <td>
                                    <div class="property-info-cell">
                                        <img
                                            src="{{ $flat->photo_url }}"
                                            alt="{{ $flat->category }}"
                                            class="property-thumb"
                                        >
                                        <div class="property-details">
                                            <span class="property-name">
                                                {{ $flat->category }}
                                            </span>
                                            <div class="property-specs">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <span>{{ $flat->location }} &bull; {{ $flat->size }} m²</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="rate-cell">
                                        ${{ number_format($flat->price_per_month, 0) }} <span class="period">/mo</span>
                                    </div>
                                </td>
                                <td class="action-cell">
                                    <div class="action-buttons-group">
                                        <a href="{{ route('seller.edit', ['flat' => $flat->flat_id]) }}" class="action-menu-btn edit-btn" title="Edit Listing" aria-label="Edit Listing">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('seller.destroy', ['flat' => $flat->flat_id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this listing');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-menu-btn delete-btn" title="Delete Listing" aria-label="Delete Listing">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" style="text-align: center; padding: 3.5rem 1rem; color: #78716C;">
                                    <div style="display: flex; flex-direction: column; align-items: center; gap: 0.75rem;">
                                        <div style="width: 48px; height: 48px; border-radius: 50%; background: #F8F7F5; display: flex; align-items: center; justify-content: center; color: #A8A29E; font-size: 1.25rem;">
                                            <i class="fa-solid fa-house"></i>
                                        </div>
                                        <div style="font-weight: 700; color: #1A1A1A;">No properties uploaded yet</div>
                                        <div style="font-size: 0.8125rem;">You haven't added any listings under your account yet.</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="listings-footer">
                <span class="showing-count">Showing {{ $flats->count() }} of {{ $flats->count() }} active properties</span>
                <a href="#" class="view-all-link">
                    <span>View All Listings in Seller Hub</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </section>

    </main>

    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-brand-col">
                    <a href="{{ url('/') }}" class="footer-brand">
                        <div class="brand-icon">
                            <i class="fa-solid fa-building-user"></i>
                        </div>
                        <span class="brand-name">PropertyHub</span>
                    </a>
                    <p class="footer-desc">
                        Curated architectural residences and bespoke sanctuaries designed for modern living. Tailored editorial real estate for discerning guests and premier hosts.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link" title="Instagram">IG</a>
                        <a href="#" class="social-link" title="Twitter / X">TW</a>
                        <a href="#" class="social-link" title="LinkedIn">LN</a>
                    </div>
                </div>

                <div class="footer-col">
                    <h3>Company</h3>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Journal</a></li>
                        <li><a href="#">Investor Relations</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Legal &amp; Trust</h3>
                    <ul class="footer-links">
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Trust &amp; Safety</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Host Care</h3>
                    <div class="host-care-box">
                        <span class="direct-line-label">DIRECT LINE</span>
                        <span class="direct-line-number">+1 (800) 492-HOST</span>
                        <div class="support-status">
                            <span class="dot-green"></span>
                            <span>24/7 Priority Support</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="copyright-text">
                    &copy; 2026 PropertyHub Technologies Inc. Curated real estate &amp; editorial residences. All rights reserved.
                </div>
                <div class="footer-preferences">
                    <a href="#" class="pref-item">
                        <i class="fa-solid fa-globe"></i>
                        <span>English (US)</span>
                    </a>
                    <a href="#" class="pref-item">
                        <span>USD ($)</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
