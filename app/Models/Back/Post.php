<?php

namespace App\Models\Back;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Post extends Model
{
    use HasFactory,
        Commentable;
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'image',
        'status',
        'description',
        'tags'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
