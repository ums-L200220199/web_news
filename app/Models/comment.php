<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'article_id',
        'user_email',
        'content',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
