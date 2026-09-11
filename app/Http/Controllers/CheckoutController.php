<?php
namespace App\Http\Controllers;

use App\Models\Flat;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\PaymentRequest;
use Carbon\Carbon;
use Ramsey\Uuid\Type\Decimal;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Reciept;

class CheckoutController extends Controller
{
    public function details($id)
    {

        $flat = Flat::findOrFail($id);

        $alreadyReserved = Transaction::where('flat_id', $flat->flat_id)->where('tenant_id', Auth::user()->user_id)->where('status', 'completed')->exists();

        $someoneReserved = Transaction::where('flat_id', $flat->flat_id)->where('status', 'completed')->exists();

        if ($alreadyReserved || $someoneReserved) {
            return redirect()->route('welcome')->with('error', 'You have already reserved this flat.');
        }

        if (Auth::user()->user_id === $flat->owner_id) {
            return redirect()->route('welcome')->with('error', 'You cannot book your own flat.');
        }

        return view('checkout.details', compact('flat'));
    }

    public function payment($id, PaymentRequest $request) {
        $data = $request->validated();

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $months = $startDate->diffInMonths($endDate);

        $flat = Flat::findOrFail($id);

        $alreadyReserved = Transaction::where('flat_id', $flat->flat_id)->where('tenant_id', Auth::user()->user_id)->where('status', 'completed')->exists();

        $someoneReserved = Transaction::where('flat_id', $flat->flat_id)
        ->where('status', 'completed')
        ->exists();

        if ($alreadyReserved || $someoneReserved) {
            return redirect()->route('welcome')->with('error', 'You have already reserved this flat.');
        }

        if (Auth::user()->user_id === $flat->owner_id) {
            return redirect()->route('welcome')->with('error', 'You cannot book your own flat.');
        }

        $pricePerMonth = (float) $flat->price_per_month;

        $totalPrice = $pricePerMonth * $months;

        return view('checkout.payment', compact('flat', 'totalPrice', 'data'));
    }

    public function confirm($id, Request $request)
    {

        $data = $request->all();
        $flat = Flat::findOrFail($id);

        $alreadyReserved = Transaction::where('flat_id', $flat->flat_id)->where('tenant_id', Auth::user()->user_id)->where('status', 'completed')->exists();

        $someoneReserved = Transaction::where('flat_id', $flat->flat_id)->where('status', 'completed')->exists();

        if ($alreadyReserved || $someoneReserved) {
            return redirect()->route('welcome')->with('error', 'You have already reserved this flat.');
        }

        if (Auth::user()->user_id === $flat->owner_id) {
            return redirect()->route('welcome')->with('error', 'You cannot book your own flat.');
        }

        $transaction = [
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'total_price' => $request->totalPrice,
            'flat_id' => $id,
            'landlord_id' => $flat->owner_id,
            'tenant_id' => Auth::user()->user_id,
            'status' => 'completed',
        ];

        $transaction = Transaction::create($transaction);

        $reciept = [
            'transaction_id' => $transaction->transaction_id,
            'amount_paid' => $request->totalPrice,
            'date' => now(),
        ];

        $reciept = Reciept::create($reciept);

        return redirect()->route('welcome')->with('success', 'Payment successful! Transaction ID: ' . $transaction->transaction_id);

    }
}
