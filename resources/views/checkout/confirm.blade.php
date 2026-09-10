<!DOCTYPE html>
<html lang="{{ str_replace(''_'', ''-'', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertyHub &mdash; Booking Confirmed</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset(''checkout/assets/css/checkout.css'') }}">
</head>
<body>

<!-- Navigation -->
<header class="nav-header">
    <div class="nav-inner">
        <a href="{{ url(''/'') }}" class="nav-logo">Property<span>Hub</span></a>
        <ul class="nav-links">
            <li><a href="#">Search</a></li>
            <li><a href="#">Explore</a></li>
            <li><a href="#">Become a Seller</a></li>
        </ul>
    </div>
</header>

<!-- Page Hero -->
<section class="page-hero">
    <div class="page-hero-inner">
        <div class="hero-row">
            <div>
                <p class="hero-eyebrow" style="color:#059669;">Booking confirmed</p>
                <h1 class="hero-title">You&apos;re all set!</h1>
                <p class="hero-subtitle">Your reservation has been confirmed. Check your email for details.</p>
            </div>
            <div class="step-indicator">
                <span class="step-circle done">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="14" height="14">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </span>
                <span class="step-label">Details</span>
                <span class="step-line"></span>
                <span class="step-circle done">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="14" height="14">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </span>
                <span class="step-label">Payment</span>
                <span class="step-line"></span>
                <span class="step-circle active">3</span>
                <span class="step-label">Confirmation</span>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="checkout-grid">

    <main class="checkout-main">

        <!-- Success Card -->
        <div class="success-card">
            <div class="success-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </div>
            <p class="success-eyebrow">Booking Confirmed</p>
            <h2 class="success-title">{{ $property->name }}</h2>
            <p class="success-sub">
                Your reservation has been successfully confirmed.
                @if($booking[''guest_name''])
                    Thank you, <strong>{{ $booking[''guest_name''] }}</strong>!
                @endif
                A confirmation email has been sent to your inbox with all the details.
            </p>
            <div class="ref-badge">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                </svg>
                Booking ref:&nbsp;<strong>{{ $booking[''reference''] }}</strong>
            </div>

            <!-- Stay Overview -->
            <div class="confirm-details-grid">
                <div class="confirm-detail-cell">
                    <p class="stay-cell-label">Move in</p>
                    <p class="stay-cell-value">{{ $booking[''move_in''] }}</p>
                    <p class="stay-cell-sub">From {{ $property->checkin_time }}</p>
                </div>
                <div class="confirm-detail-cell">
                    <p class="stay-cell-label">Move out</p>
                    <p class="stay-cell-value">{{ $booking[''move_out''] }}</p>
                    <p class="stay-cell-sub">Before {{ $property->checkout_time }}</p>
                </div>
                <div class="confirm-detail-cell">
                    <p class="stay-cell-label">Guests</p>
                    <p class="stay-cell-value">{{ $booking[''guests''] }} {{ Str::plural(''guest'', $booking[''guests'']) }}</p>
                    <p class="stay-cell-sub">{{ $booking[''months''] }} {{ Str::plural(''month'', $booking[''months'']) }} stay</p>
                </div>
                <div class="confirm-detail-cell">
                    <p class="stay-cell-label">Total paid</p>
                    <p class="stay-cell-value">${{ number_format($booking[''total''], 0) }}</p>
                    <p class="stay-cell-sub">USD</p>
                </div>
            </div>

            <div class="confirm-actions">
                <a href="{{ url(''/'') }}" class="btn-primary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Back to Home
                </a>
                <a href="#" class="btn-secondary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    Download Receipt
                </a>
            </div>
        </div>

        <!-- What''s next -->
        <div class="confirm-what-next">
            <h2 class="section-title">What happens next?</h2>
            <div class="next-items">
                <div class="next-item">
                    <div class="next-number">1</div>
                    <div>
                        <p class="next-content-title">Check your email</p>
                        <p class="next-content-text">We&apos;ll send a full confirmation with move-in instructions and host contact details to your email address.</p>
                    </div>
                </div>
                <div class="next-item">
                    <div class="next-number">2</div>
                    <div>
                        <p class="next-content-title">Hear from your host</p>
                        <p class="next-content-text">The host will reach out within 24 hours to welcome you and answer any questions about the property.</p>
                    </div>
                </div>
                <div class="next-item">
                    <div class="next-number">3</div>
                    <div>
                        <p class="next-content-title">Move in on {{ $booking[''move_in''] }}</p>
                        <p class="next-content-text">Arrive any time after {{ $property->checkin_time }}. The key handover details will be shared by your host beforehand.</p>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Right Sidebar -->
    <aside class="checkout-aside">

        <div class="card">
            <img style="width:100%; height:180px; object-fit:cover; border-radius:0.75rem; margin-bottom:1.25rem;"
                 src="{{ $property->image_url ?? ''https://placehold.co/600x180/1a1a1a/888?text=Property'' }}"
                 alt="{{ $property->name }}"
                 onerror="this.src=''https://placehold.co/600x180/1a1a1a/888?text=Property''">

            <span class="property-badge">{{ $property->type }}</span>
            <h3 class="property-name" style="margin-top:0.75rem; font-size:1.1rem;">{{ $property->name }}</h3>
            <p class="property-location" style="margin-top:0.5rem;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                {{ $property->location }}
            </p>
            <div class="property-meta" style="margin-top:0.75rem;">
                <span>{{ $property->beds }} beds</span>
                <span>&bull;</span>
                <span>{{ $property->baths }} baths</span>
                @if($property->area)
                    <span>&bull;</span>
                    <span>{{ $property->area }}</span>
                @endif
            </div>

            <div style="border-top:1px solid var(--stone-200); margin-top:1.25rem; padding-top:1.25rem;">
                <div class="price-row" style="margin-bottom:0.75rem;">
                    <span class="price-row-label">${{ number_format($property->price_per_month, 0) }} &times; {{ $booking[''months''] }} {{ Str::plural(''month'', $booking[''months'']) }}</span>
                    <span class="price-row-value">${{ number_format($booking[''rent''], 0) }}</span>
                </div>
                <div class="price-row" style="margin-bottom:0.75rem;">
                    <span class="price-row-label">Service fee</span>
                    <span class="price-row-value">${{ number_format($booking[''service_fee''], 0) }}</span>
                </div>
                <div class="price-row" style="margin-bottom:0.75rem;">
                    <span class="price-row-label">Taxes</span>
                    <span class="price-row-value">${{ number_format($booking[''taxes''], 0) }}</span>
                </div>
                <div class="price-total-row" style="border-top:1px solid var(--stone-200); padding-top:1rem;">
                    <div>
                        <p class="price-total-label">Total paid</p>
                        <p class="price-total-sub">USD</p>
                    </div>
                    <strong class="price-total-amount">${{ number_format($booking[''total''], 0) }}</strong>
                </div>
            </div>
        </div>

        <div class="help-widget">
            <div class="help-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
                    <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path>
                </svg>
            </div>
            <div>
                <p class="help-title">Need help?</p>
                <p class="help-text">Our support team is available 24/7 to assist with your stay.</p>
                <a href="#" class="help-link">Contact support</a>
            </div>
        </div>
    </aside>

</div>

<!-- Footer -->
<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-top">
            <div>
                <div class="footer-brand">Property<span>Hub</span></div>
                <p class="footer-tagline">Find your perfect place to stay.</p>
            </div>
            <div class="footer-links">
                <div>
                    <p class="footer-col-title">Company</p>
                    <ul class="footer-col-links">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
                <div>
                    <p class="footer-col-title">Support</p>
                    <ul class="footer-col-links">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <span>&copy; {{ date(''Y'') }} PropertyHub. All rights reserved.</span>
        </div>
    </div>
</footer>

<script src="{{ asset(''checkout/assets/js/validation.js'') }}"></script>
</body>
</html>