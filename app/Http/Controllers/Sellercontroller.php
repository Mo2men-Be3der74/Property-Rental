<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerRequest;
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
            return redirect()->route('login');
        }
        $flats = Flat::where('owner_id', $user->user_id)->latest()->get();
        return view('sellerpage.seller', compact('flats', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        return view('sellerpage.add', compact('user'));
    }

    public function store(SellerRequest $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        Flat::create([
            'owner_id' => $user->user_id,
            'category' => $request->category,
            'size' => $request->size,
            'price_per_month' => $request->price_per_month,
            'location' => $request->location,
            'img' => $request->file('img')->store('images'),
        ]);
        return redirect()->route('seller.index');
    }

    public function edit($flat_id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $flat = Flat::where('flat_id', $flat_id)->firstOrFail();
        return view('sellerpage.edit', compact('flat', 'user'));
    }

    public function update(SellerRequest $request, $flat_id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $flat = Flat::where('flat_id', $flat_id)->firstOrFail();
        if ($request->hasFile('img')) {
            $flat->img = $request->file('img')->store('images');
        }
        $flat->category = $request->category;
        $flat->size = $request->size;
        $flat->price_per_month = $request->price_per_month;
        $flat->location = $request->location;
        $flat->save();
        return redirect()->route('seller.index');
    }

    public function destroy($flat_id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $flat = Flat::where('flat_id', $flat_id)->firstOrFail();
        $flat->delete();
        return redirect()->route('seller.index');
    }
}