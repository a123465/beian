<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $post->title }}</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p><a href="{{ route('posts.index') }}">返回帖子列表</a> | <a href="{{ route('home') }}">首页</a></p>

    @if(session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif

    <div>
        {!! nl2br(e($post->body)) !!}
    </div>

    @auth
        @if(Auth::id() === $post->user_id)
            <p><a href="{{ route('posts.edit', $post) }}">编辑</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('确认删除？')">删除</button>
            </form>
            </p>
        @endif
    @endauth

</body>
</html>
