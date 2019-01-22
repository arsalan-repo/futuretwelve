<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{


    public function subcat()
    {
        return $this->belongsTo(SubCategory::class, 'category_id');
    }

    public function usr()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
