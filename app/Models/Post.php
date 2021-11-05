<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content'
    ];
    public $timestamp = true;

    public function comments() {
        return $this->hasMany(Comment::class, 'postId', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
