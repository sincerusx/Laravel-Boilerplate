<?php

namespace App\Listeners\Registration;

use App\Events\UserHasRegistered;
use App\Mail\WelcomeMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class WelcomeNewUser implements ShouldQueue
{
	use InteractsWithQueue;

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
	 * @param  UserHasRegistered $event
	 *
	 * @return void
	 */
	public function handle(UserHasRegistered $event)
	{
		Mail::to($event->User->email)->send(new WelcomeMail($event->User));
	}

	public function failed(UserHasRegistered $event, $exception)
	{
		// log exception and re-queue for a later date
	}
}