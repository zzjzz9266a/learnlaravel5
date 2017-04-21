@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">评论管理</h3></div>
        <div class="panel-body">
          <table class="table table-striped">
            
            <thead>
              <tr>
                <th class="col-xs-6"><h4><strong>Content</strong></h4></th>
                <th><h4><strong>User</strong></h4></th>
                <th><h4><strong>Page</strong></h4></th>
                <th><h4><strong>编辑</strong></h4></th>
                <th><h4><strong>删除</strong></h4></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($comments as $comment)
                <tr>
                  <td class="">{{ $comment->content }}</td>
                  <td>
                    <h4><a href="{{ $comment->website }}">{{ $comment->nickname }}</a></h4>
                    <br>
                    <p>{{ $comment->email }}</p>
                  </td>
                  <td><a href="{{ url('article/'.$comment->article_id) }}">{{ $comment->articleTitle() }}</a></td>
                  <td>
                    <a href="{{ url('admin/comment/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a>
                  </td> 
                  <td>
                    <form action="{{ url('admin/comment/'.$comment->id) }}" method="POST" style="display: inline;">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger">删除</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection