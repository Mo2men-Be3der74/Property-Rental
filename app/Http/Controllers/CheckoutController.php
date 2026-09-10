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
        $data = Flat::findOrFail($id);

        return view('checkout.details', compact('data'));
    }

    public function payment($id, PaymentRequest $request) {
        $data = $request->validated();

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $months = $startDate->diffInMonths($endDate);

        $flat = Flat::findOrFail($id);

        $pricePerMonth = (float) $flat->price_per_month;

        $totalPrice = $pricePerMonth * $months;

        return view('checkout.payment', compact('flat', 'totalPrice', 'data'));
    }

    public function confirm($id, Request $request)
    {

        $data = $request->all();
        $flat = Flat::findOrFail($id);

        $transaction = [
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'total_price' => $request->totalPrice,
            'flat_id' => $id,
            'landlord_id' => $flat->owner_id ?? 4,
            'tenant_id' => 3,
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
