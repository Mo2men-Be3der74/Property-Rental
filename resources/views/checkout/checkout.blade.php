<!DOCTYPE html>
<html lang="{{ str_replace(''_'', ''-'', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertyHub &mdash; Payment</title>
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
        <a href="{{ route(''checkout.details'', $property) }}" class="back-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            Back to details
        </a>
        <div class="hero-row">
            <div>
                <p class="hero-eyebrow">Step 2 of 3</p>
                <h1 class="hero-title">Payment</h1>
                <p class="hero-subtitle">Your payment is encrypted and secure.</p>
            </div>
            <div class="step-indicator">
                <span class="step-circle done">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="14" height="14">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </span>
                <span class="step-label">Details</span>
                <span class="step-line"></span>
                <span class="step-circle active">2</span>
                <span class="step-label">Payment</span>
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

        <!-- Payment Form Card -->
        <div class="card">
            <div class="section-header-row">
                <h2 class="section-title">Payment method</h2>
                <div class="card-icons">
                    <div class="card-icon visa">VISA</div>
                    <div class="card-icon mc">MC</div>
                    <div class="card-icon amex">AMEX</div>
                </div>
            </div>

            @php
                $confirmUrl = route(''checkout.confirm'', $property) . ''?'' . http_build_query([
                    ''move_in''    => $booking[''move_in''],
                    ''move_out''   => $booking[''move_out''],
                    ''guests''     => $booking[''guests''],
                    ''months''     => $booking[''months''],
                    ''guest_name'' => $booking[''guest_name''],
                ]);
            @endphp

            <form class="form checkout-form" data-next="{{ $confirmUrl }}">

                <div class="form-group">
                    <label class="form-label" for="cardholder">Cardholder name</label>
                    <input id="cardholder" type="text" class="form-input"
                           placeholder="Name as it appears on the card"
                           value="{{ $booking[''guest_name''] }}"
                           required>
                    <span class="form-error-msg"></span>
                </div>

                <div class="form-group">
                    <label class="form-label" for="cardnumber">Card number</label>
                    <input id="cardnumber" type="text" class="form-input"
                           placeholder="0000 0000 0000 0000"
                           data-validate="card-number" maxlength="19" required>
                    <span class="form-error-msg"></span>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="expiry">Expiry date</label>
                        <input id="expiry" type="text" class="form-input"
                               placeholder="MM/YY" data-validate="expiry" maxlength="5" required>
                        <span class="form-error-msg"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="cvv">CVV / CVC</label>
                        <input id="cvv" type="text" class="form-input"
                               placeholder="3-4 digits" data-validate="cvv" maxlength="4" required>
                        <span class="form-error-msg"></span>
                    </div>
                </div>

                <div style="margin-top:0.5rem;">
                    <h3 style="font-size:1rem; font-weight:700; margin-bottom:1.25rem;">Billing address</h3>
                    <div style="display:flex; flex-direction:column; gap:1.25rem;">
                        <div class="form-group">
                            <label class="form-label" for="address">Street address</label>
                            <input id="address" type="text" class="form-input" placeholder="123 Main Street" required>
                            <span class="form-error-msg"></span>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="city">City</label>
                                <input id="city" type="text" class="form-input" placeholder="Dubai" required>
                                <span class="form-error-msg"></span>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="zip">ZIP / Postal code</label>
                                <input id="zip" type="text" class="form-input" placeholder="00000" required>
                                <span class="form-error-msg"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-primary" style="margin-top:1.25rem;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    Confirm &amp; Pay ${{ number_format($booking[''total''], 0) }}
                </button>

                <div class="secure-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                    256-bit SSL encryption. Your data is safe.
                </div>
            </form>
        </div>

        <!-- Cancellation Reminder -->
        <div class="card">
            <div class="policy-box">
                <div class="policy-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                </div>
                <div>
                    <h2 class="policy-title">Before you pay</h2>
                    <p class="policy-text">
                        {{ $property->cancellation_policy ?? ''Please contact the host for cancellation details.'' }}
                        By confirming, you agree to the PropertyHub payment terms.
                    </p>
                </div>
            </div>
        </div>

    </main>

    <!-- Right Sidebar -->
    <aside class="checkout-aside">
        <div class="card">
            <!-- Mini Property Summary -->
            <div class="property-row" style="margin-bottom:1.5rem;">
                <img style="width:80px; height:64px; border-radius:0.75rem; object-fit:cover; flex-shrink:0;"
                     src="{{ $property->image_url ?? ''https://placehold.co/80x64/1a1a1a/888?text=Property'' }}"
                     alt="{{ $property->name }}"
                     onerror="this.src=''https://placehold.co/80x64/1a1a1a/888?text=Property''">
                <div class="property-info">
                    <span class="property-badge">{{ $property->type }}</span>
                    <p class="property-name" style="font-size:0.9375rem; margin-top:0.5rem;">{{ $property->name }}</p>
                    <p class="property-location" style="margin-top:0.25rem;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="12" height="12">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        {{ $property->location }}
                    </p>
                </div>
            </div>

            <!-- Stay Summary -->
            <div style="border-top:1px solid var(--stone-200); padding-top:1rem; margin-bottom:1rem; font-size:0.8125rem; color:var(--stone-500);">
                <div style="display:flex; justify-content:space-between; margin-bottom:0.375rem;">
                    <span>Move in</span>
                    <span style="color:var(--ink); font-weight:600;">{{ $booking[''move_in''] }}</span>
                </div>
                <div style="display:flex; justify-content:space-between;">
                    <span>Move out</span>
                    <span style="color:var(--ink); font-weight:600;">{{ $booking[''move_out''] }}</span>
                </div>
            </div>

            <div style="border-top:1px solid var(--stone-200); padding-top:1.25rem;">
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