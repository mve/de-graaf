<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'title', 'message', 'user_id', 'rating'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
