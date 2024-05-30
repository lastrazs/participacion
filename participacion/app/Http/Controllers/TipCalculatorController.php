<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipCalculatorController extends Controller
{
    public function index(){
        return view('tipcalculator');
    }

    public function calculate(Request $request){
        $request->validate([
            'total_amount' => 'required|numeric|min:0',
            'tip_percentage' => 'required|numeric|min:0|max:100',
        ]);

        $totalAmount = $request->input('total_amount');
        $tipPercentage = $request->input('tip_percentage');

        $tipAmount = ($totalAmount * $tipPercentage) / 100;
        $totalWithTip = $totalAmount + $tipAmount;

        return  view('tipcalculator.calculate',[
            'totalAmount' => $totalAmount,
            'tipPercentage' => $tipPercentage,
            'tipAmount' => $tipAmount,
            'totalWithTip' => $totalWithTip,
        ]);
    }


}
