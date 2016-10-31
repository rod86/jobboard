<?php

use Illuminate\Database\Seeder;
use App\Models\Company;

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
			$company = new Company();
		    $company->name = $item['name'];
		    $company->email = $item['email'];
		    $company->password = bcrypt($item['password']);
		    $company->save();
	    }
    }

    protected function data()
    {
    	return [
    		[
    			'name' => 'DEMO inc',
			    'email' => 'test@locahost.dev',
			    'password' => '12345678'
		    ],
		    [
			    'name' => 'Vulputate Ltd',
			    'email' => 'tellus.id@iaculisenimsit.net',
			    'password' => 'SdVL87T'
		    ],
		    [
			    'name' => 'Purus Inc.',
			    'email' => 'per.conubia@aliquet.ca',
			    'password' => 'SdVL87T'
		    ],
		    [
			    'name' => 'Vitae Aliquam Corporation',
			    'email' => 'nibh@egestas.net',
			    'password' => 'SdVL87T'
		    ],
		    [
			    'name' => 'Ultrices Foundation',
			    'email' => 'in.lorem@nec.org',
			    'password' => 'SdVL87T'
		    ],
		    [
			    'name' => 'Donec Associates',
			    'email' => 'ultrices@pellentesque.net',
			    'password' => 'SdVL87T'
		    ]
	    ];
    }
}
