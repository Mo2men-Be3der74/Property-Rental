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

            <div class="nav-actions">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('search') }}" class="nav-link">Search</a>
                <a href="{{ route('home') }}#explore-section" class="nav-link">Explore</a>
                <a href="{{ route('seller.index') }}" class="nav-link">Become a Seller</a>
                <a href="#" class="icon-btn" title="Notifications">
                    <i class="fa-regular fa-bell"></i>
                    <span class="notification-dot"></span>
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
        </div>

        <!-- Search Form -->
<form id="locationSearchForm" action="{{ url('/search') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" 
               id="locationInput" 
               name="location" 
               value="{{ request('location') }}" 
               placeholder="Search by location (e.g., Dubai)..." 
               class="form-control form-control-lg rounded-start-3">
        
        <button type="submit" class="btn btn-dark px-4 rounded-end-3 fw-semibold">
            <i class="fa-solid fa-search me-1"></i> Search
        </button>
    </div>
    <!-- JavaScript Error Message Container -->
    <div id="jsError" class="text-danger mt-2" style="font-size: 12px; display: none;">
        Please enter a valid location before searching.
    </div>
</form>



        <hr style="border-color: #E7E5E4; margin: 20px 0;">

        <!-- Single Comprehensive Form wrapping both Sidebar and Results Grid -->
        <form action="{{ url('/search') }}" method="GET" class="row g-4">
            <div>

                <!-- Display Dynamic Results Grid -->
                <div class="row g-4">
                    @forelse ($flats ?? [] as $flat)
                        <div class="col-md-4">
                            <a href="{{ route('checkout.details', $flat->flat_id ?? 1) }}" class="text-decoration-none text-dark">
                                <div class="property-card-item h-100 w-100 bg-white border rounded-4 overflow-hidden shadow-sm">
                                    <div class="card-img-container position-relative" style="height: 180px;">
                                        <span class="card-badge-pill position-absolute top-0 start-0 m-2 badge bg-dark text-white">{{ ucfirst($flat->category ?? 'Penthouse') }}</span>
                                        <button type="button" class="card-favorite-btn position-absolute top-0 end-0 m-2 btn btn-light btn-sm rounded-circle"><i class="fa-regular fa-heart"></i></button>
                                        <img src="{{ $flat->img ? asset($flat->img) : asset('images/default-flat.jpg') }}" alt="Property" class="w-100 h-100 object-fit-cover">
                                    </div>
                                    <div class="p-3">
                                        <h6 class="fw-bold mb-1" style="font-size: 14px;">{{ $flat->location ?? 'Dubai' }}</h6>
                                        <p class="text-muted mb-0 fw-semibold" style="font-size: 13px;">${{ $flat->price_per_month ?? '0' }} / month</p>
                                        <span class="text-muted" style="font-size: 11px;">Size: {{ $flat->size ?? 'N/A' }} m²</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="p-5 text-center bg-white border rounded-4 text-muted">
                                <p class="mb-0 fw-semibold">No properties found matching your criteria.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Render Pagination Navigation Links with Bootstrap 5 Styling -->
                @if (isset($flats) && method_exists($flats, 'links'))
                    <div class="pagination-wrapper mt-4 d-flex justify-content-center">
                        {{ $flats->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>

        </form>

    </main>

    <!-- Unified Site Footer Section -->
    <footer class="site-footer mt-auto">
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
                        <li><a href="{{ route('seller.index') }}">Become a seller</a></li>
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
                <div class="copyright-text">&copy; {{ date('Y') }} PropertyHub. All rights reserved.</div>
                <div class="footer-preferences">
                    <span class="pref-item">Made for finding better places</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    !-- JavaScript Validation -->
    <script>
        document.getElementById('locationSearchForm').addEventListener('submit', function(event) {
            const inputField = document.getElementById('locationInput');
            const errorDiv = document.getElementById('jsError');
            
            // Trim whitespace to ensure users don't just type spaces
            if (inputField.value.trim() === '') {
                event.preventDefault(); // Stop the form from submitting
                errorDiv.style.display = 'block'; // Show error text
                inputField.classList.add('is-invalid'); // Add Bootstrap red border
            } else {
                errorDiv.style.display = 'none';
                inputField.classList.remove('is-invalid');
            }
        });
    </script>
</body>
</html>