<?php

namespace App\UseCases;

use App\Models\Feedback;

class IndexAction
{
    public function __invoke()
    {

       $feedbacks = Feedback::all(); 


        return $feedbacks;
    }
}
