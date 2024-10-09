<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        "post_id",
        "content",
    ];

    public function comments() {
        return $this->belongsTo(Post::class);
    }
}
