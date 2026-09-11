<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PropertyHub &mdash; Add New Property</title>
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
                <h1 class="hero-title">Add New Property Listing</h1>
                <p class="hero-subtitle">
                    Upload your residence details, set monthly rates, and showcase architectural photography.
                </p>
            </div>

            <div class="hero-actions">
                <a href="{{ route('seller.index') }}" class="btn-secondary-custom">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back to Dashboard</span>
                </a>
            </div>
        </section>

        <section class="form-card">
            @if ($errors->any())
                <div class="alert-errors">
                    <strong>Please fix the following errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="addPropertyForm" action="{{ route('seller.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-section-title">General Information</div>
                <div class="form-section-subtitle">Specify category and location of the residence</div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="category" class="form-label">
                            Category / Title <span class="required">*</span>
                        </label>
                        <div class="input-icon-wrap">
                            <i class="fa-solid fa-house"></i>
                            <input
                                type="text"
                                name="category"
                                id="category"
                                class="form-input"
                                placeholder="e.g. Modern Apartment or Luxury Villa"
                                value="{{ old('category') }}"
                                required
                            >
                        </div>
                        <span class="input-error-msg" id="category_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="location" class="form-label">
                            Location <span class="required">*</span>
                        </label>
                        <div class="input-icon-wrap">
                            <i class="fa-solid fa-location-dot"></i>
                            <input
                                type="text"
                                name="location"
                                id="location"
                                class="form-input"
                                placeholder="e.g. Country, City"
                                value="{{ old('location') }}"
                                required
                            >
                        </div>
                        <span class="input-error-msg" id="location_error"></span>
                    </div>
                </div>

                <div class="form-section-title">Pricing & Dimensions</div>
                <div class="form-section-subtitle">Set size in square meters and monthly rate in USD</div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="size" class="form-label">
                            Size (m²) <span class="required">*</span>
                        </label>
                        <div class="input-icon-wrap">
                            <i class="fa-solid fa-ruler-combined"></i>
                            <input
                                type="number"
                                step="0.01"
                                name="size"
                                id="size"
                                class="form-input"
                                placeholder="e.g. 180.5"
                                value="{{ old('size') }}"
                                required
                            >
                        </div>
                        <span class="input-error-msg" id="size_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="price_per_month" class="form-label">
                            Monthly Rate ($ USD) <span class="required">*</span>
                        </label>
                        <div class="input-icon-wrap">
                            <i class="fa-solid fa-dollar-sign"></i>
                            <input
                                type="number"
                                step="0.01"
                                name="price_per_month"
                                id="price_per_month"
                                class="form-input"
                                placeholder="e.g. 6450"
                                value="{{ old('price_per_month') }}"
                                required
                            >
                        </div>
                        <span class="input-error-msg" id="price_per_month_error"></span>
                    </div>
                </div>

                <div class="form-section-title">Property Photography</div>
                <div class="form-section-subtitle">Upload high quality cover image for the listing</div>

                <div class="form-group">
                    <label for="img_file" class="file-dropzone" id="dropzoneContainer">
                        <div class="dropzone-icon">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                        </div>
                        <div class="dropzone-text" id="dropzoneText">Click to browse or drop property photo here</div>
                        <div class="dropzone-hint">Supports JPEG, PNG, JPG, WEBP (Max 5MB)</div>
                        <input
                            type="file"
                            name="img"
                            id="img_file"
                            class="hidden-file-input"
                            accept="image/*"
                            required
                        >
                    </label>
                    <span class="input-error-msg" id="img_error"></span>
                </div>

                <div class="form-submit-row">
                    <a href="{{ route('seller.index') }}" class="btn-cancel">Cancel</a>
                    <button type="submit" class="btn-submit">
                        <i class="fa-solid fa-plus"></i>
                        <span>Publish Listing</span>
                    </button>
                </div>
            </form>
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

    <script src="{{ asset('checkout/assets/js/seller-form.js') }}"></script>
</body>
</html>

