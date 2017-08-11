<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

	/**
	 * The event listener mappings for the application.
	 * run php artisan event:generate to create the event listeners
	 *
	 * @var array
	 */
	protected $listen = [
		'App\Events\UserRegistered' => [
			'App\Listeners\WelcomeNewUser',
		],
	];

	/**
	 * Register any events for your application.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();
	}
}
