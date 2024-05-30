<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Response;

class ResponseController extends Controller
{
    public function store(Request $request, Survey $survey)
    {
        foreach ($request->responses as $question_id => $answer) {
            Response::create([
                'survey_id' => $survey->id,
                'question_id' => $question_id,
                'answer' => $answer
            ]);
        }

        return redirect()->route('surveys.show', $survey);
    }
}
