<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>帖子列表</title>
</head>
<body>
    <h1>帖子列表</h1>
    <p><a href="{{ route('home') }}">返回首页</a> @auth | <a href="{{ route('posts.create') }}">发布新帖</a>@endauth</p>

    @if(session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif

    @foreach($posts as $post)
        <article>
            <h2><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
            <p>发布于：{{ $post->published_at ? $post->published_at->toDateString() : $post->created_at->toDateString() }}</p>
        </article>
        <hr/>
    @endforeach

    {{ $posts->links() }}
</body>
</html>
