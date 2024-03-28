<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyCustomMail;
use App\Mail\NotificationEmail;
use App\Models\Feedback;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Get the last created feedback
        $feedback = Feedback::latest()->first();

        // Check if feedback exists
        if ($feedback) {
            // Send email with feedback details
            Mail::to('admin@example.com')->send(new NotificationEmail($feedback))->everySecond();
        }
    }
}

