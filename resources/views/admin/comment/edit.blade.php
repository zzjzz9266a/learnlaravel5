@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">编辑评论</div>
          <div class="panel-body">
            <form action="{{ url('admin/comment/'.$comment->id) }}" method="POST">
              {!! csrf_field() !!}
              {{ method_field('PUT') }}
              <div class="form-group">
                <label for="nickname" >NickName:</label>
                <input type="text" name="nickname" id="nickname" class="form-control" value="{{$comment->nickname}}" required="required">
                <label for="email" >Email:</label>
                <input type="text" name="email" id="email" class="form-control" value="{{$comment->email}}">
                <label for="website" >WebSite:</label>
                <input type="text" name="website" id="website" class="form-control" value="{{$comment->website}}">
                <label for="content" >Content:</label>
                <textarea type="text" rows="6" name="content" id="content" class="form-control" required="required">{{$comment->content}}</textarea>
              </div>
              <input type="submit" value="提交" class="btn btn-success">
              <a href="{{ url('admin/comment') }}" class="btn btn-warning">取消</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection