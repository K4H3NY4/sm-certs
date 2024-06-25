<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;
use App\Models\Certificate;
use App\Mail\CertificateAdded;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                // Define variables needed
                $cardholder_name = ''; // Assuming you get this from $session or elsewhere
                $payment_intent_id = ''; // Assuming you get this from $session or elsewhere

                // Create a new certificate with the session data
                $certificate = Certificate::create([
                    'order_id' => $session->id,
                    'email' => $session->customer_email,
                    'name' => $cardholder_name,
                    'session_id' => $session->id,
                    'payment_intent' => $payment_intent_id,
                    'uuid' => (string) \Illuminate\Support\Str::uuid(),
                ]);

                // Send email with the certificate
                try {
                    Mail::to($certificate->email)->send(new CertificateAdded($certificate));
                } catch (\Exception $e) {
                    // Log email sending error
                    \Log::error('Failed to send email: ' . $e->getMessage());
                }

                break;
            // Add handling for other event types if needed
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('');
    }
}
