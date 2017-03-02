<?php

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Company;
use App\Models\Country;

class JobsTableSeeder extends Seeder
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

		    // company
	    	$company = Company::where('name', $item['company'])->first();

		    if (!$company) {
			    $this->command->warn('No company entry found for ' . $item['title']);
			    continue;
		    }

		    // country
		    $country = Country::where('name', $item['country'])->first();

		    if (!$country) {
			    $this->command->warn('No country entry found for ' . $item['title']);
			    continue;
		    }

		    $job = new Job();
		    $job->title = $item['title'];
		    $job->location = $item['location'];
		    $job->country_id = $country->id;
		    $job->type = $item['type'];
		    $job->salary = $item['salary'];
		    $job->description = 'Lorem ipsum dolor et sit amet ...';

		    if (isset($item['created_at']))
		    {
			    $job->created_at = $item['created_at'];
			    $job->updated_at = $item['created_at'];
		    }

		    $company->jobs()->save($job);
	    }
    }

    protected function data()
    {
    	return [
			[
				'company' => 'DEMO inc',
				'title' => 'NET Developer',
				'location' => 'Barcelona',
				'country' => 'Spain',
				'type' => Job::TYPE_CONTRACT,
				'salary' => '200€',
				'created_at' => 1478192400
			],
		    [
			    'company' => 'DEMO inc',
			    'title' => 'Senior NET Developer',
			    'location' => 'Barcelona',
			    'country' => 'Spain',
			    'type' => Job::TYPE_CONTRACT,
			    'salary' => '400€',
			    'created_at' => 1478192700
		    ],
		    [
			    'company' => 'Vulputate Ltd',
			    'title' => 'Web Developer',
			    'location' => 'Barcelona',
			    'country' => 'Spain',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '25000 €',
			    'created_at' => 1478178300
		    ],
		    [
			    'company' => 'Vulputate Ltd',
			    'title' => 'SEO Specialist',
			    'location' => 'Barcelona',
			    'country' => 'Spain',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '30000€',
			    'created_at' => 1478185500
		    ],
		    [
			    'company' => 'Vulputate Ltd',
			    'title' => 'Project Manager',
			    'location' => 'Barcelona',
			    'country' => 'Spain',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '30000 €',
			    'created_at' => 1478185800
		    ],
		    [
			    'company' => 'Purus Inc.',
			    'title' => 'Junior Python Developer',
			    'location' => 'Barcelona',
			    'country' => 'Spain',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '25000€',
			    'created_at' => 1478167800
		    ],
		    [
			    'company' => 'Purus Inc.',
			    'title' => 'Senior DBA',
			    'location' => 'Barcelona',
			    'country' => 'Spain',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '30000€',
			    'created_at' => 1478168400
		    ],
		    [
			    'company' => 'Purus Inc.',
			    'title' => 'DevOps',
			    'location' => 'Barcelona',
			    'country' => 'Spain',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '30000 €',
			    'created_at' => 1478169000
		    ],
		    [
			    'company' => 'Purus Inc.',
			    'title' => 'Graduate Python Developer',
			    'location' => 'Barcelona',
			    'country' => 'Spain',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '20000€',
			    'created_at' => 1478170800
		    ],
		    [
			    'company' => 'Vitae Aliquam Corporation',
			    'title' => 'Graduate PHP Developer',
			    'location' => 'Barcelona',
			    'country' => 'Spain',
			    'type' => Job::TYPE_CONTRACT,
			    'salary' => '100€',
			    'created_at' => 1478167200
		    ],
		    [
			    'company' => 'Vitae Aliquam Corporation',
			    'title' => 'Senior PHP Developer with Symfony',
			    'location' => 'Barcelona',
			    'country' => 'Spain',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '28000€',
			    'created_at' => 1477152000
		    ],
		    [
			    'company' => 'Ultrices Foundation',
			    'title' => 'Drupal Ninja',
			    'location' => 'Barcelona',
			    'country' => 'Spain',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '35000€',
			    'created_at' => 1477411200
		    ],
		    [
			    'company' => 'Donec Associates',
			    'title' => 'Graduate Java Developer',
			    'location' => 'Barcelona',
			    'country' => 'Spain',
			    'type' => Job::TYPE_CONTRACT,
			    'salary' => '120€',
			    'created_at' => 1477659600
		    ],
		    [
			    'company' => 'Donec Associates',
			    'title' => 'Java Developer',
			    'location' => 'Barcelona',
			    'country' => 'Spain',
			    'type' => Job::TYPE_CONTRACT,
			    'salary' => '200€',
			    'created_at' => 1477990800
		    ],
		    [
			    'company' => 'Donec Associates',
			    'title' => 'PHP Backend',
			    'location' => 'Barcelona',
			    'country' => 'Spain',
			    'type' => Job::TYPE_CONTRACT,
			    'salary' => '200€',
			    'created_at' => 1478163600
		    ],
		    [
		    	'company' => 'Vehicula Consulting',
			    'title' => 'Java Developer',
			    'location' => 'London',
			    'country' => 'United Kingdom',
			    'type' => Job::TYPE_CONTRACT,
			    'salary' => '£200',
			    'created_at' => 1478169900
		    ],
		    [
		    	'company' => 'Dooley and Sons',
			    'title' => 'Python Developers',
			    'location' => 'London',
			    'country' => 'United Kingdom',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '£30k - £50k',
			    'created_at' => 1478169000
		    ],
		    [
			    'company' => 'Dooley and Sons',
			    'title' => 'Frontend Developer',
			    'location' => 'London',
			    'country' => 'United Kingdom',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '£30k - £50k',
			    'created_at' => 1478169900
		    ],
		    [
			    'company' => 'Dooley and Sons',
			    'title' => 'QA',
			    'location' => 'London',
			    'country' => 'United Kingdom',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '£30k - £40k',
			    'created_at' => 1478171100
		    ],
		    [
			    'company' => 'Dooley and Sons',
			    'title' => 'UX Designer',
			    'location' => 'London',
			    'country' => 'United Kingdom',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '£30k - £50k',
			    'created_at' => 1478172000
		    ]
	    ];
    }
}
