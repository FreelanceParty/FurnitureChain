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
		Schema::create('stores', static function(Blueprint $table) {
			$table->id();
			$table->foreignId('city_id')->constrained('cities');
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
		});
	}
};
