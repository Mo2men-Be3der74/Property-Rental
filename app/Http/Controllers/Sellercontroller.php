<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Sellercontroller extends Controller
{
    public function seller()
    {
        $user = Auth::user();

        if (!$user) {
            $user = User::first();
            if (!$user) {
                $user = new User();
                $user->name = 'Host';
                $user->img = 'checkout/assets/images/user.jpg';
            }
        }

        if ($user->user_id) {
            $flats = Flat::where('owner_id', $user->user_id)->latest()->get();
        } else {
            $flats = collect();
        }

        return view('sellerpage.seller', compact('flats', 'user'));
    }
}


