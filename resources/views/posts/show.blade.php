<!DOCTYPE html>
<html lang ="{{ str_replace('_', '_', app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!--Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        <form action="/posts/{{ $post->id }}" id="form_delete" method="post">
           {{ csrf_field() }}
           {{method_field('delete') }}
           <input type="submit" style="display:none">
            <p class='delete'>[<span onclick="return deletePost(this);">delete</span>]</p>
        </form>
        <div class='content'>
            <div class="content_post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>
            </div>
            <h2 class='title'>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
            function deletePost(e) {
                "use strict";
                if(confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById('form_delete'),submit();
                }
            }
        </script>
    </body>
</html>