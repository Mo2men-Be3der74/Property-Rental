<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertyHub &mdash; Booking Details</title>
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
        <a href="#" class="back-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            Back to property
        </a>
        <div class="hero-row">
            <div>
                <p class="hero-eyebrow">Almost there</p>
                <h1 class="hero-title">Confirm your booking</h1>
                <p class="hero-subtitle">Review your details before completing this secure reservation.</p>
            </div>
            <div class="step-indicator">
                <span class="step-circle active">1</span>
                <span class="step-label">Details</span>
                <span class="step-line"></span>
                <span class="step-circle">2</span>
                <span>Payment</span>
                <span class="step-line"></span>
                <span class="step-circle">3</span>
                <span>Confirmation</span>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="checkout-grid">

    <main class="checkout-main">

        <!-- Property Card -->
        <div class="card">
            <div class="property-row">
                <img class="property-img"
                     src="{{ $property->image_url ?? ''https://placehold.co/160x128/1a1a1a/888?text=Property'' }}"
                     alt="{{ $property->name }}"
                     onerror="this.src=''https://placehold.co/160x128/1a1a1a/888?text=Property''">
                <div class="property-info">
                    <div class="property-top">
                        <div>
                            <span class="property-badge">{{ $property->type }}</span>
                            <h2 class="property-name">{{ $property->name }}</h2>
                        </div>
                        <div class="property-rating">
                            <svg class="star" viewBox="0 0 24 24" fill="currentColor" width="16" height="16">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            {{ $property->rating }}
                            <span class="reviews">({{ $property->reviews_count }})</span>
                        </div>
                    </div>
                    <p class="property-location">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        {{ $property->location }}
                    </p>
                    <div class="property-meta">
                        <span>{{ $property->beds }} beds</span>
                        <span>&bull;</span>
                        <span>{{ $property->baths }} baths</span>
                        @if($property->area)
                            <span>&bull;</span>
                            <span>{{ $property->area }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Your Stay -->
        <div class="card">
            <div class="section-header">
                <h2 class="section-title">Your stay</h2>
                <a href="#" class="edit-link">Edit</a>
            </div>
            <div class="stay-grid">
                <div class="stay-cell">
                    <p class="stay-cell-label">Move in</p>
                    <p class="stay-cell-value">{{ $booking[''move_in''] }}</p>
                    <p class="stay-cell-sub">From {{ $property->checkin_time }}</p>
                </div>
                <div class="stay-cell">
                    <p class="stay-cell-label">Move out</p>
                    <p class="stay-cell-value">{{ $booking[''move_out''] }}</p>
                    <p class="stay-cell-sub">Before {{ $property->checkout_time }}</p>
                </div>
                <div class="stay-cell">
                    <p class="stay-cell-label">Occupants</p>
                    <p class="stay-cell-value">{{ $booking[''guests''] }} {{ Str::plural(''guest'', $booking[''guests'']) }}</p>
                    <p class="stay-cell-sub">{{ $booking[''months''] }} {{ Str::plural(''month'', $booking[''months'']) }} stay</p>
                </div>
            </div>
        </div>

        <!-- Your Information -->
        <div class="card">
            <h2 class="section-title">Your information</h2>
            <p class="form-section-sub">We&apos;ll use these details to send your booking confirmation.</p>

            {{-- Pass booking data forward as query-string on navigation --}}
            @php
                $paymentUrl = route(''checkout.payment'', $property) . ''?'' . http_build_query([
                    ''move_in''  => $booking[''move_in''],
                    ''move_out'' => $booking[''move_out''],
                    ''guests''   => $booking[''guests''],
                    ''months''   => $booking[''months''],
                ]);
            @endphp

            <form class="form checkout-form" data-next="{{ $paymentUrl }}" id="details-form">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="fullname">Full name</label>
                        <input id="fullname" type="text" class="form-input"
                               placeholder="Your full name"
                               value="{{ old(''fullname'', $booking[''guest_name'']) }}"
                               required>
                        <span class="form-error-msg"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email address</label>
                        <input id="email" type="email" class="form-input"
                               placeholder="you@example.com"
                               value="{{ old(''email'', $booking[''guest_email'']) }}"
                               required>
                        <span class="form-error-msg"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="phone">Phone number</label>
                    <div class="phone-wrapper">
                        <select class="phone-select" aria-label="Country code">
                            <option>+971</option>
                            <option>+1</option>
                            <option>+44</option>
                            <option>+20</option>
                        </select>
                        <input id="phone" type="tel" class="phone-input"
                               placeholder="Phone number"
                               value="{{ old(''phone'', $booking[''guest_phone'']) }}"
                               required>
                    </div>
                    <span class="form-error-msg"></span>
                </div>

                <div class="form-group">
                    <label class="form-label" for="notes">
                        Additional requirements <span class="optional">(optional)</span>
                    </label>
                    <textarea id="notes" class="form-textarea"
                              placeholder="Anything you&apos;d like the host to know?">{{ old(''notes'', $booking[''notes'']) }}</textarea>
                </div>

                <!-- Cancellation Policy -->
                <div class="card" style="margin-top:0.5rem;">
                    <div class="policy-box">
                        <div class="policy-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                <polyline points="9 16 11 18 15 14"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h2 class="policy-title">Cancellation policy</h2>
                            <p class="policy-text">
                                {{ $property->cancellation_policy ?? ''Please contact the host for cancellation details.'' }}
                            </p>
                            <a href="#" class="policy-link">Read full policy</a>
                        </div>
                    </div>
                </div>

                <!-- Terms -->
                <div class="terms-box">
                    <label class="terms-label">
                        <input type="checkbox" class="terms-checkbox" required>
                        <span>
                            I agree to the
                            <a href="#" class="terms-link">Terms &amp; Conditions</a>
                            and confirm that the information provided is accurate.
                        </span>
                    </label>
                    <span class="form-error-msg"></span>
                </div>

                <button type="submit" class="btn-primary" style="margin-top:0.5rem;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    Continue to Payment
                </button>
            </form>
        </div>

    </main>

    <!-- Right Sidebar -->
    <aside class="checkout-aside">
        <div class="card">
            <h2 class="price-title">Price details</h2>
            <div class="price-rows">
                <div class="price-row">
                    <span class="price-row-label">${{ number_format($property->price_per_month, 0) }} &times; {{ $booking[''months''] }} {{ Str::plural(''month'', $booking[''months'']) }}</span>
                    <span class="price-row-value">${{ number_format($booking[''rent''], 0) }}</span>
                </div>
                <div class="price-row">
                    <span class="price-row-label">Service fee</span>
                    <span class="price-row-value">${{ number_format($booking[''service_fee''], 0) }}</span>
                </div>
                <div class="price-row">
                    <span class="price-row-label">Taxes</span>
                    <span class="price-row-value">${{ number_format($booking[''taxes''], 0) }}</span>
                </div>
            </div>
            <div class="price-total-row">
                <div>
                    <p class="price-total-label">Total</p>
                    <p class="price-total-sub">USD &middot; Due today</p>
                </div>
                <strong class="price-total-amount">${{ number_format($booking[''total''], 0) }}</strong>
            </div>
            <div class="secure-badge">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    <polyline points="9 12 11 14 15 10"></polyline>
                </svg>
                Secure transaction protected by PropertyHub
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
                <p class="help-text">Our support team is available 24/7 to help with your booking.</p>
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
