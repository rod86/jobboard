<?php

use Illuminate\Database\Seeder;
use App\Models\CompanySize;


class CompanySizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data = $this->data();

	    foreach ($data as $title) {

		    $industry = new CompanySize();
		    $industry->title = $title;
		    $industry->save();
	    }
    }

    protected function data()
    {
    	return [
			'10 or less employees',
		    '11-50 employees',
		    '50-100 employees',
		    'More than 100 employees'
	    ];
    }
}
