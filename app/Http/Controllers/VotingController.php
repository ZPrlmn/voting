<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function index()
    {
        $positions = Position::with(['candidates' => function ($query) {
            $query->orderBy('votes', 'desc');
        }])->get();

        return view('voting', compact('positions'));
    }

    public function store(Request $request)
    {
        $student_id = $request->input('student_id');
        $selectedCandidates = $request->except('_token', 'student_id');
    
        foreach ($selectedCandidates as $position => $candidate_student_id) {
            $candidate = Candidate::where('student_id', $candidate_student_id)->first();
            $candidate->votes += 1;
            $candidate->save();
        }
    
        $user = User::where('student_id', $student_id)->first(); // Find by student_id
        if ($user) {
            $user->has_voted = true;
            $user->save();
        }
    
        return redirect()->route('voting.index')->with('success', 'Your vote has been submitted!');
    }
    
    
}
