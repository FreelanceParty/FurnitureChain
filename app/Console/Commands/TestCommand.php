<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Throwable;

/** @class TestCommand */
class TestCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 * @var string
	 */
	protected $signature = 'app:test-command';

	/**
	 * The console command description.
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Execute the console command.
	 * @return void
	 */
	public function handle(): void
	{
		try {
			// TODO:
		} catch (Throwable $e) {
			echo $e->getMessage();
		}
	}
}
