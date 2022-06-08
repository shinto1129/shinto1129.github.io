<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function question()
    {   //reviewsテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(Question::class);
    }
}
