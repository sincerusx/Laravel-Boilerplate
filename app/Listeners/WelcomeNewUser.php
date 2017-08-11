<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\WelcomeMail;
use Mail;

class WelcomeNewUser
{

	/**
	 * Create the event listener.
	 *
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  UserRegistered $event
	 *
	 * @return void
	 */
	public function handle(UserRegistered $event)
	{
		Mail::to($event->User->email)->send(new WelcomeMail($event->User));
	}
}
