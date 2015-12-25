<?php

namespace H34\LaravelVenezuela\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class LaravelVenezuelaInstall extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'venezuela:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Copiar y ejecutar migraciones de tablas para estados, ciudades, municipios y parroquias de Venezuela.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->call('vendor:publish', ['--provider' => 'H34\LaravelVenezuela\LaravelVenezuelaServiceProvider']);
		$this->call('optimize');
		$this->call('migrate');
	}

}
