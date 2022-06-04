<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Category;
use App\Models\Answer;
use App\Models\Good;


class QuizController extends Controller
{
    /**
     * 入力されたデータを表示する　
     * @param $request
     * @return View
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $category = Category::where('id', $data['category_id'] )->first();
        $request->session()->put('quiz', $data);
        //dd(session('quiz'));
        //dd($data);
        return view('comfirm', compact('data', 'category'));
    }

    public function create()
    {
        $user = \Auth::user();
        $data = session('quiz');
        // dd($data, $user['id']);
        $quiz = Question::insertGetId([
            'title' => $data['title'],
            'text' => $data['text'],
             'colmun1' => $data['colmun1'], 
             'colmun2' => $data['colmun2'],
             'colmun3' => $data['colmun3'],
             'colmun4' => $data['colmun4'],
             'answer' => $data['answer'],
             'user_id' => $user['id'],
             'category_id' => $data['category_id'],
             'created_at' => now(),
             'updated_at' => now(),
        ]);
        session()->pull('quiz');
        $msg = '作成しました。';
        return view('complete', compact('msg'));
    }

    public function answer(Request $request)
    {
        $user = \Auth::user();
        $flg = $request->all();
        $quiz = Question::where('id', $flg['question_id'])->first();
        $quiz_id = $quiz['id'];

        if($flg['answer'] == $quiz['answer']){
            $result = 1;
        }else{
            $result = 0;
        }
        $quiz = Answer::insertGetId([
            'user_id' => $user['id'],
            'question_id' => $quiz['id'],
             'answer' => $flg['answer'], 
             'result' => $result,
             'category_id' => $quiz['category_id'],
             'created_at' => now(),
            'updated_at' => now(),
        ]);

        return view('qresult', compact('result','quiz_id'));
    }

    public function edit(Request $request, $id)
    {
        $user = \Auth::user();
        // dd($data, $user['id']);
        $data = $request->all();
        $quiz = Question::where('id', $id)->update([
            'title' => $data['title'],
            'text' => $data['text'],
             'colmun1' => $data['colmun1'], 
             'colmun2' => $data['colmun2'],
             'colmun3' => $data['colmun3'],
             'colmun4' => $data['colmun4'],
             'answer' => $data['answer'],
             'user_id' => $user['id'],
             'category_id' => $data['category_id'],
            'updated_at' => now(),
        ]);
        $msg = '編集完了しました。';
        return view('complete', compact('msg'));
    }

    public function good(Request $request)
    {
        $user = \Auth::user(); //1.ログインユーザーの取得
        $question_id = $request->question_id; //2.投稿idの取得
        $already_good = Good::where('user_id', $user['id'])->where('question_id', $question_id)->first();
        //dd($already_good);
        if (!$already_good) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $good = Good::insertGetId([
                'user_id' => $user['id'],
                'question_id' => $question_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            $good = Good::where('question_id', $question_id)->where('user_id', $user['id'])->delete();
        }
    }
    
    public function delete($id)
    {
        $quiz = Question::where('id', $id)->delete();
        $msg = '削除完了しました';
        return view('complete', compact('msg'));
    }
}
