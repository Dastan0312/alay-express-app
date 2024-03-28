<?php

namespace App\UseCases\Feedback;

use App\Jobs\SendEmailJob;
use App\Models\Feedback;
use Illuminate\Support\Facades\Redirect;

class StoreAction
{
    public function __invoke($params)
    {

        $latestFeedback = Feedback::where('user_id', $params['user_id'])->latest('created_at')->first();

        if ($latestFeedback) {
            $timeDifference = now()->diffInDays($latestFeedback->created_at);

            if ($timeDifference >= 1) {

                Feedback::create($params);
            } else {

                return Redirect::back()->with('error', 'You can only submit feedback once a day.');
            }
        } else {

             Feedback::create($params);
             return Redirect::back()->with('success', 'Feedback sent successfully.');
        }

        SendEmailJob::dispatch();
    }
}
