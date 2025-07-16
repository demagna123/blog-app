<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

      protected $fillable = [
        'nom',
        'prix',
        'categorie',
        'quantite',
        'description',
        'photo'
    ];

    public function commentaires()
{
    return $this->hasMany(Commentaire::class);
}

public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
