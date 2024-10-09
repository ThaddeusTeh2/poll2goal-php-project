<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // put all the required fields here
    protected $fillable = [ "comment", "user_id" ];

    // function to grab all the comment related to the user
    public function user()
    {
        // this is to indicate that a comment is belong to a user
        return $this->belongsTo(User::class);
    }
}
