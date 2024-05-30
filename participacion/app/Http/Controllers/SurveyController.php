<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index(){

        $surveys = Survey::all();

        return view('surveys.index', compact('surveys'));
    }

    public function create(){
        return view('surveys.create');
    }


    public function store(Request $request){

        $survey = Survey::create($request->only('title', 'description'));

        return redirect()->route('surveys.show', $survey);
    }

    public function show(Survey $survey)
    {
        $survey->load('questions.responses');
        return view('surveys.show', compact('survey'));
    }

}
