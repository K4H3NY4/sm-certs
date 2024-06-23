<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificateAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $certificate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($certificate)
    {
        $this->certificate = $certificate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.certificate_added')
                    ->with([
                        'order_id' => $this->certificate->order_id,
                        'email' => $this->certificate->email,
                        'stripe_code' => $this->certificate->stripe_code,
                        'name' => $this->certificate->name,
                        'uuid'=> $this->certificate->uuid,
                        'valid_till'=> $this->certificate->valid_till,
                    ]);
    }
}
