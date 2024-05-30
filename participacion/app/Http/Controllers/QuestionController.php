<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Question;

class QuestionController extends Controller
{
    public function create(Survey $survey)
    {
        return view('questions.create', compact('survey'));
    }

    public function store(Request $request, Survey $survey)
    {
        $survey->questions()->create($request->only('text'));
        return redirect()->route('surveys.show', $survey);
    }
}
