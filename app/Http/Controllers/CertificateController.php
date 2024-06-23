<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Mail\CertificateAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Return all certificates
        return response()->json(Certificate::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Since this is an API, you might not need this method.
        // Typically, a form is handled in the front end.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'order_id' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'stripe_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);
    
        // Create the certificate with the validated data and generate UUID
        $validatedData['uuid'] = (string) \Illuminate\Support\Str::uuid();
    
        // Save the certificate
        $certificate = Certificate::create($validatedData);
    
        try {
            // Attempt to send the email to the provided email address
            Mail::to($certificate->email)->send(new CertificateAdded($certificate));
    
            // If email is sent successfully, return the created certificate as JSON
            return response()->json(['message' => 'Certificate created and email sent successfully.', 'certificate' => $certificate], 201);
    
        } catch (\Exception $e) {
            // If email fails to send, return the created certificate but indicate email failure
            return response()->json(['message' => 'Certificate created but failed to send email.', 'certificate' => $certificate, 'error' => $e->getMessage()], 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find and return the certificate by ID
        $certificate = Certificate::find($id);
        if ($certificate) {
            return response()->json($certificate, 200);
        } else {
            return response()->json(['message' => 'Certificate not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Since this is an API, you might not need this method.
        // Typically, a form is handled in the front end.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate and update the certificate
        $validatedData = $request->validate([
            'order_id' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|max:255',
            'stripe_code' => 'sometimes|string|max:255',
        ]);

        $certificate = Certificate::find($id);
        if ($certificate) {
            $certificate->update($validatedData);
            return response()->json($certificate, 200);
        } else {
            return response()->json(['message' => 'Certificate not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find and delete the certificate by ID
        $certificate = Certificate::find($id);
        if ($certificate) {
            $certificate->delete();
            return response()->json(['message' => 'Certificate deleted'], 200);
        } else {
            return response()->json(['message' => 'Certificate not found'], 404);
        }
    }
}
