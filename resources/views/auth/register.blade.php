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

</body>
</html>
