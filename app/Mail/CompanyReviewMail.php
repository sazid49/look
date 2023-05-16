<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyReviewMail extends Mailable
{
    use Queueable, SerializesModels;

	public $body;
	public $company;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body,$company)
    {
        $this->body = $body;
        $this->company = $company;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New review submitted')->markdown('emails.CompanyReviewMail')->with('body',$this->body)->withCompany($this->company);
    }
}
