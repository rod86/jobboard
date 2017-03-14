<?php

namespace App\Listeners;

use App\Events\JobApplicationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendJobApplicationNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  JobApplicationEvent  $event
     * @return void
     */
    public function handle(JobApplicationEvent $event)
    {
	    $candidate = $event->candidate;
	    $job = $event->job;

	    Mail::send('emails.job_application_notification', ['candidate' => $candidate, 'job' => $job], function ($message) use ($candidate, $job) {
		    $message->from('admin@jobboard.com', 'Admin')
		            ->to($job->company->email)
		            ->replyTo($candidate->email, $candidate->name)
		            ->subject('Application for ' . $job->title);
	    });
    }
}
