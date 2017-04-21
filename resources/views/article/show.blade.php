<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Learn Laravel 5</title>

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

    <div id="content" {{-- style="padding: 50px;" --}}>

        <h4>
            <a href="/"><< 返回首页</a>
        </h4>
        <div class="row">
            <h1 {{-- class="col-xs-12" --}} style="text-align: center; margin-top: 50px;">{{ $article->title }}</h1>
        </div>
        <div class="row">
            <div id="date" class="col-xs-2 col-xs-offset-9 text-right" {{-- style="text-align: right; margin-right: 50px;" --}}>
                {{ $article->updated_at }}
            </div>
        </div>
        <hr>
        <div id="content" class="row" {{-- style="margin: 50px;" --}}>
            <p class="col-xs-10 col-xs-offset-1">
                {{ $article->body }}
            </p>
        </div>

        <div id="comments" style="margin-top: 50px;">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>操作失败</strong> 输入不符合要求<br><br>
                    {!! implode('<br>', $errors->all()) !!}
                </div>
            @endif
            <div class="row">
                <div id="new" class="col-xs-6 col-xs-offset-1">
                    <form action="{{ url('comment') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="nickname">Nickname</label>
                                <input type="text" name="nickname" class="form-control" {{-- style="width: 300px;" --}} required="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label>Home page</label>
                                <input type="text" name="website" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label>Content</label>
                                <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-success", style="width: 200px; float: left;">Submit</button>
                    </form>
                </div>
            </div>
            <script>
            function reply(a) {
              var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
              var textArea = document.getElementById('newFormContent');
              textArea.innerHTML = '@'+nickname+' ';
            }
            </script>
            <hr>
            <div class="row">
                <div class="conmments col-xs-10 col-xs-offset-1" {{-- style="margin-top: 100px;" --}}>
                    @foreach ($article->hasManyComments as $comment)
                        <div class="one" style="border-top: solid 20px #efefef; padding: 5px 20px;">
                            <div class="nickname" data="{{ $comment->nickname }}">
                                @if ($comment->website)
                                    <a href="{{ $comment->website }}">
                                        <h3>{{ $comment->nickname }}</h3>
                                    </a>
                                @else
                                    <h3>{{ $comment->nickname }}</h3>
                                @endif
                                <h6>{{ $comment->created_at }}</h6>
                            </div>
                            <div class="content">
                                <p style="padding: 20px;">
                                    {{ $comment->content }}
                                </p>
                            </div>
                            <div class="reply" style="text-align: right; padding: 5px;">
                                <a href="#new" onclick="reply(this);">回复</a>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>

    </div>

</body>
</html>