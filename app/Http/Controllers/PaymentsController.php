<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree;
class PaymentsController extends Controller
{
    //
    public function make(Request $request){
        $payload = $request->input('payload', false);

        $nonce=isset($payload['nonce']) ? $payload['nonce'] : 'default';
        // $nonce = $payload['nonce'];

        $status = Braintree\Transaction::sale([
            'amount' => '50.00',
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return view('payment', [
            'status' => $status
        ]);
}
    public function checkout(Request $request){
        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;
        //generate gateway token from enviroment variables
        $gateway = new Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV', 'sandbox'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);
        
        
        $result = $gateway->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $nonce,
                'options' => [
                    'submitForSettlement' => true
                ]
            ]);
        if ($result->success) {
            $transaction = $result->transaction;
            // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
            return back()->with('success', 'Transaction ID: ' . $transaction->id);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            // $_SESSION["errors"] = $errorString;
            // header("Location: " . $baseUrl . "index.php");
            return back()->withErrors('error', $errorString);
        }

    }
    
}


