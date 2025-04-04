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
		Schema::create('furniture_categories', static function(Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
		});
		DB::statement("ALTER TABLE `furniture_categories` ADD `image` MEDIUMBLOB AFTER `title`");
	}
};
