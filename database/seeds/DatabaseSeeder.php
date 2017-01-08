<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	protected $_tables = [
		'companies',
		'jobs',
		'company_industries',
		'company_sizes'
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $this->_truncate();

	    $this->call(CompanyIndustriesTableSeeder::class);
	    $this->call(CompanySizesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
	    $this->call(JobsTableSeeder::class);
    }

	protected function _truncate() {

		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

		foreach ($this->_tables as $table) {
			$this->command->info('Truncating table ' . $table);
			DB::table($table)->truncate();
		}

		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}
