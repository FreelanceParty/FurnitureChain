<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/** Run the migrations. */
	public function up(): void
	{
		Schema::create('orders', static function(Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->nullable()->constrained('users');
			$table->string('user_email');
			$table->string('city');
			$table->string('street');
			$table->string('house_number');
			$table->integer('status_id');
			$table->float('total_amount');
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
		});
	}

};
