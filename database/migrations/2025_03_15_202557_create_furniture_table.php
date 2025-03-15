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
		Schema::create('furnitures', static function(Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('code')->unique();
			$table->float('price');
			$table->foreignId('furniture_type_id')->constrained('furniture_types');
			$table->boolean('ready_to_shipping')->default(FALSE);
			$table->string('color');
			$table->integer('discount')->nullable();
			$table->timestamp('discount_ends_at')->nullable();
			$table->string('description')->nullable();
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
		});
		DB::statement("ALTER TABLE `furnitures` ADD `image` MEDIUMBLOB AFTER `description`");
	}
};
