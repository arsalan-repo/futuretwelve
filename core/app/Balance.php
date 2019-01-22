<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'add_bal';

//    protected $fillable = ['email','uid','code'];




    public function usr()
    {
        return $this->belongsTo(User::class, 'usid');
    }






}
