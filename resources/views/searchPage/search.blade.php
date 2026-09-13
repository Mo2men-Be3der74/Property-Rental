<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Results - PropertyHub</title>
    
    <!-- Bootstrap CSS v5 Utility Classes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Custom CSS Stylesheet matching home dashboard -->
    <link rel="stylesheet" href="{{ asset('home/assets/css/home.css') }}">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar Section -->
    <nav class="seller-navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="nav-brand">
                <div class="brand-icon">
                    <i class="fa-solid fa-building-user"></i>
                </div>
                <span class="brand-name">PropertyHub</span>
            </a>

            <div class="nav-search">
                <div class="search-input-wrapper">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" value="Dubai">
                    <span class="search-kbd">⌘K</span>
                </div>
            </div>

            <div class="nav-actions">
                <a href="{{ route('search') }}" class="nav-link active">Search</a>
                <a href="{{ route('home') }}#explore-section" class="nav-link">Explore</a>
                <a href="{{ route('seller.index') }}" class="nav-link">Become a Seller</a>
                <a href="#" class="icon-btn" title="Notifications">
                    <i class="fa-regular fa-bell"></i>
                    <span class="notification-dot"></span>
                </a>
                <a href="#" class="nav-profile">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80" alt="Profile" class="profile-avatar">
                    <div class="profile-info">
                        <span class="profile-name">Sarah Jenkins</span>
                        <span class="profile-role">Pro Host</span>
                    </div>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Search Content Layout -->
    <main class="home-main-container">

        <!-- Breadcrumbs & Header Details -->
        <div class="d-flex flex-column gap-3">
            <div style="font-size: 13px; color: #78716C; font-weight: 600;">
                <a href="{{ route('home') }}" style="color: inherit; text-decoration: none;">Home</a> 
                <span class="mx-2">›</span> 
                <span style="color: #1A1A1A;">Search results</span>
            </div>

            <div class="d-flex justify-content-between align-items-end flex-wrap gap-3">
                <div>
                    <span class="section-tag-sub">YOUR SEARCH</span>
                    <h1 class="hero-main-title mt-1" style="font-size: 38px;">Homes in Dubai</h1>
                    <p class="text-muted mt-1" style="font-size: 14px; font-weight: 600;">
                        324 properties found <span class="mx-2">•</span> Move in Jun 15 <span class="mx-2">-</span> Jun 30 <span class="mx-2">•</span> 2 guests
                    </p>
                </div>
                <button class="btn btn-outline-dark px-3 py-2 rounded-3 fw-bold" style="font-size: 13px; border-color: #E7E5E4;">
                    <i class="fa-regular fa-map me-2"></i> Show map
                </button>
            </div>

            <!-- Active Filter Pills -->
            <div class="d-flex align-items-center gap-2 flex-wrap mt-2">
                <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-bold" style="font-size: 12px; background-color: #FFF2EC !important; color: #FF8A4D !important; border-color: #FFD6C2 !important;">
                    Dubai <i class="fa-solid fa-xmark ms-1 cursor-pointer"></i>
                </span>
                <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-bold" style="font-size: 12px; background-color: #FFF2EC !important; color: #FF8A4D !important; border-color: #FFD6C2 !important;">
                    Apartment <i class="fa-solid fa-xmark ms-1 cursor-pointer"></i>
                </span>
                <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-bold" style="font-size: 12px; background-color: #FFF2EC !important; color: #FF8A4D !important; border-color: #FFD6C2 !important;">
                    2+ bedrooms <i class="fa-solid fa-xmark ms-1 cursor-pointer"></i>
                </span>
                <a href="#" class="text-decoration-none fw-bold text-dark ms-2" style="font-size: 13px;">Clear all</a>
            </div>
        </div>

        <hr style="border-color: #E7E5E4; margin: 10px 0;">

        <!-- Main Results Grid Area (Sidebar filters + Cards) -->
        <div class="row g-4">
            <!-- Sidebar Refine Filters -->
            <div class="col-lg-3">
                <div class="p-4 rounded-4 bg-white border" style="border-color: #E7E5E4 !important;">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0" style="font-size: 16px;">Refine results</h5>
                        <a href="#" class="text-decoration-none text-muted fw-bold" style="font-size: 12px;">Reset</a>
                    </div>

                    <!-- Property Type Filter -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-uppercase text-muted" style="font-size: 11px; letter-spacing: 0.5px;">Property type</label>
                        <div class="d-flex flex-column gap-2 mt-2">
                            <label class="d-flex justify-content-between align-items-center fw-semibold" style="font-size: 13px;">
                                <span><input type="checkbox" checked class="form-check-input me-2"> Apartment</span>
                                <span class="text-muted" style="font-size: 11px;">182</span>
                            </label>
                            <label class="d-flex justify-content-between align-items-center fw-semibold" style="font-size: 13px;">
                                <span><input type="checkbox" checked class="form-check-input me-2"> Villa</span>
                                <span class="text-muted" style="font-size: 11px;">64</span>
                            </label>
                            <label class="d-flex justify-content-between align-items-center fw-semibold" style="font-size: 13px;">
                                <span><input type="checkbox" class="form-check-input me-2"> House</span>
                                <span class="text-muted" style="font-size: 11px;">48</span>
                            </label>
                        </div>
                    </div>

                    <!-- Bedrooms Filter -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-uppercase text-muted" style="font-size: 11px; letter-spacing: 0.5px;">Bedrooms</label>
                        <div class="d-flex gap-1 mt-2">
                            <button class="btn btn-sm btn-light border flex-grow-1 fw-bold" style="font-size: 12px;">Any</button>
                            <button class="btn btn-sm btn-light border flex-grow-1 fw-bold" style="font-size: 12px;">1+</button>
                            <button class="btn btn-sm btn-primary flex-grow-1 fw-bold" style="font-size: 12px; background-color: #FF8A4D; border-color: #FF8A4D;">2+</button>
                            <button class="btn btn-sm btn-light border flex-grow-1 fw-bold" style="font-size: 12px;">3+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Property Results List -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted fw-semibold" style="font-size: 13px;">Showing 1-12 of 324 homes</span>
                    <div class="d-flex align-items-center gap-2">
                        <span class="text-muted fw-semibold" style="font-size: 13px;">Sort by</span>
                        <select class="form-select form-select-sm fw-bold rounded-3" style="width: 140px; font-size: 13px;">
                            <option>Newest listed</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Highest rated</option>
                        </select>
                    </div>
                </div>

                <!-- Grid Cards Container -->
                <div class="row g-4">
                    <!-- Card 1 -->
                    <div class="col-md-4">
                        <div class="property-card-item h-100 w-100">
                            <div class="card-img-container" style="height: 180px;">
                                <span class="card-badge-pill">Apartment</span>
                                <button class="card-favorite-btn"><i class="fa-regular fa-heart"></i></button>
                                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=600&auto=format&fit=crop&q=80" alt="Property">
                            </div>
                            <div class="card-content-body">
                                <div class="card-info-group">
                                    <a href="#" class="card-property-title">The Willow Residence</a>
                                    <span class="card-property-location"><i class="fa-solid fa-location-dot"></i> Palm Jumeirah, Dubai</span>
                                </div>
                                <div class="card-specs-row">
                                    <span>2 beds</span> • <span>2 baths</span> • <span>1,240 sq ft</span>
                                </div>
                                <div class="card-footer-row">
                                    <div class="card-price-text">$2,850 <span>/ month</span></div>
                                    <div class="card-rating-badge"><i class="fa-solid fa-star"></i> 4.9 <span class="text-muted">(124)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-4">
                        <div class="property-card-item h-100 w-100">
                            <div class="card-img-container" style="height: 180px;">
                                <span class="card-badge-pill">Apartment</span>
                                <button class="card-favorite-btn"><i class="fa-regular fa-heart"></i></button>
                                <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=600&auto=format&fit=crop&q=80" alt="Property">
                            </div>
                            <div class="card-content-body">
                                <div class="card-info-group">
                                    <a href="#" class="card-property-title">Marina View Suite</a>
                                    <span class="card-property-location"><i class="fa-solid fa-location-dot"></i> Dubai Marina, Dubai</span>
                                </div>
                                <div class="card-specs-row">
                                    <span>2 beds</span> • <span>2 baths</span> • <span>1,180 sq ft</span>
                                </div>
                                <div class="card-footer-row">
                                    <div class="card-price-text">$3,200 <span>/ month</span></div>
                                    <div class="card-rating-badge"><i class="fa-solid fa-star"></i> 4.8 <span class="text-muted">(89)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-4">
                        <div class="property-card-item h-100 w-100">
                            <div class="card-img-container" style="height: 180px;">
                                <span class="card-badge-pill">House</span>
                                <button class="card-favorite-btn"><i class="fa-regular fa-heart"></i></button>
                                <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=600&auto=format&fit=crop&q=80" alt="Property">
                            </div>
                            <div class="card-content-body">
                                <div class="card-info-group">
                                    <a href="#" class="card-property-title">Palm Grove House</a>
                                    <span class="card-property-location"><i class="fa-solid fa-location-dot"></i> Jumeirah Village, Dubai</span>
                                </div>
                                <div class="card-specs-row">
                                    <span>3 beds</span> • <span>2 baths</span> • <span>2,100 sq ft</span>
                                </div>
                                <div class="card-footer-row">
                                    <div class="card-price-text">$3,900 <span>/ month</span></div>
                                    <div class="card-rating-badge"><i class="fa-solid fa-star"></i> 4.7 <span class="text-muted">(61)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Unified Site Footer Section -->
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-grid-flex">
                <div class="footer-brand-col">
                    <a href="{{ route('home') }}" class="footer-brand">
                        <div class="brand-icon">
                            <i class="fa-solid fa-house"></i>
                        </div>
                        <span class="brand-name">PropertyHub</span>
                    </a>
                    <p class="footer-desc">A better way to find a place you'll love to call home.</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>

                <div class="footer-col">
                    <h3>Company</h3>
                    <ul class="footer-links">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Become a seller</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Support</h3>
                    <ul class="footer-links">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="copyright-text">&copy; 2026 PropertyHub. All rights reserved.</div>
                <div class="footer-preferences">
                    <span class="pref-item">Made for finding better places</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>