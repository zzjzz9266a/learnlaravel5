@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Dashboard</div>
          <div class="panel-body">
            <a href="{{ url('admin/article') }}" class="btn btn-lg btn-success col-xs-12" style="margin-bottom: 20px;">管理文章</a>
            <a href="{{ url('admin/comment') }}" class="btn btn-lg btn-primary col-xs-12" style="margin-bottom: 20px;">管理评论</a>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection