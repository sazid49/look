<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyApplyJobMail extends Mailable
{
    use Queueable, SerializesModels;

    public $body;
	public $company;
	public $job;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body,$company,$job)
    {
        $this->body = $body;
        $this->company = $company;
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return $this->subject('New user apply for job')->markdown('emails.CompanyApplyJobMail')->withBody($this->body)->withCompany($this->company)->withJob($this->job);
    }
}
