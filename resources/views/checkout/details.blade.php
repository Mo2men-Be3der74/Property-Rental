<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    >
    <link rel="stylesheet" href="{{asset('checkout/assets/css/details.css')}}">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <link rel="stylesheet" href="{{ asset('checkout/assets/css/seller.css') }}">
    <title>PropertyHub &mdash; Checkout Details</title>
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
                <a href="{{route('home')}}" class="nav-link">Explore</a>
                <a href="{{route('seller.create')}}" class="nav-link">Become a Host</a>
                <a href="{{route('seller.index')}}" class="nav-link">Seller Hub</a>
                <a href="{{ route('profile.index') }}" class="nav-profile">
                    <img
                        src="{{ asset($user->img) }}"
                        alt="{{ $user->name }}"
                        class="profile-avatar"
                        onerror="this.style.display='none';"
                    >
                    <div class="profile-info">
                        <span class="profile-name">{{ $user->name }}</span>
                    </div>
                </a>
            </div>
        </div>
    </nav>
    <div class="header">
        <div class="back">
            <a href="#"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="title">
            <h1>Checkout</h1>
            <div class="small">Review your details before completing this secure reservation.</div>
        </div>

    </div>
    <div class="content">
        <div class="title-card">
            {{-- <img src="{{''}}" alt="{{flat->location}}"> --}}
            <div class="location"><i class="fa-solid fa-location-pin"></i> {{$flat->location}}</div>
            <div class="size"><i class="fa-solid fa-ruler"></i> {{$flat->size}} m^2</div>
        </div>


        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class='alert alert-danger'>{{$error}}</div>
            @endforeach
        @endif


        <div class="your-information">
            <h2>Your Information</h2>
            <form action="{{route('checkout.payment', ['flat' => $flat->flat_id])}}" method="post">
                @csrf
                <div class="name">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="John Doe" value="{{ Auth::user()->name }}">
                </div>
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="M5oNt@example.com" value="{{ Auth::user()->email }}">
                </div>
                <div class="phone">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" placeholder="123-456-7890" value="{{ Auth::user()->phone }}">
                </div>
                <div class="start">
                    <label for="start">Start Date</label>
                    <input type="date" name="start_date" id="start">
                </div>
                <div class="end">
                    <label for="end">End Date</label>
                    <input type="date" name="end_date" id="end">
                </div>
                <div class="submit">
                    <button type="submit">Confirm Reservation</button>
                </div>
            </form>
        </div>
    </div>

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
    <script src="{{asset('checkout/assets/js/details.js')}}"></script>
</body>
</html>
