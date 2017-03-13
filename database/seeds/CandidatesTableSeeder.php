<?php

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Candidate;

class CandidatesTableSeeder extends Seeder
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

		    // Job
		    $job = Job::where('title', $item['job'])->first();

		    if (!$job) {
			    $this->command->warn('No job entry found for ' . $item['name']);
			    continue;
		    }

		    $candidate = new Candidate();
		    $candidate->name = $item['name'];
		    $candidate->email = $item['email'];
		    $candidate->resume = $item['resume'];

		    if (isset($item['created_at']))
		    {
			    $candidate->created_at = $item['created_at'];
			    $candidate->updated_at = $item['created_at'];
		    }

		    $job->candidates()->save($candidate);
	    }
    }

    protected function data()
    {
    	return [
			[
				'created_at' => 1478214000,
				'job' => 'NET Developer',
				'name' => 'Riley Morton',
				'email' => 'riley@example.org',
				'resume' => 'resume.doc'
			],
		    [
			    'created_at' => 1478250000,
			    'job' => 'NET Developer',
			    'name' => 'Gail Key',
			    'email' => 'gail@example.org',
			    'resume' => 'resume.doc'
		    ],
		    [
			    'created_at' => 1478251500,
			    'job' => 'NET Developer',
			    'name' => 'Ruby Woodard',
			    'email' => 'ruby@example.org',
			    'resume' => 'resume.doc'
		    ],
		    [
			    'created_at' => 1478250600,
			    'job' => 'NET Developer',
			    'name' => 'Ori Nolan',
			    'email' => 'ori@example.org',
			    'resume' => 'resume.doc'
		    ],
		    [
			    'created_at' => 1478251500,
			    'job' => 'UX/UI Designer',
			    'name' => 'Kasimir Carter',
			    'email' => 'kasimir@example.org',
			    'resume' => 'resume.doc'
		    ],
		    [
			    'created_at' => 1478250600,
			    'job' => 'UX/UI Designer',
			    'name' => 'Danielle Chang',
			    'email' => 'danielle@example.org',
			    'resume' => 'resume.doc'
		    ],
		    [
			    'created_at' => 1478250600,
			    'job' => 'SEO Specialist',
			    'name' => 'Bell Schultz',
			    'email' => 'bell@example.org',
			    'resume' => 'resume.doc'
		    ]
	    ];
    }
}
