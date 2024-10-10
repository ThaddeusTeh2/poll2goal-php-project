<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    // put all the required fields here
    protected $fillable = [ "vote", "user_id", "post_id"];

    // function to grab all the votes related to the user
    public function user()
    {
        // this is to indicate that a vote is belong to a user
        return $this->belongsTo(User::class);
    }


}
