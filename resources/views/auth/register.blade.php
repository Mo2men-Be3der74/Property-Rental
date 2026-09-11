<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Create Account</h2>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">

        @csrf

        <label>Name</label>
        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
        >

        <label>Email</label>
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
        >

        <label>Phone</label>
        <input
            type="text"
            name="phone"
            value="{{ old('phone') }}"
        >

        <label>Password</label>
        <input
            type="password"
            name="password"
            required
        >

        <label>Confirm Password</label>
        <input
            type="password"
            name="password_confirmation"
            required
        >

        <button type="submit">
            Register
        </button>

    </form>

    <p>
        Already have an account?
        <a href="{{ route('login') }}">Login</a>
    </p>

</div>

<script>
    var form = document.querySelector('form');

    form.addEventListener('submit', function (event) {

        var name = document.querySelector('input[name="name"]').value.trim();
        var email = document.querySelector('input[name="email"]').value.trim();
        var phone = document.querySelector('input[name="phone"]').value.trim();
        var password = document.querySelector('input[name="password"]').value;
        var confirmPassword = document.querySelector('input[name="password_confirmation"]').value;

        if (name.length < 3) {
            alert('Name must be at least 3 characters.');
            event.preventDefault();
            return;
        }

        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailPattern.test(email)) {
            alert('Please enter a valid email address.');
            event.preventDefault();
            return;
        }

        if (phone !== '') {
            var phonePattern = /^(010|011|012|015)[0-9]{8,}$/;

            if (!phonePattern.test(phone)) {
                alert('Please enter a valid Egyptian phone number.');
                event.preventDefault();
                return;
            }
        }

        if (password.length < 8) {
            alert('Password must be at least 8 characters.');
            event.preventDefault();
            return;
        }

        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            event.preventDefault();
            return;
        }
    });
</script>

</body>
</html>
