<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = ['category_id','question_id','answer','user_id'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
