@extends('layouts.app')
@section('content')


<div class="modal fade" id="comment-del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        确定要删除此评论么？
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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
                    <button class="btn btn-danger comment-delete" comment-id={{$comment->id}}>
                      删除
                    </button>
                    {{-- <form action="{{ url('admin/comment/'.$comment->id) }}" method="POST" style="display: inline;">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger">删除</button>
                    </form> --}}
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
<script>
  // $.ajaxSetup({
  //   headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
  // });
  $('.comment-delete').click(function(){
    var button = $(this)
    var id = button.attr('comment-id');
    sweetAlert({
      title: '确认删除此条评论？',
      type: 'warning',
      allowOutsideClick: true,
      showCancelButton: true,
    },function () {
      $.ajax({
        url: '{{ url('admin/comment') }}' + '/' + id,
        type: "post",
        data: {
          '_token': '{{ csrf_token() }}',
          '_method': 'DELETE'
        },
        success: function (status,msg) {
          if (msg === 'success' && status === 'OK'){
            swal({
              title: '删除成功'
            },function () {
              window.location.reload();
            })
          }
        }
      });
    })
  })
</script>
@endsection