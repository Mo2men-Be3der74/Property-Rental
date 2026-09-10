<?php
namespace App\Http\Controllers;


use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function details(Property $property): View
    {
        return view('checkout.details', compact('property'));
    }

    public function payment(Property $property, Request $request): View
    {


        return view('checkout.checkout', compact('property', 'booking'));
    }

    public function confirm(Property $property, Request $request): View
    {

        return view('checkout.confirm', compact('property', 'booking'));
    }
}
