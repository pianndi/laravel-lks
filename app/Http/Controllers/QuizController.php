<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request){
        if ($request->query('sort')=='oldest'){
            $quizzes = Quiz::oldest();

        }else {
            $quizzes = Quiz::latest();

        }
        $search = $request->query('search');
        if ($search){
            $quizzes->where('title','like','%'.$search.'%');
        }
        return view('quiz',['data'=>$quizzes->paginate(5)->withQueryString()]);
    }
    public function show(Quiz $quiz){
        $question = Question::where('quiz_id',$quiz->id);
        if ($quiz->random)$question->inRandomOrder();
        return view('question',[
            'title'=>$quiz->title,
            'data'=>$question->get(),
        ]);
    }
    public function answer(Request $request, Quiz $quiz) {
        $question = Question::where('quiz_id',$quiz->id);
        $answers = $request->input('answer',[]);
        $ids = collect($answers)->pluck('id');
        $answer = collect($answers)->pluck('answer');
        $benar = Question::whereIn('id',$ids)->whereIn('answer',$answer)->get();
        $score = round(100/$question->count()*$benar->count());
        Attempt::create([
            'user_id'=>auth()->user()->id,
            'quiz_id'=>$quiz->id,
            'score'=>$score,
        ]);
        return redirect('quiz');
        
    }
    public function post(Request $request){
        return json_encode($request->input());
    }
}
