<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Candidate;
use App\Models\Job;

class JobApplicationEvent extends Event
{
    use SerializesModels;

	public $candidate;
	public $job;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Candidate $candidate, Job $job)
    {
		$this->candidate = $candidate;
	    $this->job = $job;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
