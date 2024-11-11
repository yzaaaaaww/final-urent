<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContractMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $contractData;

    public function __construct($application, $contractData)
    {
        $this->application = $application;
        $this->contractData = $contractData;
    }

    public function build()
    {
        return $this->subject('Your Rental Contract')
                    ->view('emails.contract', $this->contractData);
    }
}
