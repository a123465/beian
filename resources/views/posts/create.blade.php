<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>发布新帖</title>
</head>
<body>
    <h1>发布新帖</h1>
    <p><a href="{{ route('posts.index') }}">返回帖子列表</a></p>

    @if($errors->any())
        <div style="color:red">
            <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div>
            <label>标题</label>
            <input type="text" name="title" value="{{ old('title') }}" required />
        </div>
        <div>
            <label>内容</label>
            <textarea name="body" rows="8" required>{{ old('body') }}</textarea>
        </div>
        <div>
            <button type="submit">提交发布（将进入审核）</button>
        </div>
    </form>

</body>
</html>
