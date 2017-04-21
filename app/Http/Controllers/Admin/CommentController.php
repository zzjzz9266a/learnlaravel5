<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Article;

/**
* 管理评论
*/
class CommentController extends Controller
{
  public function index()
  {
    $comments = Comment::all();
    return view('admin/comment/index')->withComments($comments);
  }

  public function edit($comment_id)
  {
    return view('admin/comment/edit')->withComment(Comment::find($comment_id));
  }

  public function update(Request $request, $comment_id)
  {
    $comment = Comment::find($comment_id);
    $comment->nickname = $request->get('nickname');
    $comment->email = $request->get('email');
    $comment->website = $request->get('website');
    $comment->content = $request->get('content');
    if ($comment->save()) {
      return redirect('admin/comment')->withErrors('保存成功');
    }
  }

  public function destroy($comment_id)  
  {
    if ($comment = Comment::find($comment_id)->delete()){
      return "OK";
    }
    // return redirect()->back()->withInput()->withErrors("删除成功");
  }
}