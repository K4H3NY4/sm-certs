<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use App\Models\Certificate;
use App\Mail\CertificateAdded;
use Illuminate\Support\Facades\Mail;

class StripeCheckoutController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        // Set the Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Validate the request data
        $request->validate([
            'price_id' => 'required|string',
            'quantity' => 'required|integer',
            'email' => 'required|email',
        ]);

        try {
            // Create a new Checkout Session
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price' => $request->price_id,
                    'quantity' => $request->quantity,
                ]],
                'customer_email' => $request->email,
                'mode' => 'payment',
                'success_url' => url('/api/checkout/success?session_id={CHECKOUT_SESSION_ID}'),
                'cancel_url' => url('/api/checkout/cancel'),
            ]);

            // Return the session ID and URL to redirect to the Stripe Checkout page as a response
            return response()->json([
                'id' => $session->id,
                'url' => $session->url,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function success(Request $request)
    {
        $session_id = $request->query('session_id');

        try {
            // Retrieve the session from Stripe
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $session = Session::retrieve($session_id);

            // Get the payment intent
            $payment_intent_id = $session->payment_intent;
            $payment_intent = PaymentIntent::retrieve($payment_intent_id);

            // Retrieve the cardholder name from the payment method
            $payment_method = PaymentMethod::retrieve($payment_intent->payment_method);
            $cardholder_name = $payment_method->billing_details->name;

            return response()->json([
                'message' => 'Payment Successful!',
                'session_id' => $session,
               
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function cancel(Request $request)
    {
        return response()->json(['message' => 'Payment Canceled!']);
    }
}
