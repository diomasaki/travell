<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;
use Illuminate\Support\Str;
use App\Models\Payment;


class PaymentController extends Controller
{
    public function __construct() {
        Xendit::setApiKey("xnd_development_GuLr137aiAWVY2Q6gWJsQLwrItIXAmks2emqDjnycRCh9UX0YvmhqkbBpvwDOrS");
    }

    public function index() {
        return view('success');
    }

    public function create(Request $request) {
        $params = [
            'external_id' => (string) Str::uuid(),
            'payer_email' => $request->payer_email,
            'description' => $request->description,
            'amount' => $request->amount,
            'success_redirect_url' => route('payment.success'),
        ];

        $createInvoice = \Xendit\Invoice::create($params);

        $invoiceId = $createInvoice['id'];

            // Store the invoice ID in a session variable
        session()->put('invoice_id', $invoiceId);
        

        //DB SAVE
        $payment = new Payment;
        $payment->status = 'pending';
        $payment->checkout_link = $createInvoice['invoice_url'];
        $payment->external_id = $params['external_id'];
        $payment->save();

        return redirect($createInvoice['invoice_url']);
    }

    public function webhook(Request $request) {

        $getInvoice = \Xendit\Invoice::retrieve($request->id);

        //GET DATA
        $payment = Payment::where('external_id', $request->external_id)->firstOrFail();

        if ($payment->status == 'settled') {
            return response()->json(['data' => 'Payment has been processed!']);
        }

        //Update status payment!
        $payment->status = strtolower($getInvoice['status']);
        $payment->save();

        return response()->json(['data' => 'Success']);
    }
}
