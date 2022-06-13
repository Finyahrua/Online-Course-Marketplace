<?php

namespace App\Http\Controllers;


use App\Course;
use Illuminate\Http\Request;
use Braintree;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;


class CoursesController extends Controller
{

    public function show($course_slug)
    {
        $course = Course::where('slug', $course_slug)->with('publishedLessons')->firstOrFail();
        $purchased_course = \Auth::check() && $course->students()->where('user_id', \Auth::id())->count() > 0;

        return view('course', compact('course', 'purchased_course'));
    }

    // public function payment(Request $request)
    // {
    //     $course = Course::findOrFail($request->get('course_id'));
    //     $this->createStripeCharge($request);

    //     $course->students()->attach(\Auth::id());

    //     return redirect()->back()->with('success', 'Payment completed successfully.');
    // }

    public function payment(Request $request)
    {
        $course = Course::findOrFail($request->get('course_id'));
        $this->createBrainTreePayment($request);

        $course->students()->attach(\Auth::id());

        return redirect()->back()->with('success', 'Payment completed successfully.');
    }

    // private function createStripeCharge($request)
    // {
    //     Stripe::setApiKey(env('STRIPE_API_KEY'));

    //     try {
    //         $customer = Customer::create([
    //             'email' => $request->get('stripeEmail'),
    //             'source'  => $request->get('stripeToken')
    //         ]);

    //         $charge = Charge::create([
    //             'customer' => $customer->id,
    //             'amount' => $request->get('amount'),
    //             'currency' => "usd"
    //         ]);
    //     } catch (\Stripe\Error\Base $e) {
    //         return redirect()->back()->withError($e->getMessage())->send();
    //     }
    // }

    private function createBrainTreePayment($request)
    {
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
    public function rating($course_id, Request $request)
    {
        $course = Course::findOrFail($course_id);
        $course->students()->updateExistingPivot(\Auth::id(), ['rating' => $request->get('rating')]);

        return redirect()->back()->with('success', 'Thank you for rating.');
    }

}
