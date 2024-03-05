<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request){
        $quizzes = Quiz::latest();
        return view('quiz',['data'=>$quizzes->paginate(5)->withQueryString()]);
    }
    public function show(Quiz $quiz){
        $question = Question::where('quiz_id',$quiz->id)->paginate(1)->withQueryString();
        $answer = Attempt::firstWhere('question_id',$question[0]->id);
        return view('question',[
            'title'=>$quiz->title,
            'data'=>$question,
            'answer'=>$answer?$answer->answer:'',
        ]);
    }
    public function answer(Quiz $quiz){
        $answer = request('answer');
        $question_id = request('question_id');
        $attempt = Attempt::create([    
            'user_id'=>1,
            'question_id'=>$question_id,
            'answer'=> $answer,
        ]);
        $answer = $attempt->answer;
        $question = Question::where('quiz_id',$quiz->id)->paginate(1)->withQueryString();
        return view('question',[
            'title'=>$quiz->title,
            'data'=>$question,
            'answer'=>$answer
        ]);
    }
    public function post(Request $request){
        return json_encode($request->input());
    }
}
