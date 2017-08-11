<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{

	use Queueable, SerializesModels;

	public $User;

	/**
	 * Create a new message instance.
	 *
	 * @param \App\Models\User $user
	 *
	 */
	public function __construct(User $user)
	{
		$this->User = $user;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->subject('Welcome to '.ucfirst( config('app.name') ) )->markdown('emails.user.welcome');

	}
}
