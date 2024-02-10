<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Page extends Model
{
    use HasFactory, Commentable;
    protected $fillable = ['title', 'slug', 'content'];
}
