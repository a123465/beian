@extends('layouts.portal')

@section('title', '联系我们 · 波斯圈')

@section('content')
    <section class="hero small hero-compact">
        <div class="container">
            <h1>联系我们</h1>
            <p class="lead">有项目需求或技术问题？留下信息，我们会尽快联系你。</p>
        </div>
    </section>

    <section class="section container contact-area">
        <div class="contact-grid">
            <div class="contact-card">
                <h4>商务合作</h4>
                <p>电话：{{ config('portal.contact.phone') }}</p>
                <p>邮箱：{{ config('portal.contact.email_sales') }}</p>
                <p>地址：{{ config('portal.contact.address') }}</p>
            </div>

            <div class="contact-card">
                <h4>技术支持</h4>
                <p>邮箱：{{ config('portal.contact.email_support') }}</p>
                <p>工作时间：工作日 9:00 - 18:00</p>
            </div>

            <div class="contact-card contact-form">
                <h4>在线留言</h4>

                @if(session('success'))
                    <div class="alert success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert error">{{ session('error') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert error">
                        <ul>
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-row"><input type="text" name="name" placeholder="姓名" value="{{ old('name') }}" required></div>
                    <div class="form-row"><input type="email" name="email" placeholder="邮箱" value="{{ old('email') }}" required></div>
                    <div class="form-row"><input type="text" name="company" placeholder="公司（可选）" value="{{ old('company') }}"></div>
                    <div class="form-row"><textarea name="message" rows="5" placeholder="请描述你的需求或问题">{{ old('message') }}</textarea></div>
                    <div class="form-row"><button class="btn primary" type="submit">发送消息</button></div>
                </form>
            </div>
        </div>

        <div class="map-placeholder">
            <!-- 如果有地图或 iframe，可以在这里嵌入 -->
            <img src="https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=1200&q=60&auto=format&fit=crop" alt="map placeholder" width="1200" height="360" />
        </div>
    </section>
@endsection
