<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PropertyHub &mdash; Payment Method</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    >
    <link rel="stylesheet" href="{{asset('checkout/assets/css/payment.css')}}">
</head>
<body>
    <div class="header">
        <div class="back">
            <a href="{{route('checkout.details', $flat->flat_id ?? $flat->id ?? 1)}}"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="title">
            <h1>Checkout</h1>
            <div class="small">Your payment details are encrypted and secure.</div>
        </div>

    </div>

    <div class="content">
        <div class="title-card">
            <div class="location"><i class="fa-solid fa-location-pin"></i> {{$flat->location}}</div>
            <div class="size"><i class="fa-solid fa-ruler"></i> {{$flat->size}} m^2</div>
        </div>

        <div class="order-summary">
            <div class="title">Order summary</div>
            <div class="total">
                <div class="label">Total</div>
                <div class="price">${{ isset($totalPrice) && $totalPrice > 0 ? number_format($totalPrice, 2) : number_format($flat->price_per_month ?? $flat->price ?? 0, 2) }}</div>
            </div>
            <div class="in">Move in: {{$data['start_date']}}</div>
            <div class="out">Move out: {{$data['end_date']}}</div>

            <div class="size">{{$flat->size}} m^2</div>
        </div>
        <form action="{{route('checkout.confirm', $flat->flat_id)}}" method='post'>
            @csrf
            <input type="hidden" name='totalPrice' value="{{$totalPrice}}">
            <input type="hidden" name='start_date' value="{{$data['start_date']}}">
            <input type="hidden" name='end_date' value="{{$data['end_date']}}">
            <input type="submit" value="Confirm"></input>
        </form>
    </div>
    <script src="{{asset('checkout/assets/js/payment.js')}}"></script>
</body>
</html>