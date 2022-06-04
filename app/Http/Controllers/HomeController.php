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
        $answer = Answer::get();
        
        $rank = Category::withCount('question')->orderby('question_count', 'desc')->limit(3)->get();
        //dd($rank);
        
        $qrank = Question::withCount('answer')->orderby('answer_count', 'desc')->limit(3)->get();
        // dd($qrank);

        $arank = User::withCount('answer')->orderBy('answer_count', 'desc')->limit(3)->get();
        // dd($arank);

        $urank = User::withCount('good')->orderBy('good_count', 'desc')->limit(3)->get();
        // dd($urank);

        return view('index', compact('data', 'rank', 'qrank', 'urank', 'user','arank', 'answer'));
    }

    public function guestIndex()
    {
        $user = User::where('id', 0)->first();
        $data = DB::table('questions')
        ->join('categories', 'questions.category_id', '=', 'categories.id')
        ->join('users', 'questions.user_id', '=', 'users.id')
        ->select('questions.*', 'users.name as uname', 'categories.name as cname','categories.image as image')
        ->orderBy('id', 'DESC')
        ->get();
        //dd($data);
        $answer = Answer::get();
        
        $rank = Category::withCount('question')->orderby('question_count', 'desc')->limit(3)->get();
        //dd($rank);
        
        $qrank = Question::withCount('answer')->orderby('answer_count', 'desc')->limit(3)->get();
        // dd($qrank);

        $arank = User::withCount('answer')->orderBy('answer_count', 'desc')->limit(3)->get();
        // dd($arank);

        $urank = User::withCount('good')->orderBy('good_count', 'desc')->limit(3)->get();
        // dd($urank);

        return view('index', compact('data', 'rank', 'qrank', 'urank', 'user', 'arank', 'answer'));
    }

    public function quiz()
    {
        $user = \Auth::user();
        if(empty($user)){
            return view('auth.login');
        }
        $answer = Answer::get();
        $data = DB::table('questions')
        ->join('categories', 'questions.category_id', '=', 'categories.id')
        ->join('users', 'questions.user_id', '=', 'users.id')
        ->select('questions.*', 'users.name as uname', 'categories.name as cname','categories.image as image')
        ->get();

        $category = Category::limit(10)->get();
        //dd($data);
        return view('quiz', compact('data', 'category', 'user', 'answer'));
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
        ->orderBy('id', 'DESC')
        ->get();

        $answer = DB::table('answers')
        ->join('questions', 'answers.question_id', '=', 'questions.id')
        ->join('users', 'questions.user_id', '=', 'users.id')
        ->where('answers.user_id', $user['id'])
        ->select('answers.*', 'questions.title as title', 'questions.text as text', 'users.name as uname', 'users.id as u_id')
        ->get();

        $good = Good::where('user_id', $user['id'])->get();
        $good_count = User::withCount('good')->where('id', $user['id'])->first();
        //dd($good_count['good_count']);
        //dd($answer);
        $category = Category::get();
        //dd($data);

        
        //dd($good);

        return view('user', compact('data', 'user', 'answer', 'good', 'good_count'));
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
