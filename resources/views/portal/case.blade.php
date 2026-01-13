@extends('layouts.portal')

@section('title', isset($case['title']) ? $case['title'] . ' · 案例详情' : '案例详情')

@section('content')
    <div class="container">
        <div class="case-detail">
            <h1>{{ $case['title'] }}</h1>
            <p class="muted">{{ $case['desc'] }}</p>

            @if(!empty($case['img']))
                <div class="case-visual">
                    <img src="{{ $case['img'] }}" alt="{{ $case['title'] }}" style="max-width:100%;height:auto;"/>
                </div>
            @endif

            <section style="margin-top:1.5rem">
                <h3>项目简介</h3>
                <p>这是 {{ $case['title'] }} 的示例详情页面。可在此处补充更多实施背景、架构、技术栈与效果指标。</p>
            </section>

            <p style="margin-top:1.5rem"><a class="link" href="{{ route('home') }}">← 返回首页</a></p>
        </div>
    </div>
@endsection
