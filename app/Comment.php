<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;

class Comment extends Model
{   
    protected $fillable = [];
    protected $table = 'comments';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
