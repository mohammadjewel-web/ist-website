<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Courses extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function rel_to_user()
    {
        return $this->hasMany(User::class, 'author_id');
    }

}
