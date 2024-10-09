<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // put all the required fields here
    protected $fillable = [ "content", "user_id" ];

    // function to grab all the posts related to the user
    public function user()
    {
        // this is to indicate that a post is belong to a user
        return $this->belongsTo(User::class);
    }


}