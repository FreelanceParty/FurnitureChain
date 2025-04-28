<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/** Run the migrations. */
	public function up(): void
	{
		Schema::create('furniture_stores', static function(Blueprint $table) {
			$table->id();
			$table->foreignId('store_id')->constrained('stores');
			$table->foreignId('furniture_id')->constrained('furnitures');
			$table->integer('count');
		});
	}
};
