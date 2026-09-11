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
    <title>PropertyHub &mdash; Checkout Details</title>
</head>
<body>
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
    <script src="{{asset('checkout/assets/js/details.js')}}"></script>
</body>
</html>
