<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create the controller instance.
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(5);

        return view('dashboard', compact('feedbacks'));
    }

    /**
     * Display a listing of the resource.
     */
    public function setRead(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id); 
        $feedback->status = $request->input('status');; 
        $feedback->save(); 

        return response()->json(['success' => true ,'message' => 'Feedback status updated successfully']);
    }
}
