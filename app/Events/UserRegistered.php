<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegistered
{

	use Dispatchable, InteractsWithSockets, SerializesModels;

	/**
	 * The registered user.
	 *
	 * @var $User User
	 */
	public $User;

	/**
	 * Create a new event instance.
	 *
	 * @param \App\Models\User $user
	 */
	public function __construct(User $user)
	{
		$this->User = $user;
	}
}
