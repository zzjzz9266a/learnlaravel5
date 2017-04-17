<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
      return view('admin/article/index')->withArticles(Article::all());
    }

    public function create()
    {
      // return view('admin/article/create');
      return view('admin/article/create', ['article'=>new Article]);
    }

    public function edit($article_id)
    {
      return view('admin/article/edit')->withArticle(Article::find($article_id));
      // $article = Article::getArticleById($article_id);
      // if (!is_null($article)) {
      // }else{
      //   return view('errors/503');
      // }
    }
    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required|unique:articles|max:255',
        'body' => 'required'
      ]);

      $article = new Article;
      $article->title = $request->get('title');
      $article->body = $request->get('body');
      $article->user_id = $request->user()->id;

      if ($article->save()) {
        return redirect('admin/article');
      }else{
        return redirect()->back()->withInput()->withErrors('保存失败');
      }
    }

    public function update(Request $request, $article_id)
    {
      $this->validate($request,[
        'title' => 'required|unique:articles|max:255',
        'body' => 'required'
      ]);
      $article = Article::find($article_id);
      $article->title = $request->get('title');
      $article->body = $request->get('body');
      $article->user_id = $request->user()->id;

      if ($article->save()) {
        return redirect('admin/article');
      }else{
        return redirect()->back()->withInput()->withErrors('保存失败');
      }
    }

    public function destroy($article_id)
    {
      Article::find($article_id)->delete();
      return redirect()->back()->withInput()->withErrors('删除成功');
    }
}
