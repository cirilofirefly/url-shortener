<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortenedUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_url',
        'shortened_url'
    ];

    public function scopeWhereShortenedUrl($query, $token)
    {
        return $query->where('shortened_url', config('app.url') . '/' . $token);
    }
}
