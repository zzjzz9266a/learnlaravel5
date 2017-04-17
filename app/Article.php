<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public static function getArticleById($id)
    {
      return Article::find($id);
    }

    public function hasManyComments()
    {
      return $this->hasMany('App\Comment', 'article_id', 'id');
    }
}
