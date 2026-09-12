<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Transaction;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        $transactions = Transaction::with('flat')->where('tenant_id', $user->user_id)->orderBy('created_at', 'desc')->get();

        return view('profile.profile', compact('user', 'transactions'));
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'regex:/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/', Rule::unique('users', 'email')->ignore($user->user_id, 'user_id')],
            'phone' => ['nullable', 'string', 'regex:/^(010|011|012|015)[0-9]{8}$/'],
            'password' => ['nullable', 'string', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/'],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }
}
