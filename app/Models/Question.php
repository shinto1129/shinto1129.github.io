<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function goods()
    {
        return $this->hasMany('App\Models\Good');
    }
    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isGooddBy($user): bool {
        return Good::where('user_id', $user->id)->where('question_id', $this->id)->first() !==null;
    }
}
