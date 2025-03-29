<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 * @return void
	 */
	public function up(): void
	{
		Schema::create('users', static function(Blueprint $table) {
			$table->id();
			$table->string('email')->unique();
			$table->string('password');
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->boolean('admin')->default(FALSE);
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
		});
	}
};
