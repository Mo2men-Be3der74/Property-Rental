<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PropertyHub - Find a place you'll love to call home</title>

    <!-- Bootstrap CSS v5 Utility Classes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Custom CSS Stylesheet matching seller dashboard -->
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


            <div class="nav-actions">
                <a href="#" class="nav-link">Home</a>
                <a href="{{ route('search') }}" class="nav-link">Search</a>
                <a href="#explore-section" class="nav-link">Explore</a>
                <a href="{{ route('seller.index') }}" class="nav-link">Become a Seller</a>
                <a href="#" class="icon-btn" title="Notifications">
                    <i class="fa-regular fa-bell"></i>
                    <span class="notification-dot"></span>
                </a>
                <a href="#" class="nav-profile">
                    <div class="profile-info">
                        <span class="profile-name"></span>
                        <span class="profile-role">Pro Host</span>
                    </div>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Homepage Content Layout -->
    <main class="home-main-container">

        <!-- Hero Showcase Section -->
        <section class="hero-showcase-section">
            <div class="hero-text-content">
                <div class="badge-tag-pill">
                    <i class="fa-solid fa-sparkles"></i> A better way to find your next home
                </div>
                <h1 class="hero-main-title">
                    Find a place you'll love to <span>call home.</span>
                </h1>
                <p class="hero-description">
                    Discover quality homes, apartments, and stays in places that inspire you. Every property is verified, every search is made simple.
                </p>
                <div class="hero-features-list">
                    <div class="feature-check-item">
                        <i class="fa-solid fa-circle-check"></i> Verified listings
                    </div>
                    <div class="feature-check-item">
                        <i class="fa-solid fa-circle-check"></i> Secure booking
                    </div>
                </div>
            </div>

            <div class="hero-image-preview">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&auto=format&fit=crop&q=80" alt="Featured Home">
                <div class="hero-image-badge">FEATURED HOME • The Willow Residence</div>
            </div>
        </section>

    
        <!-- Featured Properties Section -->
        <section id="explore-section" class="d-flex flex-column gap-3">
            <div class="section-header-flex">
                <div class="section-titles">
                    <span class="section-tag-sub">HANDPICKED FOR YOU</span>
                    <h2 class="section-main-heading">Featured Properties</h2>
                </div>
            </div>

            <!-- Cards Row (Flexbox) -->
            <div class="cards-flex-row">
                @foreach ($flats as $flat)
                <a href="{{ route('checkout.details', $flat->flat_id) }}" class="property-card-item" >
                    <div class="card-img-container">
                        <span class="card-badge-pill">{{ ($flat->category)}}</span>
                        <img src="{{  $flat->img ? asset($flat->img) : asset('images/default-flat.jpg') }}" alt="{{ $flat->owner_id }}">
                    </div>
                    <div class="card-content-body">
                        <div><span> {{ $flat->location }} </span></div>
                        <div class="card-specs-row">
                             <div><span>{{ $flat->size }}</span> <span> m²</span></div>
                        </div>
                        <div class="card-footer-row">
                            <div class="card-price-text"><span>Price: </span>{{ $flat->price_per_month }} <span> /month</span></div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

        <!-- Why Trust PropertyHub Section -->
        <div class="why-trust-container">
            <div class="why-trust-header">
                <span class="section-tag-sub">A LITTLE MORE PEACE OF MIND</span>
                <h2 class="section-main-heading">Why Trust PropertyHub?</h2>
            </div>
            <div class="trust-features-row">
                <div class="trust-feature-col">
                    <div class="trust-icon-box"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3 class="trust-feature-title">Verified Properties</h3>
                    <p class="trust-feature-desc">Every listing is reviewed for quality and accuracy.</p>
                </div>
                <div class="trust-feature-col">
                    <div class="trust-icon-box"><i class="fa-solid fa-lock"></i></div>
                    <h3 class="trust-feature-title">Secure Booking</h3>
                    <p class="trust-feature-desc">Your payment and personal information stay protected.</p>
                </div>
                <div class="trust-feature-col">
                    <div class="trust-icon-box"><i class="fa-solid fa-user-check"></i></div>
                    <h3 class="trust-feature-title">Trusted Sellers</h3>
                    <p class="trust-feature-desc">Connect with responsive, vetted property owners.</p>
                </div>
                <div class="trust-feature-col">
                    <div class="trust-icon-box"><i class="fa-solid fa-headset"></i></div>
                    <h3 class="trust-feature-title">24/7 Support</h3>
                    <p class="trust-feature-desc">Our friendly team is always ready to help.</p>
                </div>
            </div>
        </div>

    </main>

    <!-- Unified Dark Footer Component -->
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-grid-flex">
                <div class="footer-brand-col">
                    <a href="{{ url('/') }}" class="footer-brand">
                        <div class="brand-icon">
                            <i class="fa-solid fa-building-user"></i>
                        </div>
                        <span class="brand-name">PropertyHub</span>
                    </a>
                    <p class="footer-desc">A better way to find a place you’ll love to call home.</p>
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

                <div class="footer-col" style="flex: 1.2;">
                    <h3>Follow along</h3>
                    <p class="footer-desc mb-3" style="font-size: 0.75rem;">Made for finding better places.</p>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="copyright-text">© {{ date('Y') }} PropertyHub. All rights reserved.</div>
                <div class="footer-preferences">
                    <a href="#" class="pref-item"><i class="fa-solid fa-globe"></i> English (US)</a>
                    <a href="#" class="pref-item"><i class="fa-solid fa-dollar-sign"></i> USD</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
