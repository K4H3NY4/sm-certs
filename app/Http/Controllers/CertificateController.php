<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Mail\CertificateAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
           
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
     // Debugging: log the incoming id
     Log::info('Searching for certificate with uuid: ' . $id);

     // Find and return the certificate by ID
     $certificate = Certificate::where('uuid', $id)->first();
 
     if ($certificate) {
         return response()->json([
            'message' => 'Certificate found',
             'valid_till' => $certificate->valid_till,
             'status' => $certificate->status,
            // 'email' => $certificate->email,
         ], 200);
     } else {
         return response()->json(['message' => 'Certificate not found'], 404);
     }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      

        $certificate = Certificate::where('uuid', $id)->first();

        if ($certificate) {
           // $certificate->valid_till = $request->input('valid_till', $certificate->valid_till);
            $certificate->status = $request->input('status', $certificate->status);
           // $certificate->order_id = $request->input('order_id', $certificate->order_id);
            $certificate->save();
            return response()->json(['message' => 'Certificate updated successfully'], 200);
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
        $certificate = Certificate::where('uuid', $id)->first();
        if ($certificate) {
            $certificate->delete();
            return response()->json(['message' => 'Certificate deleted'], 200);
        } else {
            return response()->json(['message' => 'Certificate not found'], 404);
        }
    }
}
