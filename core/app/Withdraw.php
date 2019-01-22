<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $table = 'withdraws';

    protected $fillable = ['user_id','method_id','balance','status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
