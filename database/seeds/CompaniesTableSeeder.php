<?php

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\CompanyIndustry;
use App\Models\CompanySize;
use App\Models\Country;


class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data = $this->data();

	    foreach ($data as $item) {

		    //Size
		    $size = CompanySize::where('title', $item['size'])->first();

		    if (!$size) {
			    $this->command->warn('No size entry found for ' . $item['title']);
			    continue;
		    }

		    // Industry
		    $industry = CompanyIndustry::where('title', $item['industry'])->first();

		    if (!$industry) {
			    $this->command->warn('No industry entry found for ' . $item['title']);
			    continue;
		    }

		    // country
		    $country = Country::where('name', $item['country'])->first();

		    if (!$country) {
			    $this->command->warn('No country entry found for ' . $item['title']);
			    continue;
		    }

			$company = new Company();
		    $company->name = $item['name'];
		    $company->email = $item['email'];
		    $company->password = bcrypt($item['password']);
		    $company->company_size_id = $size->id;
		    $company->company_industry_id = $industry->id;
		    $company->country_id = $country->id;
		    $company->save();
	    }
    }

    protected function data()
    {
    	return [
    		[
    			'name' => 'DEMO inc',
			    'email' => 'test@locahost.dev',
			    'password' => '12345678',
			    'size' => '10 or less employees',
			    'industry' => 'Digital & Media',
			    'country' => 'Spain'
		    ],
		    [
			    'name' => 'Vulputate Ltd',
			    'email' => 'tellus.id@iaculisenimsit.net',
			    'password' => 'SdVL87T',
			    'size' => '50-100 employees',
			    'industry' => 'Tourism',
			    'country' => 'Spain'
		    ],
		    [
			    'name' => 'Purus Inc.',
			    'email' => 'per.conubia@aliquet.ca',
			    'password' => 'SdVL87T',
			    'size' => '50-100 employees',
			    'industry' => 'Marketing and Advertising',
			    'country' => 'Spain'
		    ],
		    [
			    'name' => 'Vitae Aliquam Corporation',
			    'email' => 'nibh@egestas.net',
			    'password' => 'SdVL87T',
			    'size' => 'More than 100 employees',
			    'industry' => 'Digital & Media',
			    'country' => 'United Kingdom'
		    ],
		    [
			    'name' => 'Ultrices Foundation',
			    'email' => 'in.lorem@nec.org',
			    'password' => 'SdVL87T',
			    'size' => '11-50 employees',
			    'industry' => 'Charity',
			    'country' => 'United Kingdom'
		    ],
		    [
			    'name' => 'Donec Associates',
			    'email' => 'ultrices@pellentesque.net',
			    'password' => 'SdVL87T',
			    'size' => '11-50 employees',
			    'industry' => 'Banking',
			    'country' => 'United Kingdom'
		    ],
		    [
		    	'name' => 'Dooley and Sons',
			    'email' => 'vel@risusMorbi.net',
			    'password' => 'ZWS51FQG4DF',
			    'size' => '10 or less employees',
			    'industry' => 'Estate Management',
			    'country' => 'United Kingdom'
		    ],
		    [
		    	'name' => 'Vehicula Consulting',
			    'email' => 'cras.convallis@auctor.org',
			    'password' => 'ORS39EWK3XP',
			    'size' => 'More than 100 employees',
			    'industry' => 'Consultancy',
			    'country' => 'Spain'
		    ]
	    ];
    }
}
