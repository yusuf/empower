<?php namespace Sorora\Empower\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class EmpowerDeploy extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'empower:deploy';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Publishes configuration and runs migrations for the Sorora Packages.';

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
	 * @return void
	 */
	public function fire()
	{
		$this->setConfig();

		$this->deployPackages();
	}

	/**
	 * Sets any required configuration
	 */
	protected function setConfig()
	{
		\Config::set('empower::dbprefix', $this->option('prefix'));
	}

	/**
	 * Deploy each package
	 */
	protected function deployPackages()
	{
		$packages = explode(',', $this->argument('packages'));

		if(! empty($packages))
		{
			// Add empower if it is not already there
			if(!in_array('empower', $packages))
			{
				$packages[] = 'empower';
			}
			// go through each package and deploy configuration + migrate
			foreach($packages AS $package)
			{
				$package = strtolower($package);
				$this->comment('Deploying config and migrations for '.$package.'...');
				$this->deployConfig($package);
				$this->migratePackage($package);
			}
			return $this->info('Deployment complete.');
		}

		$this->error('Please supply a comma seperated list of packages you wish to deploy.');
	}

	/**
	 * Deploys the configuration for a package
	 * @param string $package
	 */
	protected function deployConfig($package)
	{
		$this->call('config:publish', array('package' => 'sorora/'.$package));
	}

	/**
	 * Runs the migrations for a package
	 * @param string $package
	 */
	protected function migratePackage($package)
	{
		$this->call('migrate', array('--package' => 'sorora/'.$package));
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('packages', InputArgument::REQUIRED, 'A comma seperated list of sorora packages you have installed, e.g. "aurp,bms"'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('prefix', 'p', InputOption::VALUE_OPTIONAL, 'A prefix to be applied to the tables migrated into the database.', '')
		);
	}

}