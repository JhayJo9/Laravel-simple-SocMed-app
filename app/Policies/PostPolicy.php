<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use PhpParser\Node\Expr\Cast\Bool_;

class PostPolicy
{
    
    public function modify(User $user, Post $post) : bool
    {
        return $user->id === $post->user_id;
    }
}

