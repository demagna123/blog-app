<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
      protected $fillable = [
        'article_id',
        'nomauteur',
        'messages'
    ];

    public function article()
{
    return $this->belongsTo(Article::class);
}
}
