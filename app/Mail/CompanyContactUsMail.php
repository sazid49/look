<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $body;
	public $company;
	public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body,$company,$contact)
    {
        $this->body = $body;
        $this->company = $company;
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return $this->subject('New contact us request')->markdown('emails.CompanyContactUsMail')->withBody($this->body)->withCompany($this->company)->withContact($this->contact);
    }
}
