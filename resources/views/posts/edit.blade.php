<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>编辑帖子</title>
</head>
<body>
    <h1>编辑帖子</h1>
    <p><a href="{{ route('posts.show', $post) }}">返回帖子</a></p>

    @if($errors->any())
        <div style="color:red">
            <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')
        <div>
            <label>标题</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" required />
        </div>
        <div>
            <label>内容</label>
            <textarea name="body" rows="8" required>{{ old('body', $post->body) }}</textarea>
        </div>
        <div>
            <button type="submit">提交更新（将进入审核）</button>
        </div>
    </form>

</body>
</html>
