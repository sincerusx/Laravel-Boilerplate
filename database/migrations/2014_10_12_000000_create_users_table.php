<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'users', function ( Blueprint $table ) {
			$table->charset = 'utf8mb4';
			$table->collation = 'utf8mb4_unicode_ci';
			$table->increments( 'uid' )->comment( 'user identifier' );
			$table->string( 'username', 50 )->comment( 'account username' );
			$table->char( 'password', 32 )->comment( 'md5 hashed password' );
			$table->string( 'email', 100 )->unique()->comment( 'account email address' );
			$table->tinyInteger( 'activated' )->default( 0 )->comment( 'status of account. 0: not activated, 1:activated' );
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
