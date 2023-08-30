<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function booted()
    {
        static::creating(function (Post $post) {
            $post->uuid = (string) Str::uuid();
            if (!$post->slug) {
                $post->slug = $post->uuid;
            }
        });
    }
}
