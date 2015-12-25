<?php

namespace H34\LaravelVenezuela\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class LaravelVenezuelaSeed extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'venezuela:seed';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Ejecutar seeds de tabla venezuela.';

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
		$this->info('Ejecutando Seeds... esto puede tomar algunos minutos... por favor espere...');
		$this->call('db:seed', ['--class' => 'VenezuelaTableSeeder']);
		$this->info('¡Seeds ejecutados con exito! :-)');
	}

}
