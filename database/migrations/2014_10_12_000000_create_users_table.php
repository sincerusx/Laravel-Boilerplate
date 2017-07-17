<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'users',
			function ( Blueprint $table ) {
				$table->charset = 'utf8mb4';
				$table->collation = 'utf8mb4_unicode_ci';
				$table->increments( 'uid' )->comment( 'user identifier' );
				$table->string( 'username', 50 )->comment( 'account username' );
				$table->char( 'password', 32 )->comment( 'md5 hashed password' );
				$table->string( 'email', 254 )->comment( 'account email address' );
				$table->tinyInteger( 'status', $autoIncrement = false, $unsigned = true )->default( 1 )->comment( 'status of account' );
				$table->enum( 'isReal', [ 0, 1 ] )->default( 1 )->comment( 'indicates test accounts. 0: test, 1: real' );
				$table->rememberToken();
				$table->timestamps();
			} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'users' );
	}
}
