<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use App\Models\Good;

use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $data = DB::table('questions')
        ->join('categories', 'questions.category_id', '=', 'categories.id')
        ->join('users', 'questions.user_id', '=', 'users.id')
        ->select('questions.*', 'users.name as uname', 'categories.name as cname','categories.image as image')
        ->orderBy('id', 'DESC')
        ->get();
        //dd($data);
        
        $rank = DB::table('questions')
        ->join('categories', 'questions.category_id', '=', 'categories.id')
        ->groupBy('questions.category_id')
        ->select(\DB::raw('categories.name as name', 'count(*) as COUNT'))
        ->limit(3)
        ->get();
        //dd($rank);
        
        $qrank = Question::select('id', 'title')->limit(3)->get();

        $urank = User::select('name')->limit(3)->get();



        return view('index', compact('data', 'rank', 'qrank', 'urank', 'user'));
    }

    public function quiz()
    {
        $user = \Auth::user();
        if(empty($user)){
            return view('auth.login');
        }
        $data = DB::table('questions')
        ->join('categories', 'questions.category_id', '=', 'categories.id')
        ->join('users', 'questions.user_id', '=', 'users.id')
        ->select('questions.*', 'users.name as uname', 'categories.name as cname','categories.image as image')
        ->get();

        $category = Category::get();
        //dd($data);
        return view('quiz', compact('data', 'category', 'user'));
    }

    public function user()
    {
        $user = \Auth::user();
        if(empty($user)){
            return view('auth.login');
        }
        $data = DB::table('questions')
        ->join('categories', 'questions.category_id', '=', 'categories.id')
        ->join('users', 'questions.user_id', '=', 'users.id')
        ->select('questions.*', 'users.name as uname', 'categories.name as cname','categories.image as image')
        ->get();

        $answer = DB::table('answers')
        ->join('questions', 'answers.question_id', '=', 'questions.id')
        ->join('users', 'questions.user_id', '=', 'users.id')
        ->where('answers.user_id', $user['id'])
        ->select('answers.*', 'questions.title as title', 'questions.text as text', 'users.name as uname', 'users.id as u_id')
        ->get();

        $good = Good::get();
        //dd($answer);
        $category = Category::get();
        //dd($data);

        return view('user', compact('data', 'user', 'answer', 'good'));
    }

    public function answer($id)
    {
        $user = \Auth::user();
        if(empty($user)){
            return view('auth.login');
        }
        $data = Question::where('id', $id)->first();
        $result = 0;
        $result = Answer::where('question_id', $id)->where('user_id', $user['id'])->count();
        if(empty($result > 0)){
            $data['error'] = '既に解答済みです。';
            return view('answer', compact('data'));
        }
        return view('answer', compact('data'));
    }


    public function create()
    {
        $user = \Auth::user();
        if(empty($user)){
            return view('auth.login');
        }
        $category = Category::get();
        if(!empty(session('quiz'))){
            $data = session('quiz');
            return view('create', compact('data', 'category'));

        }
        return view('create', compact('category'));
    }

    public function edit($id){
        $user = \Auth::user();
        if(empty($user)){
            return view('auth.login');
        }
        $data = Question::where('id', $id)->first();
        $category = Category::get();
        
        return view('edit', compact('data', 'category'));
    }
    
}
