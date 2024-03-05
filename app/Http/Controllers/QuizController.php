<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(){
        return view('quiz',['data'=>Quiz::paginate(5)->withQueryString()]);
    }
    public function post(Request $request){
        return json_encode($request->input());
    }
}
