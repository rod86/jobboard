<?php

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Company;

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

	    	$company = Company::where('name', $item['company'])->first();

		    if (!$company) {
			    $this->command->warn('No company entry found for ' . $item['title']);
			    continue;
		    }

		    $job = new Job();
		    $job->title = $item['title'];
		    $job->location = $item['location'];
		    $job->type = $item['type'];
		    $job->salary = $item['salary'];
		    $job->description = 'Lorem ipsum dolor et sit amet ...';
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
				'type' => Job::TYPE_CONTRACT,
				'salary' => '200 €'
			],
		    [
			    'company' => 'DEMO inc',
			    'title' => 'Senior NET Developer',
			    'location' => 'Barcelona',
			    'type' => Job::TYPE_CONTRACT,
			    'salary' => '400 €'
		    ],
		    [
			    'company' => 'Vulputate Ltd',
			    'title' => 'Web Developer',
			    'location' => 'Barcelona',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '25000 €'
		    ],
		    [
			    'company' => 'Vulputate Ltd',
			    'title' => 'SEO Specialist',
			    'location' => 'Barcelona',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '30000 €'
		    ],
		    [
			    'company' => 'Vulputate Ltd',
			    'title' => 'Project Manager',
			    'location' => 'Barcelona',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '30000 €'
		    ],
		    [
			    'company' => 'Purus Inc.',
			    'title' => 'Junior Python Developer',
			    'location' => 'Barcelona',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '25000 €'
		    ],
		    [
			    'company' => 'Purus Inc.',
			    'title' => 'Senior DBA',
			    'location' => 'Barcelona',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '30000 €'
		    ],
		    [
			    'company' => 'Purus Inc.',
			    'title' => 'DevOps',
			    'location' => 'Barcelona',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '30000 €'
		    ],
		    [
			    'company' => 'Purus Inc.',
			    'title' => 'Graduate Python Developer',
			    'location' => 'Barcelona',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '20000 €'
		    ],
		    [
			    'company' => 'Vitae Aliquam Corporation',
			    'title' => 'Graduate PHP Developer',
			    'location' => 'Barcelona',
			    'type' => Job::TYPE_CONTRACT,
			    'salary' => '100 €'
		    ],
		    [
			    'company' => 'Vitae Aliquam Corporation',
			    'title' => 'Senior PHP Developer with Symfony',
			    'location' => 'Barcelona',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '28000 €'
		    ],
		    [
			    'company' => 'Ultrices Foundation',
			    'title' => 'Drupal Ninja',
			    'location' => 'Barcelona',
			    'type' => Job::TYPE_PERMANENT,
			    'salary' => '35000 €'
		    ],
		    [
			    'company' => 'Donec Associates',
			    'title' => 'Graduate Java Developer',
			    'location' => 'Barcelona',
			    'type' => Job::TYPE_CONTRACT,
			    'salary' => '120 €'
		    ],
		    [
			    'company' => 'Donec Associates',
			    'title' => 'Java Developer',
			    'location' => 'Barcelona',
			    'type' => Job::TYPE_CONTRACT,
			    'salary' => '200 €'
		    ],
		    [
			    'company' => 'Donec Associates',
			    'title' => 'PHP Backend',
			    'location' => 'Barcelona',
			    'type' => Job::TYPE_CONTRACT,
			    'salary' => '200 €'
		    ],
	    ];
    }
}
