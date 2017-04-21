<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Comment extends Model
{
  protected $fillable = ['nickname', 'email', 'website', 'content', 'article_id'];

  public function articleTitle()
  {
  	return Article::find($this->article_id)->title;
  }
}
