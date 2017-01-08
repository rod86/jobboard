<?php

use Illuminate\Database\Seeder;
use App\Models\CompanyIndustry;


class CompanyIndustriesTableSeeder extends Seeder
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
		    $industry = new CompanyIndustry();
		    $industry->title = $title;
		    $industry->save();
	    }
    }

    protected function data()
    {
    	return [
			'Marketing and Advertising',
		    'Banking',
		    'Charity',
		    'Construction',
		    'Education',
		    'Estate Management',
		    'Health & Medicine',
		    'Hospitality & Catering',
		    'Tourism',
		    'Digital & Media',
		    'Public Sector',
		    'Retail',
		    'Consultancy'
	    ];
    }
}
