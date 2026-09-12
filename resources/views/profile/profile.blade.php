<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modern Rental - Profile</title>

    <link rel="stylesheet" href="{{asset('checkout/assets/css/profile.css')}}">

</head>


<body>


<header class="navbar">

    <div class="logo">
        <span>🏠</span> Modern Rental
    </div>
<nav>

    <a href="project.html">Home</a>

    <a href="project.html#properties">Properties</a>

    <a href="project.html#how">How it works</a>

    <a href="project.html#contact">Contact</a>

</nav>

    <a href="profile.html" class="login">
        Profile
    </a>
</header>
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

    <section class="transactions-section">
        <p class="eyebrow">
            BOOKINGS
        </p>

        <h2>
            My Transactions
        </h2>

        <div class="transactions-list">
            @if (count($transactions) > 0)
                @foreach ($transactions as $transaction)
                    <div class="transaction-card">
                        <div class="transaction-header">
                            <div class="transaction-location">
                                <h3>{{ $transaction->flat->location ?? 'Location Unavailable' }}</h3>
                            </div>
                            <div class="transaction-price">
                                ${{ number_format($transaction->total_price, 2) }}
                            </div>
                        </div>

                        <div class="transaction-dates">
                            <div class="date-item">
                                <span class="date-label">Start Date:</span>
                                <span class="date-value">{{ $transaction->start_date }}</span>
                            </div>
                            <div class="date-item">
                                <span class="date-label">End Date:</span>
                                <span class="date-value">{{ $transaction->end_date }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-transactions">
                    <p>No transactions found.</p>
                </div>
            @endif
        </div>
    </section>

</main>

<footer id="contact">


    <div>

        <b>
            Modern Rental
        </b>

        <p>
            Simple property rental for modern living.
        </p>

    </div>


    <div>

        <b>
            Company
        </b>

        <p>
            About · Properties · Contact
        </p>

    </div>


    <div>

        <b>
            Support
        </b>

        <p>
            Help Center · Terms · Privacy
        </p>

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
