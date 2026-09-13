<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modern Rental - Profile</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    >

    <link rel="stylesheet" href="{{asset('checkout/assets/css/profile.css')}}">
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
<main>


    <section class="profile-section">
        <div class="profile-info">


            <p class="eyebrow">
                ACCOUNT
            </p>


            <h1>
                My Profile
            </h1>


            <p class="subtitle">
                Manage your personal information and account settings.
            </p>


            <div class="profile-card">


                <div class="avatar">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                </div>


                <h2>
                    {{ $user->name }}
                </h2>


                <p>
                    {{ $user->email }}
                </p>


                <span>
                    {{ $user->phone }}
                </span>




            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    Log Out
                </button>
            </form>


        </div>

        <div class="details-card">


            <p class="eyebrow">
                PERSONAL INFORMATION
            </p>


            <h2>
                Account Details
            </h2>

            @if (session('success'))
                <div class="alert-success-msg">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-error-msg">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form id="profileForm" action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="field full">
                        <label for="name">
                            Name
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ $user->name }}"
                            >
                        <span class="error-msg" id="nameError">Name must contain only letters and spaces (at least 2 characters).</span>
                    </div>
                </div>

                <div class="field full">
                    <label for="email">
                        Email Address
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ $user->email }}"
                        >
                    <span class="error-msg" id="emailError">Please enter a valid email address.</span>
                </div>

                <div class="field full">
                    <label for="password">
                        Password <span style="font-weight: normal; color: #888; text-transform: none;">(leave blank to keep current)</span>
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Leave blank to keep unchanged"
                        >
                    <span class="error-msg" id="passwordError">Password must be at least 8 characters with uppercase, lowercase, and a number.</span>
                </div>

                <div class="field full">
                    <label for="phone">
                        Phone Number
                    </label>
                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        value="{{ $user->phone }}"
                        placeholder="01012345678"
                        >
                    <span class="error-msg" id="phoneError">Egyptian phone must be 11 digits starting with 010, 011, 012, or 015.</span>
                </div>

                <button
                    type="submit"
                    class="save-btn"
                    id="saveBtn"
                    >
                    Save Changes
                </button>
            </form>


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



<script>
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const phone = document.getElementById('phone');

    const form = document.getElementById('profileForm');

    const nameRegEx = /^[a-zA-Z\s]+$/;
    const emailRegEx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegEx = /^(010|011|012|015)[0-9]{8}$/;
    const passwordRegEx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;


    name.addEventListener('input', () => {
        if (nameRegEx.test(name.value)) {
            name.classList.remove('invalid');
            name.classList.add('valid');
        } else {
            name.classList.add('invalid');
            name.classList.remove('valid');
        }
    });

    email.addEventListener('input', () => {
        if (emailRegEx.test(email.value)) {
            email.classList.remove('invalid');
            email.classList.add('valid');
        } else {
            email.classList.add('invalid');
            email.classList.remove('valid');
        }
    });

    password.addEventListener('input', () => {
        if (passwordRegEx.test(password.value)) {
            password.classList.remove('invalid');
            password.classList.add('valid');
        } else {
            password.classList.add('invalid');
            password.classList.remove('valid');
        }
    });

    phone.addEventListener('input', () => {
        if (phoneRegEx.test(phone.value)) {
            phone.classList.remove('invalid');
            phone.classList.add('valid');
        } else {
            phone.classList.add('invalid');
            phone.classList.remove('valid');
        }
    });

</script>

</body>

</html>
