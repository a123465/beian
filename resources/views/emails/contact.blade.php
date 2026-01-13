<html>
<body>
    <h2>网站留言</h2>
    <p><strong>姓名：</strong> {{ $data['name'] ?? '' }}</p>
    <p><strong>邮箱：</strong> {{ $data['email'] ?? '' }}</p>
    <p><strong>公司：</strong> {{ $data['company'] ?? '—' }}</p>
    <p><strong>内容：</strong></p>
    <div style="white-space:pre-wrap;">{{ $data['message'] ?? '' }}</div>
</body>
</html>
