<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PayController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }

    public function submitForm(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'price_id' => 'required|string',
        ]);

        // Prepare data to send to API
        $data = [
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'price_id' => $validatedData['price_id'],
            'quantity' => 1
        ];

        try {
            // Make POST request to API endpoint
            $response = Http::post('api.booksafari.us/api/create-checkout-session', $data);

            // Check if request was successful
            if ($response->successful()) {
                $responseData = $response->json();

                // Check if API response contains a URL
                if (isset($responseData['url'])) {
                    return redirect($responseData['url']);
                } else {
                    return back()->withErrors(['msg' => 'Form submitted successfully, but no URL returned.']);
                }
            } else {
                return back()->withErrors(['msg' => 'Error submitting form: ' . $response->body()]);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'Exception occurred: ' . $e->getMessage()]);
        }
    }
}
