<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
require_once app_path('Helpers/shopify.php');
use URL;

class QuestionsController extends Controller
{
    
    // add questions
    public function addQuestions(){        
        return view('add-questions');
    }

    // save questions
    public function saveQuestions(Request $request){        
        $questions = new Questions();

        $questions->question = $request->question;
        $questions->answer = $request->answer;
        $questions->shop_id = auth()->user()->id;      
       
        $questions->save();        
        $redirectUrl = getRedirectRoute('questions');
        return redirect($redirectUrl);
    }

    // show questions
    public function showQuestions(){
        $questions = DB::table('questions')->get();
        return view('questions', compact('questions'));
    }
}